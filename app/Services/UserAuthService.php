<?php

namespace App\Services;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class UserAuthService
{
    protected $userRepository;

    /**
     * Construtor da classe.
     *
     * @param \App\Repositories\UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Autentica um usuário e retorna um token JWT.
     *
     * @param array $credentials
     *
     * @return \Illuminate\Http\Response
     */
    public function login(array $credentials)
    {
        // Validação dos dados de entrada
        $validator = Validator::make($credentials, [
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Retorna erros de validação, se houver
        if ($validator->fails()) {
            return ['errors' => $validator->errors()->all()];
        }

        // Tenta autenticar o usuário
        if (!$token = JWTAuth::attempt($credentials)) {
            return ['errors' => 'Credenciais inválidas'];
        }

        // Retorna o token JWT
        return ['token' => $token];
    }
}
