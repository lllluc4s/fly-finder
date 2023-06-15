<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    protected $model;

    /**
     * Construtor da classe.
     *
     * @param \App\Models\Company $model
     */
    public function __construct(Company $model)
    {
        $this->model = $model;
    }

    /**
     * Lista todas as companhias aéreas cadastradas.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Exibe uma companhia aérea específica.
     *
     * @param int $id
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Cria uma nova companhia aérea.
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Atualiza uma companhia aérea específica.
     *
     * @param int $id
     */
    public function update(int $id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * Deleta uma companhia aérea específica.
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        return $this->model->find($id)->delete();
    }
}
