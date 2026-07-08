<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpresaModel extends Model
{
    // Mapeia a tabela correta no MySQL
    protected $table            = 'empresa';
    
    // Define a chave primária
    protected $primaryKey       = 'id';
    
    // Configura o retorno padrão como array para o Controller ler facilmente
    protected $returnType       = 'array';

    // CAMPOS PERMITIDOS: Segurança obrigatória para inserções e atualizações (.save())
    // Deve bater exatamente com as colunas da tabela 'empresa' do seu SQL
    protected $allowedFields    = [
        'nome', 
        'cnpj', 
        'senha', 
        'telefone', 
        'email'
    ];

    /**
     * Verifica se existe uma empresa cadastrada com o email e senha digitados.
     * Utilizado no método 'logar()' do seu Home.php
     */
    public function verificarLogin($email, $senha)
    {
        return $this->where('email', $email)
                    ->where('senha', $senha)
                    ->first(); // Retorna os dados da empresa se achar, ou null se não achar
    }
}