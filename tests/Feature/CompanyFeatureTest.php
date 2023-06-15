<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Repositories\CompanyRepository;

class CompanyFeatureTest extends TestCase
{
    protected $companyRepository;
    protected $company;

    /**
     * Configura o ambiente de teste.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->companyRepository = app(CompanyRepository::class);
        $this->company           = $this->companyRepository->create([
            'name'    => 'Teste',
            'local'   => 'Teste',
            'website' => 'Teste',
        ]);
    }

    /**
         * Testa a rota GET /api/companhias-aereas/ .
         */
    public function test_get_route_companies(): void
    {
        $this->get('/api/companhias-aereas')
            ->assertStatus(200);
    }

    /**
     * Testa a rota GET /api/companhias-aereas/{id} .
     */
    public function test_route_companies_id(): void
    {
        $this->get('/api/companhias-aereas/' . $this->company->id)
            ->assertStatus(200);
    }

    /**
     * Testa as rotas POST /api/companhias-aereas/ e PUT /api/companhias-aereas/{id} .
     */
    public function test_route_companies_put(): void
    {
        $this->post('/api/companhias-aereas', $this->company->toArray())
            ->assertStatus(201);

        $this->put('/api/companhias-aereas/' . $this->company->id, [
            'name'    => 'Teste',
            'local'   => $this->company->local,
            'website' => $this->company->website,
        ])
            ->assertStatus(200);
    }

    /**
     * Testa a rota DELETE /api/companhias-aereas/{id} .
     */
    public function test_route_companies_delete(): void
    {
        $this->delete('/api/companhias-aereas/' . $this->company->id)
            ->assertStatus(200);
    }
}
