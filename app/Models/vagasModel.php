<?php

namespace App\Models;

use codenova\Model;

class vagasModel {
    protected $table = "vagas";
    protected $primary_key = "id";

    public function buscarVagas(){
        $db = \Config\Database::connect();

        $sq1 = "SELECT nome, statts, data_iniciada, requisitos, salario, data_encerrada, tipo FROM vagas";

        $query = $db->query($sq1);

        return $query->getResultArray();
    }
}





?>