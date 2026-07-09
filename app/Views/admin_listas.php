<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin Geral - Emprega NL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: Verdana, Geneva, Tahoma, sans-serif; padding-bottom: 90px; }
        .container-restrito { max-width: 900px; margin: 0 auto; }
        .navbar-custom { background-color: #0d6efd; color: white; border-bottom: 3px solid #0a58ca; }
        .admin-card { background: white; border-radius: 24px; border: 2px solid #9c9d9eff; padding: 25px; margin-bottom: 20px; }
        .footer-fixo { position: fixed; bottom: 0; left: 0; width: 100%; background: #fff; border-top: 2px solid #e9ecef; padding: 12px 0; z-index: 1030; }
    </style>
</head>
<body>

    <nav class="navbar navbar-custom py-3 mb-4">
        <div class="container container-restrito d-flex justify-content-between align-items-center">
            <span class="navbar-brand fw-bold text-white m-0">Painel Controle Admin (sa234)</span>
            <a href="<?= base_url('sair'); ?>" class="btn btn-sm btn-danger fw-bold border-white">Sair</a>
        </div>
    </nav>

    <div class="container container-restrito">
        <?php if($secao === 'candidatos'): ?>
            <h3 class="mb-4 fw-bold">Todos os Candidatos Cadastrados</h3>
            <?php foreach($lista as $c): ?>
                <div class="admin-card">
                    <h5 class="fw-bold text-primary m-0">👤 <?= $c['nome'] ?></h5>
                    <small class="text-muted">CPF: <?= $c['cpf'] ?> | Contato: <?= $c['telefone'] ?> | E-mail: <?= $c['email'] ?></small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h3 class="mb-4 fw-bold">Todas as Empresas e suas Vagas</h3>
            <?php foreach($lista as $e): ?>
                <div class="admin-card">
                    <h5 class="fw-bold text-success m-0">🏢 <?= $e['nome'] ?></h5>
                    <p class="text-muted small mb-2">CNPJ: <?= $e['cnpj'] ?> | E-mail: <?= $e['email'] ?></p>
                    <div class="ps-3 border-left border-2">
                        <small class="fw-bold d-block text-secondary">Vagas Ativas:</small>
                        <?php if(!empty($e['vagas'])): ?>
                            <?php foreach($e['vagas'] as $v): ?>
                                <span class="badge bg-light text-dark border me-1">📌 <?= $v['nome'] ?> (R$ <?= $v['salario'] ?>)</span>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span class="text-muted text-decoration-underline" style="font-size: 0.8rem;">Nenhuma vaga cadastrada.</span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="d-flex justify-content-center mt-3">
            <?= $pager->links($secao) ?>
        </div>
    </div>

    <div class="footer-fixo">
        <div class="container container-restrito d-flex justify-content-around">
            <a href="<?= base_url('principal'); ?>" class="btn btn-outline-secondary btn-sm px-4 fw-bold rounded-pill">🏠 Início</a>
            <a href="<?= base_url('admin/candidatos'); ?>" class="btn <?= $secao==='candidatos'?'btn-primary':'btn-outline-secondary' ?> btn-sm px-4 fw-bold rounded-pill">👥 Candidatos</a>
            <a href="<?= base_url('admin/empresas'); ?>" class="btn <?= $secao==='empresas'?'btn-primary':'btn-outline-secondary' ?> btn-sm px-4 fw-bold rounded-pill">🏢 Empresas</a>
        </div>
    </div>

</body>
</html>