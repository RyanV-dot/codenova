<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Nova Oportunidade</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: Verdana, Geneva, Tahoma, sans-serif; padding-bottom: 90px; }
        .container-restrito { max-width: 600px; margin: 0 auto; }
        .form-card { background: white; border-radius: 24px; border: 2px solid #9c9d9eff; padding: 30px; box-shadow: 0 6px 15px rgba(0,0,0,0.05); }
        .navbar-custom { background-color: #0d6efd; color: white; border-bottom: 3px solid #0a58ca; }
    </style>
</head>
<body>

    <nav class="navbar navbar-custom py-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="navbar-brand fw-bold text-white m-0">Portal Emprega NL</span>
            <a href="<?= base_url('principal') ?>" class="btn btn-sm btn-light fw-bold rounded-pill">Voltar</a>
        </div>
    </nav>

    <div class="container container-restrito">
        <div class="form-card">
            <h3 class="fw-bold text-center text-primary mb-4">Criar Nova Vaga ou Curso</h3>
            
            <form action="<?= base_url('Home::salvarNovaVaga') ?>" method="get">
                <div class="mb-3">
                    <label class="form-label fw-bold">Título da Oportunidade</label>
                    <input type="text" name="nome" class="form-control rounded-3" placeholder="Ex: Desenvolvedor Front-End" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tipo</label>
                        <select name="tipo" class="form-select rounded-3">
                            <option value="vaga">Vaga de Emprego</option>
                            <option value="curso">Curso de Capacitação</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Status Inicial</label>
                        <select name="statts" class="form-select rounded-3">
                            <option value="Aberta">Aberta</option>
                            <option value="Encerrada">Fechada / Arquivada</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Remuneração / Bolsa Auxílio</label>
                    <input type="text" name="salario" class="form-control rounded-3" placeholder="Ex: 3500.00" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Requisitos e Descritivo</label>
                    <textarea name="requisitos" class="form-control rounded-3" rows="4" placeholder="Descreva os conhecimentos necessários..." required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold py-2 rounded-pill">Publicar Oportunidade</button>
            </form>
        </div>
    </div>

</body>
</html>