<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;

class CompanyController extends Controller
{
    protected $companyService;

    /**
     * Construtor da classe.
     *
     * @param \App\Services\CompanyService $company
     */
    public function __construct(CompanyService $company)
    {
        $this->companyService = $company;
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
