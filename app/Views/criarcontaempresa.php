<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Criar Conta - Empresa</title>
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
            color: #6f42c1; 
            margin-bottom: 25px;
        }
        .btn-empresa {
            background-color: #6f42c1;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
        }
        .btn-empresa:hover {
            background-color: #59359a;
            color: white;
        }
        .links-alternativos a {
            text-decoration: none;
            color: #0d6efd;
            font-size: 0.9rem;
        }
        .links-alternativos a:hover {
            color: #0b5ed7;
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
                    <h2>Criar Conta Empresa</h2>

                    <form action="<?= base_url('salvarEmpresa')?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nome da Empresa / Instituição</label>
                            <input type="text" class="form-control" placeholder="Digite o nome da instituição" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">CNPJ</label>
                            <input type="text" class="form-control" placeholder="00.000.000/0000-00" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telefone</label>
                            <input type="text" class="form-control" placeholder="(00) 00000-0000" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" placeholder="empresa@email.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input type="password" class="form-control" placeholder="Digite uma senha forte" required>
                        </div>

                        <button type="submit" class="btn btn-empresa w-100 mb-4">Criar Conta</button>

                        <div class="d-flex justify-content-between links-alternativos">
                            <a href="<?= base_url('criarconta'); ?>">Criar conta como usuário</a>
                            <a href="<?= base_url('/'); ?>">Tela de login</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</body>
</html>