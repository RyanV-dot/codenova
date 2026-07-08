<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Emprega NL - Início</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: Verdana, Geneva, Tahoma, sans-serif; padding-bottom: 90px; }
        .text-roxo { color: #6f42c1; }
        .btn-roxo { background-color: #6f42c1; color: white; }
        .btn-roxo:hover { background-color: #59359a; color: white; }
        .vaga-card { background: #fff; border-radius: 12px; border: 1px solid #dee2e6; padding: 20px; margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.02); }
        .header-status { display: flex; justify-content: space-between; font-size: 0.85rem; font-weight: bold; text-transform: uppercase; margin-bottom: 10px; }
        .footer-fixo { position: fixed; bottom: 0; left: 0; width: 100%; background: #fff; border-top: 2px solid #e9ecef; padding: 12px 0; z-index: 1030; box-shadow: 0 -4px 10px rgba(0,0,0,0.04); }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white border-bottom py-3 mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">Portal Emprega NL</a>
            <div class="d-flex align-items-center">
                <span class="me-3 text-muted">Olá, <b><?= $nome_usuario; ?></b> (<span class="badge bg-secondary"><?= ucfirst($tipo_perfil); ?></span>)</span>
                <a href="<?= base_url('sair'); ?>" class="btn btn-outline-danger btn-sm fw-bold">Sair</a>
            </div>
        </div>
    </nav>

    <div class="container">
        
        <?php if ($tipo_perfil == 'candidato'): ?>
            <h3 class="mb-4 fw-bold text-dark">Vagas e Cursos Disponíveis</h3>
            <?php if(empty($vagas)): ?>
                <div class="alert alert-info">Nenhuma oportunidade publicada no momento.</div>
            <?php else: ?>
                <?php foreach($vagas as $v): ?>
                    <div class="vaga-card">
                        <div class="header-status">
                            <span class="text-roxo"><?= ucfirst($v['tipo']); ?></span>
                            <span class="<?= $v['statts'] == 'Aberta' ? 'text-success' : 'text-danger'; ?>"><?= $v['statts']; ?></span>
                        </div>
                        <h4 class="fw-bold m-0"><?= $v['nome']; ?></h4>
                        <p class="text-muted mb-1"><?= $v['nome_empresa']; ?></p>
                        <div class="d-flex justify-content-between text-secondary mb-3" style="font-size: 0.9rem;">
                            <span>📍 Nova Lima</span>
                            <span class="fw-bold text-dark">R$ <?= number_format((float)$v['salario'], 2, ',', '.'); ?></span>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-light btn-sm px-3 fw-bold border" 
                                    onclick="abrirModal('<?= $v['nome']; ?>', '<?= $v['nome_empresa']; ?>', '<?= $v['requisitos']; ?>', '<?= $v['salario']; ?>')">
                                Ver detalhes
                            </button>
                            <?php if($v['ja_inscrito']): ?>
                                <button class="btn btn-light text-muted border btn-sm px-4 fw-bold" disabled>✓ Concorrendo</button>
                            <?php else: ?>
                                <button class="btn btn-primary btn-sm px-4 fw-bold" onclick="inscreverCandidato(this, <?= $v['id']; ?>)">
                                    Candidatar-se
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        <?php elseif ($tipo_perfil == 'empresa'): ?>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-dark">Minhas Vagas Publicadas</h3>
                <a href="<?= base_url('criar-vaga'); ?>" class="btn btn-roxo fw-bold">+ Cadastrar Nova Vaga</a>
            </div>
            <?php if(empty($vagas)): ?>
                <div class="alert alert-info">Você ainda não registrou nenhuma vaga.</div>
            <?php else: ?>
                <div class="row">
                    <?php foreach($vagas as $v): ?>
                        <div class="col-md-6">
                            <div class="vaga-card">
                                <div class="header-status">
                                    <span class="text-roxo"><?= ucfirst($v['tipo']); ?></span>
                                    <span class="text-success"><?= $v['statts']; ?></span>
                                </div>
                                <h4 class="fw-bold mb-1"><?= $v['nome']; ?></h4>
                                <p class="text-secondary mb-3">Salário: R$ <?= $v['salario']; ?></p>
                                <div class="bg-light p-3 border rounded">
                                    <h6 class="fw-bold mb-2 text-dark" style="font-size:0.85rem;">Candidatos Inscritos (Tabela Pivô):</h6>
                                    <ul class="list-unstyled m-0" style="font-size: 0.9rem;">
                                        <?php if(empty($v['candidatos'])): ?>
                                            <li class="text-muted text-center" style="font-size: 0.85rem;">Nenhuma inscrição.</li>
                                        <?php else: ?>
                                            <?php foreach($v['candidatos'] as $cand): ?>
                                                <li class="mb-1 text-dark">👤 <b><?= $cand['nome']; ?></b> <br> <span class="text-muted font-monospace" style="font-size: 0.8rem;"><?= $cand['email']; ?> | <?= $cand['telefone']; ?></span></li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        <?php elseif ($tipo_perfil == 'admin'): ?>
            <h3 class="mb-4 fw-bold text-danger">Painel de Administração Geral</h3>
            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <div class="card p-4 border border-primary shadow-sm">
                        <h5 class="text-primary fw-bold">Candidatos Cadastrados</h5>
                        <h2 class="fw-bold mt-2"><?= $total_candidatos; ?></h2>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card p-4 border border-success shadow-sm">
                        <h5 class="text-success fw-bold">Empresas Parceiras</h5>
                        <h2 class="fw-bold mt-2"><?= $total_empresas; ?></h2>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card p-4 border border-dark shadow-sm">
                        <h5 class="text-dark fw-bold">Vagas Totais Publicadas</h5>
                        <h2 class="fw-bold mt-2"><?= $total_vagas; ?></h2>
                    </div>
                </div>
            </div>
            <div class="alert alert-warning mt-4 text-center fw-bold">
                ⚠️ Interface de moderação exclusiva do Administrador logado com "sa234".
            </div>
        <?php endif; ?>

    </div>

    <div class="modal fade" id="modalDetalhes" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:15px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold text-primary" id="modalTitle">Detalhes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-2">
                    <p class="text-muted mb-3" id="modalEmpresa"></p>
                    <h6 class="fw-bold mb-1">Requisitos:</h6>
                    <p class="bg-light p-3 rounded text-secondary" id="modalRequisitos"></p>
                    <h6 class="fw-bold m-0">Remuneração:</h6>
                    <p class="text-success fw-bold fs-5" id="modalSalario"></p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary btn-sm px-4" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-fixo">
        <div class="container d-flex justify-content-around">
            <a href="<?= base_url('principal'); ?>" class="btn btn-primary btn-sm px-4 fw-bold">🏠 Início</a>
            <a href="<?= base_url('perfil'); ?>" class="btn btn-outline-secondary btn-sm px-4 fw-bold">👤 Perfil</a>
            <a href="#" class="btn btn-outline-secondary btn-sm px-4 fw-bold">📊 Dados</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function abrirModal(nome, empresa, requisitos, salario) {
            document.getElementById('modalTitle').innerText = nome;
            document.getElementById('modalEmpresa').innerText = 'Empresa: ' + empresa + ' | Cidade: Nova Lima';
            document.getElementById('modalRequisitos').innerText = requisitos;
            document.getElementById('modalSalario').innerText = 'R$ ' + salario;
            new bootstrap.Modal(document.getElementById('modalDetalhes')).show();
        }

        function inscreverCandidato(botao, idVaga) {
            fetch('<?= base_url("candidatar/"); ?>' + idVaga)
                .then(response => response.json())
                .then(dados => {
                    if(dados.sucesso) {
                        botao.classList.remove('btn-primary');
                        botao.classList.add('btn-light', 'text-muted', 'border');
                        botao.innerText = '✓ Concorrendo';
                        botao.disabled = true;
                    } else {
                        alert('Erro ao processar inscrição.');
                    }
                });
        }
    </script>
</body>
</html>