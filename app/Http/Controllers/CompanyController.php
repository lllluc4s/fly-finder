<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Services\UserAuthService;

class CompanyController extends Controller
{
    protected $companyService;
    protected $userAuthService;

    /**
     * Construtor da classe.
     *
     * @param \App\Services\CompanyService $company
     * @param \App\Services\UserAuthService $userAuthService
     */
    public function __construct(CompanyService $company, UserAuthService $userAuthService)
    {
        $this->companyService  = $company;
        $this->userAuthService = $userAuthService;
    }

    /**
     * Autentica um usuário e retorna um token JWT.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $result = $this->userAuthService->login($credentials);

        if (isset($result['errors'])) {
            return response()->json(['errors' => $result['errors']], 422);
        }

        return response()->json(['token' => $result['token']]);
    }


    /**
         * Lista todas as companhias aéreas cadastradas.
         *
         * @return \Illuminate\Http\Response
         */
    public function index()
    {
        $companies = $this->companyService->index();

        return response()->json($companies);
    }

    /**
     * Exibe uma companhia aérea específica.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = $this->companyService->show($id);

        return response()->json($company);
    }

    /**
     * Cria uma nova companhia aérea.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $company = $this->companyService->store();

        return response()->json($company, 201);
    }

    /**
     * Atualiza uma companhia aérea específica.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $company = $this->companyService->update($id);

        return response()->json($company, 200);
    }

    /**
     * Remove uma companhia aérea específica.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = $this->companyService->destroy($id);

        return response()->json($company, 200);
    }

    /**
     * Invoca o controller.
     *
     * @return void
     */
    public function __invoke()
    {
        //
    }
}
