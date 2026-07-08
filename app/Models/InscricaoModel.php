<?php

namespace App\Models;

use CodeIgniter\Model;

class InscricaoModel extends Model
{
    // Substitua 'candidato_vaga' pelo nome exato que está no seu banco/DER se for diferente
    protected $table            = 'candidato_vaga'; 
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_candidato', 'id_vagas'];

    // Verifica se o candidato logado já está inscrito nesta vaga específica
    public function jaInscrito($id_candidato, $id_vaga)
    {
        return $this->where('id_candidato', $id_candidato)
                    ->where('id_vagas', $id_vaga)
                    ->first() ? true : false;
    }

    // Busca os candidatos reais inscritos em uma vaga específica (Para a visão da Empresa)
    public function buscarCandidatosPorVaga($id_vaga)
    {
        return $this->select('candidato.nome, candidato.email, candidato.telefone')
                    ->join('candidato', 'candidato.id = candidato_vaga.id_candidato')
                    ->where('candidato_vaga.id_vagas', $id_vaga)
                    ->findAll();
    }
}