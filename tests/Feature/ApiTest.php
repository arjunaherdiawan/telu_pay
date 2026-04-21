<?php

namespace Tests\Feature;

use App\Models\akun;
use App\Models\mahasiswa;
use App\Models\Merchant;
use App\Models\MenuItem;
use App\Models\TerminalMerchant;
use App\Models\wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $merchant;
    protected $menuItem;
    protected $terminal;

    protected function setUp(): void
    {
        parent::setUp();

        // 1. Setup Student, Account, and Wallet
        $mahasiswa = mahasiswa::create([
            'student_id' => 'S123',
            'nim' => '1202200001',
            'nama_lengkap' => 'Test Student',
            'email' => 'test@example.com',
            'nomer_hp' => '08123456789',
            'fakultas' => 'FIF',
            'prodi' => 'SI',
        ]);

        $this->user = akun::create([
            'student_id' => $mahasiswa->student_id,
            'username' => 'testuser',
            'password' => Hash::make('password123'),
        ]);

        wallet::create([
            'account_id' => $this->user->account_id,
            'saldo' => 50000,
            'mata_uang' => 'IDR',
            'created_at' => now(),
            'update_at' => now(),
        ]);

        // 2. Setup Merchant, Terminal, and Menu
        mahasiswa::create([
            'student_id' => 'M123',
            'nim' => '1202209999',
            'nama_lengkap' => 'Merchant Owner',
            'email' => 'merchant@example.com',
            'nomer_hp' => '08129999999',
            'fakultas' => 'FIF',
            'prodi' => 'SI',
        ]);

        $merchantAccount = akun::create([
            'student_id' => 'M123',
            'username' => 'merchant_user',
            'password' => Hash::make('password123'),
        ]);

        wallet::create([
            'account_id' => $merchantAccount->account_id,
            'saldo' => 0,
            'mata_uang' => 'IDR',
            'created_at' => now(),
            'update_at' => now(),
        ]);

        $this->merchant = Merchant::create([
            'account_id' => $merchantAccount->account_id,
            'nama_merchant' => 'Kantin Jujur',
            'lokasi' => 'Gedung G',
            'nomor_kontak' => '0811223344',
        ]);

        $this->terminal = TerminalMerchant::create([
            'merchant_id' => $this->merchant->merchant_id,
            'nama_terminal' => 'Terminal 01',
            'status' => 'ACTIVE',
        ]);

        $this->menuItem = MenuItem::create([
            'merchant_id' => $this->merchant->merchant_id,
            'nama_item' => 'Nasi Goreng',
            'harga' => 15000,
            'is_available' => true,
        ]);
        
        MenuItem::create([
            'merchant_id' => $this->merchant->merchant_id,
            'nama_item' => 'Es Teh',
            'harga' => 5000,
            'is_available' => true,
        ]);
    }

    /** @test */
    public function test_user_can_login()
    {
        $response = $this->postJson('/api/login', [
            'username' => 'testuser',
            'password' => 'password123',
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['access_token', 'token_type', 'user']);
    }

    /** @test */
    public function test_can_list_merchants()
    {
        $response = $this->getJson('/api/merchants');

        $response->assertStatus(200)
                 ->assertJsonFragment(['nama_merchant' => 'Kantin Jujur']);
    }

    /** @test */
    public function test_can_search_menu_items()
    {
        $response = $this->getJson('/api/merchants/search?q=Nasi');

        $response->assertStatus(200)
                 ->assertJsonFragment(['nama_item' => 'Nasi Goreng']);
    }

    /** @test */
    public function test_can_get_merchant_menu()
    {
        $response = $this->getJson("/api/merchants/{$this->merchant->merchant_id}/menu");

        $response->assertStatus(200)
                 ->assertJsonCount(2);
    }

    /** @test */
    public function test_can_get_my_profile()
    {
        $token = $this->user->createToken('test_token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->getJson('/api/me');

        $response->assertStatus(200)
                 ->assertJsonPath('username', 'testuser');
    }

    /** @test */
    public function test_can_check_wallet_balance()
    {
        $token = $this->user->createToken('test_token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->getJson('/api/wallet/balance');

        $response->assertStatus(200);
        $this->assertEquals(50000, (float) $response->json('balance'));
    }

    /** @test */
    public function test_can_place_order_successfully()
    {
        $token = $this->user->createToken('test_token')->plainTextToken;

        $payload = [
            'terminal_id' => $this->terminal->terminal_id,
            'items' => [
                ['item_id' => $this->menuItem->item_id, 'quantity' => 2] // 15000 * 2 = 30000
            ]
        ];

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->postJson('/api/orders', $payload);

        $response->assertStatus(201);
        $this->assertEquals(20000, (float) $response->json('new_balance'));

        $this->assertDatabaseHas('orders', [
            'total_harga' => 30000,
            'status' => 'PAID'
        ]);

        $this->assertDatabaseHas('transaksi', [
            'tipe' => 'PAYMENT',
            'jumlah' => 30000,
            'saldo_sesudah' => 20000,
        ]);
    }

    /** @test */
    public function test_cannot_place_order_with_insufficient_balance()
    {
        $token = $this->user->createToken('test_token')->plainTextToken;

        $payload = [
            'terminal_id' => $this->terminal->terminal_id,
            'items' => [
                ['item_id' => $this->menuItem->item_id, 'quantity' => 10] // 15000 * 10 = 150000 (Saldo cuma 50rb)
            ]
        ];

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->postJson('/api/orders', $payload);

        $response->assertStatus(400)
                 ->assertJsonPath('message', 'Insufficient balance');
    }

    /** @test */
    public function test_can_view_order_history()
    {
        $token = $this->user->createToken('test_token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->getJson('/api/orders/history');

        $response->assertStatus(200);
    }

    /** @test */
    public function test_merchant_can_request_topup()
    {
        // 1. Login as merchant (using Setup data)
        $merchantUser = akun::where('username', 'merchant_user')->first();
        $token = $merchantUser->createToken('merchant_token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->postJson('/api/wallet/topup', [
                             'jumlah' => 100000,
                             'bukti_pembayaran' => 'image_path_or_base64',
                             'pesan' => 'Topup Kantin'
                         ]);

        $response->assertStatus(201)
                 ->assertJsonPath('message', 'Topup request submitted successfully');

        $this->assertDatabaseHas('topup_request', [
            'jumlah' => 100000,
            'status' => 'PENDING'
        ]);

        $this->assertDatabaseHas('audit_log', [
            'event_type' => 'TOPUP_REQUEST'
        ]);
    }

    /** @test */
    public function test_merchant_can_request_withdrawal()
    {
        $merchantUser = akun::where('username', 'merchant_user')->first();
        $token = $merchantUser->createToken('merchant_token')->plainTextToken;

        // Give merchant some balance first
        wallet::where('account_id', $merchantUser->account_id)->update(['saldo' => 200000]);

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->postJson('/api/wallet/withdraw', [
                             'jumlah' => 50000
                         ]);

        $response->assertStatus(201)
                 ->assertJsonPath('message', 'Withdrawal request submitted successfully');

        $this->assertDatabaseHas('withdrawal_request', [
            'jumlah' => 50000,
            'status' => 'PENDING'
        ]);
    }

    /** @test */
    public function test_student_cannot_topup_merchant_style()
    {
        $token = $this->user->createToken('student_token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->postJson('/api/wallet/topup', [
                             'jumlah' => 100000
                         ]);

        $response->assertStatus(403);
    }
}
