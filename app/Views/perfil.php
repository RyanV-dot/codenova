<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card-perfil{
            background: linear-gradient(135deg,#0d6efd,#1e40ff);
            color: white;
            border-radius: 20px;
            padding: 25px;
        }

        .avatar{
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,.2);
            border-radius: 15px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:32px;
            font-weight:bold;
        }

        .curriculo{
            background:#fff;
            border-radius:15px;
            padding:20px;
            box-shadow:0 2px 10px rgba(0,0,0,.1);
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="card-perfil d-flex align-items-center">
        <div class="avatar">
            JS
        </div>

        <div class="ms-4">
            <h4><?= $usuario['nome']; ?></h4>
            <p><?= $usuario['email']; ?></p>
            <span class="badge bg-light text-dark">Candidato</span>
        </div>
    </div>

    <div class="mt-4">
        <h4>Informações Pessoais</h4>

        <div class="row mt-3">
            <div class="col-md-6">
                <strong>Telefone</strong><br>
                <?= $usuario['telefone']; ?>
            </div>

            <div class="col-md-6">
                <strong>Data de Nascimento</strong><br>
                <?= $usuario['nascimento']; ?>
            </div>

            <div class="col-md-6 mt-3">
                <strong>Área de Interesse</strong><br>
                <?= $usuario['area']; ?>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="#" class="btn btn-outline-primary w-100">
            Editar Currículo
        </a>
    </div>

    <div class="curriculo mt-4">
        <h4>Meu Currículo</h4>

        <h6 class="mt-3">OBJETIVO</h6>
        <p><?= $usuario['objetivo']; ?></p>

        <h6>EXPERIÊNCIA</h6>
        <p><?= $usuario['experiencia']; ?></p>

        <h6>FORMAÇÃO</h6>
        <p><?= $usuario['formacao']; ?></p>

        <h6>HABILIDADES</h6>
        <p><?= $usuario['habilidades']; ?></p>
    </div>

</div>

</body>
</html>