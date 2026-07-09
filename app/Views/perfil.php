<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil - Portal Emprega NL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: Verdana, Geneva, Tahoma, sans-serif; padding-bottom: 90px; }
        .container-restrito { max-width: 900px; margin: 0 auto; }
        .navbar-custom { background-color: #0d6efd; color: white; border-bottom: 3px solid #0a58ca; }
        .perfil-card { background: white; border-radius: 24px; border: 2px solid #9c9d9eff; padding: 30px; box-shadow: 0 6px 15px rgba(0,0,0,0.05); }
        .vaga-card { background: #f8f9fa; border-radius: 18px; border: 1px solid #dee2e6; padding: 15px; margin-bottom: 15px; }
        .footer-fixo { position: fixed; bottom: 0; left: 0; width: 100%; background: #fff; border-top: 2px solid #e9ecef; padding: 12px 0; z-index: 1030; }
    </style>
</head>
<body>

    <nav class="navbar navbar-custom py-3 mb-4">
        <div class="container container-restrito d-flex justify-content-between align-items-center">
            <div><span class="navbar-brand fw-bold text-white m-0">Portal Emprega NL</span></div>
            <div><a href="<?= base_url('sair'); ?>" class="btn btn-sm btn-danger fw-bold border-white">Sair</a></div>
        </div>
    </nav>

    <div class="container container-restrito">
        <div class="perfil-card">
            
            <?php if($tipo_perfil === 'candidato'): ?>
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-primary"><?= $usuario['nome'] ?></h2>
                    <span class="badge bg-primary px-3 py-2 rounded-pill">Perfil Candidato</span>
                </div>
                
                <h4 class="fw-bold border-bottom pb-2">Informações Pessoais</h4>
                <p><b>E-mail:</b> <?= $usuario['email'] ?></p>
                <p><b>Telefone:</b> <?= $usuario['telefone'] ?></p>
                <p><b>CPF:</b> <?= $usuario['cpf'] ?></p>
                
                <h4 class="fw-bold border-bottom pb-2 mt-4">Meu Currículo</h4>
                <p><b>Experiências Registradas:</b></p>
                <div class="p-3 bg-light rounded-3 border mb-3"><?= $usuario['experiencia'] ?></div>
                
                <button class="btn btn-primary w-100 fw-bold rounded-pill py-2" onclick="alert('Modal para edição de currículo via Banco de Dados')">Editar Currículo</button>

            <?php else: ?>
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-success"><?= $usuario['nome'] ?></h2>
                    <span class="badge bg-success px-3 py-2 rounded-pill">Perfil Corporativo</span>
                </div>

                <h4 class="fw-bold border-bottom pb-2">Informações Institucionais</h4>
                <p><b>E-mail Corporativo:</b> <?= $usuario['email'] ?></p>
                <p><b>Telefone de Contato:</b> <?= $usuario['telefone'] ?></p>
                <p><b>CNPJ:</b> <?= $usuario['cnpj'] ?></p>

                <div class="mt-4 mb-3 d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold m-0">Gerenciar Minhas Vagas</h4>
                    <a href="<?= base_url('criar-vaga') ?>" class="btn btn-sm btn-success fw-bold rounded-pill px-3">+ Cadastrar Vaga</a>
                </div>

                <?php if(!empty($vagas_empresa)): ?>
                    <?php foreach($vagas_empresa as $ve): ?>
                        <div class="vaga-card d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fw-bold m-0 text-dark"><?= $ve['nome'] ?></h6>
                                <small class="text-muted">Salário: R$ <?= $ve['salario'] ?> | Status: <?= $ve['statts'] ?></small>
                            </div>
                            <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="alert('Editar vaga ID: <?= $ve['id'] ?>')">Editar Vaga</button>
                        </div>
                    <?php endforeach; ?>
                    <div class="d-flex justify-content-center mt-2"><?= $pager->links('vagas') ?></div>
                <?php else: ?>
                    <p class="text-muted small">Nenhuma vaga criada por esta empresa ainda.</p>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>

    <div class="footer-fixo">
        <div class="container container-restrito d-flex justify-content-around">
            <a href="<?= base_url('principal'); ?>" class="btn btn-outline-secondary btn-sm px-4 fw-bold rounded-pill">🏠 Início</a>
            <a href="<?= base_url('perfil'); ?>" class="btn btn-primary btn-sm px-4 fw-bold rounded-pill">👤 Perfil</a>
        </div>
    </div>

</body>
</html>