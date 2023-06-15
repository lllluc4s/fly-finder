<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService
{
    protected $companyRepository;
    protected $authService;

    /**
     * Construtor da classe.
     *
     * @param \App\Repositories\CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository, UserAuthService $authService)
    {
        $this->companyRepository = $companyRepository;
        $this->authService       = $authService;
    }

    /**
     * Lista todas as companhias aéreas cadastradas usando o Repository.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->companyRepository->all();
        $data      = [];

        foreach ($companies as $company) {
            $data[] = [
                'name'    => $company->name,
                'local'   => $company->local,
                'website' => $company->website,
            ];
        }

        return response()->json($data);
    }

    /**
     * Exibe uma companhia aérea específica usando o Repository.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = $this->companyRepository->find($id);

        if (!$company) {
            return response()->json([
                'message' => 'Companhia aérea não encontrada!',
            ], 404);
        }

        return response()->json([
            'name'    => $company->name,
            'local'   => $company->local,
            'website' => $company->website,
        ]);
    }

    /**
     * Cria uma nova companhia aérea usando o Repository.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if (null != request()) {
            $validatedData = request()->validate(
                [
                    'name'    => 'required|string',
                    'local'   => 'required|string',
                    'website' => 'required|string',
                ]
            );

            $company = $this->companyRepository->create($validatedData);

            return response()->json([
                'message' => 'Companhia aérea criada com sucesso!',
                'data'    => [
                    'name'    => $company->name,
                    'local'   => $company->local,
                    'website' => $company->website,
                ],
            ], 201);
        }

        return response()->json([
            'message' => 'Ops, algo deu errado! Verifique se o corpo da requisição está no formato JSON e possui os campos name, local e website.',
        ], 400);
    }

    /**
     * Atualiza uma companhia aérea específica usando o Repository.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $company = $this->companyRepository->find($id);

        if (!$company) {
            return response()->json([
                'message' => 'Companhia aérea não encontrada.',
            ], 404);
        }

        $validatedData = request()->validate(
            [
                'name'    => 'required|string',
                'local'   => 'required|string',
                'website' => 'required|string',
            ]
        );

        $this->companyRepository->update($id, $validatedData);

        return response()->json([
            'message' => 'Companhia aérea atualizada com sucesso!',
            'data'    => [
                'name'    => $company->name,
                'local'   => $company->local,
                'website' => $company->website,
            ],
        ], 200);
    }

    /**
     * Remove uma companhia aérea específica usando o Repository.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->companyRepository->find($id)) {
            return response()->json([
                'message' => 'Companhia aérea não encontrada.',
            ], 404);
        }

        $this->companyRepository->delete($id);

        return response()->json([
            'message' => 'Companhia aérea removida com sucesso!',
        ], 200);
    }
}
