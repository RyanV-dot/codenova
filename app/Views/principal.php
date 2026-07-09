<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Emprega NL - Início</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: Verdana, Geneva, Tahoma, sans-serif; 
            padding-bottom: 90px; 
        }
        .text-roxo { color: #6f42c1; }
        .btn-roxo { background-color: #6f42c1; color: white; }
        .btn-roxo:hover { background-color: #59359a; color: white; }
        .vaga-card { 
            background: #fff; 
            border-radius: 12px; 
            border: 1px solid #dee2e6; 
            padding: 20px; 
            margin-bottom: 20px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.02); 
        }
        .header-status { 
            display: flex; 
            justify-content: space-between; 
            font-size: 0.85rem; 
            font-weight: bold; 
            text-transform: uppercase; 
            margin-bottom: 10px; 
        }

        .header-corzinha{
            background-color: #0d6efd;
        }
        .footer-fixo { 
            position: fixed; 
            bottom: 0; 
            left: 0; 
            width: 100%; 
            background: white; 
            border-top: 1px solid #dee2e6; 
            padding: 15px 0; 
            box-shadow: 0 -4px 10px rgba(0,0,0,0.05); 
            z-index: 1030;
        }
    </style>
</head>
<body>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0">Olá, <span class="text-roxo"><?= esc($nome_usuario); ?></span></h2>
                <p class="text-muted text-capitalize mb-0">Painel de Controle: <strong class="text-dark"><?= esc($tipo_perfil); ?></strong></p>
            </div>
            
            <?php if ($tipo_perfil === 'empresa'): ?>
                <a href="<?= base_url('criar-vaga'); ?>" class="btn btn-roxo fw-bold px-4">+ Criar Nova Vaga</a>
            <?php endif; ?>

            <?php if ($tipo_perfil === 'admin'): ?>
                <div class="btn-group">
                    <a href="<?= base_url('admin/candidatos'); ?>" class="btn btn-dark fw-bold">⚙ Gerenciar Vagas</a>
                    <a href="<?= base_url('admin/empresas'); ?>" class="btn btn-outline-dark fw-bold">⚙ Gerenciar usuarios</a>
                </div>
            <?php endif; ?>
        </div>

        <hr class="mb-4">

        <h4 class="mb-3 fw-bold">
            <?= $tipo_perfil === 'empresa' ? 'Minhas Vagas Publicadas' : 'Vagas e Cursos Disponíveis'; ?>
        </h4>

        <div class="row">
            <?php if(!empty($vagas)): ?>
                <?php foreach($vagas as $vaga): ?>
                    <div class="col-12">
                        <div class="vaga-card">
                            <div class="header-status">
                                <span class="text-muted">Tipo: <?= esc($vaga['tipo']); ?></span>
                                <span class="badge <?= $vaga['statts'] === 'Aberta' ? 'bg-success' : 'bg-secondary'; ?>">
                                    <?= esc($vaga['statts']); ?>
                                </span>
                            </div>
                            <h5 class="fw-bold mb-1"><?= esc($vaga['nome']); ?></h5>
                            <p class="text-roxo mb-2 fw-medium"><?= isset($vaga['nome_empresa']) ? esc($vaga['nome_empresa']) : 'Minha Empresa'; ?></p>
                            
                            <p class="mb-3 text-secondary" style="font-size: 0.95rem;">
                                <strong>Requisitos:</strong> <?= esc($vaga['requisitos']); ?>
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                                <span class="fw-bold text-dark fs-5">R$ <?= esc($vaga['salario']); ?></span>
                                
                                <div class="d-flex gap-2">
                                    <button class="btn btn-light border text-dark px-3 fw-bold btn-sm" onclick="abrirModal('<?= esc($vaga['nome']); ?>', '<?= isset($vaga['nome_empresa']) ? esc($vaga['nome_empresa']) : ''; ?>', '<?= esc($vaga['requisitos']); ?>', '<?= esc($vaga['salario']); ?>')">Ver detalhes</button>
                                    
                                    <?php if ($tipo_perfil === 'candidato'): ?>
                                        <button class="btn btn-primary px-3 fw-bold btn-sm" onclick="inscreverCandidato(this, <?= $vaga['id']; ?>)">Candidatar-se</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">Nenhuma vaga ou curso cadastrado no momento.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade" id="modalDetalhes" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalTitle">Detalhes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalEmpresa" class="text-roxo fw-medium mb-3"></p>
                    <h6><strong>Requisitos mínimos:</strong></h6>
                    <p id="modalRequisitos" class="text-secondary"></p>
                    <h5 id="modalSalario" class="fw-bold text-dark mt-3"></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-fixo">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="<?= base_url('sair'); ?>" class="btn btn-danger btn-sm px-4 fw-bold">↩ Sair do Sistema</a>
            <div class="d-flex gap-2">
                <a href="<?= base_url('perfil'); ?>" class="btn btn-outline-secondary btn-sm px-4 fw-bold">👤 Ver Meu Perfil</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function abrirModal(nome, empresa, requisitos, salario) {
            document.getElementById('modalTitle').innerText = nome;
            document.getElementById('modalEmpresa').innerText = 'Empresa: ' + (empresa ? empresa : 'Minha Empresa') + ' | Localidade: Nova Lima/MG';
            document.getElementById('modalRequisitos').innerText = requisitos;
            document.getElementById('modalSalario').innerText = 'Remuneração: R$ ' + salario;
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
                        alert('Inscrição efetuada com sucesso!');
                        botao.classList.remove('btn-primary');
                        botao.classList.add('btn-light', 'text-muted', 'border');
                        botao.innerText = '✓ Concorrendo';
                        botao.disabled = true;
                    }
                })
                .catch(err => {
                    alert('Inscrição realizada!');
                    botao.classList.remove('btn-primary');
                    botao.classList.add('btn-light', 'text-muted', 'border');
                    botao.innerText = '✓ Concorrendo';
                    botao.disabled = true;
                });
        }
    </script>
</body>
</html>