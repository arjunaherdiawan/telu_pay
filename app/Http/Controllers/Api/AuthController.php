<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\akun;
use App\Models\mahasiswa;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Register a new student and account.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|string|unique:mahasiswa,student_id',
            'nim' => 'required|string',
            'nama_lengkap' => 'required|string',
            'email' => 'required|email|unique:mahasiswa,email',
            'nomer_hp' => 'required|string',
            'fakultas' => 'required|string',
            'prodi' => 'required|string',
            'username' => 'required|string|unique:akun,username',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();
        try {
            // 1. Create Mahasiswa
            $mahasiswa = mahasiswa::create([
                'student_id' => $request->student_id,
                'nim' => $request->nim,
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'nomer_hp' => $request->nomer_hp,
                'fakultas' => $request->fakultas,
                'prodi' => $request->prodi,
            ]);

            // 2. Create Akun
            $akun = akun::create([
                'student_id' => $mahasiswa->student_id,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'created_at' => now(),
            ]);

            // 3. Create Wallet
            wallet::create([
                'account_id' => $akun->account_id,
                'saldo' => 0,
                'mata_uang' => 'IDR',
                'created_at' => now(),
                'update_at' => now(),
            ]);

            DB::commit();

            $token = $akun->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Registration successful',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $akun->load('mahasiswa'),
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Registration failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Login user and return token.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $akun = akun::where('username', $request->username)->first();

        if (!$akun || !Hash::check($request->password, $akun->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }


        $token = $akun->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $akun->load('mahasiswa'),
        ]);
    }

    /**
     * Get authenticated user details.
     */
    public function me(Request $request)
    {
        return response()->json($request->user()->load(['mahasiswa', 'wallet']));
    }

    /**
     * Logout user by revoking token.
     */
    public function logout(Request $request)
    {
        /** @var \Laravel\Sanctum\PersonalAccessToken $token */
        $token = $request->user()->currentAccessToken();
        $token->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
