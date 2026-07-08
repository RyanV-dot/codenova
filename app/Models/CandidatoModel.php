<?php

namespace App\Models;

use CodeIgniter\Model;

class CandidatoModel extends Model
{
    // Define a tabela do banco de dados que este Model vai gerenciar
    protected $table            = 'candidato';
    
    // Define a chave primária da tabela
    protected $primaryKey       = 'id';
    
    // Configura o tipo de retorno dos dados (pode ser 'array' ou 'object')
    protected $returnType       = 'array';

    // CAMPOS PERMITIDOS: Segurança obrigatória do CodeIgniter 4.
    // Devem bater exatamente com as colunas que estão no seu CREATE TABLE candidato!
    protected $allowedFields    = [
        'nome', 
        'data_nasc', 
        'cpf', 
        'email', 
        'senha', 
        'telefone', 
        'experiencia'
    ];

    /**
     * Verifica se existe um candidato com o email e senha fornecidos.
     * Utilizado diretamente no método 'logar()' do seu Home.php
     */
    public function verificarLogin($email, $senha)
    {
        return $this->where('email', $email)
                    ->where('senha', $senha)
                    ->first(); // Retorna a primeira linha encontrada ou null se não existir
    }
}