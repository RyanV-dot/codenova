<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Criar Conta - Candidato</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .lado-esquerdo {
            background-color: #e9ecef;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .img-banner {
            max-width: 80%;
            height: auto;
        }
        .lado-direito {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }
        .form-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 460px;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }
        h2 {
            color: #0d6efd;
            font-weight: 600;
            margin-bottom: 25px;
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
            padding: 12px;
            border-radius: 8px;
        }
        .links-alternativos a {
            text-decoration: none;
            color: #6f42c1; 
            font-size: 0.9rem;
        }
        .links-alternativos a:hover {
            color: #59359a;
        }
    </style>
</head>

<body>

    <div class="container-fluid m-0 p-0">
        <div class="row g-0">
            
            <div class="col-md-6 d-none d-md-flex lado-esquerdo">
                <img src="<?= base_url('codenova_logo.jpeg'); ?>" alt="Logo" class="img-banner">
            </div>

            <div class="col-md-6 lado-direito">
                <div class="form-container">
                    <h2>Criar Conta</h2>

                    <form action="<?= base_url('salvarCandidato'); ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" placeholder="Digite seu nome completo" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">CPF</label>
                            <input type="text" class="form-control" placeholder="000.000.000-00" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telefone</label>
                            <input type="text" class="form-control" placeholder="(00) 00000-0000" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" placeholder="Digite seu e-mail" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input type="password" class="form-control" placeholder="Digite sua senha" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-4">Criar Conta</button>

                        <div class="d-flex justify-content-between links-alternativos">
                            <a href="<?= base_url('criarcontaempresa'); ?>">Criar conta como empresa</a>
                            <a href="<?= base_url('/'); ?>">Tela de login</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</body>
</html>