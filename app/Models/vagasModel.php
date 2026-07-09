<?php

namespace App\Models;

use CodeIgniter\Model;

class vagasModel extends Model {
    protected $table = 'vagas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'statts', 'data_iniciada', 'requisitos', 'salario', 'data_encerrada', 'id_empresa', 'tipo'];

    // Busca todas as vagas trazendo junto o nome da empresa dona dela
    public function buscarTodasVagas() {
        return $this->select('vagas.*, empresa.nome as nome_empresa')
                    ->join('empresa', 'empresa.id = vagas.id_empresa')
                    ->findAll();
    }

    // Busca apenas as vagas de uma determinada empresa
    public function buscarVagasPorEmpresa($id_empresa) {
        return $this->where('id_empresa', $id_empresa)->findAll();
    }
}