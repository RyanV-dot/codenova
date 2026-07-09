<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <title>Portal Emprega NL - Login</title>
  <style>
    body {
      background-color: #f8f9fa; 
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      color: #212529; 
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
      object-fit: contain;
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
      max-width: 440px;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .form-container h2 {
      font-size: 1.8rem;
      font-weight: 700;
      color: #6f42c1; 
      margin-bottom: 5px;
    }

    .form-container h1 {
      font-size: 1rem;
      color: #6c757d;
      font-weight: 400;
      margin-bottom: 30px;
      line-height: 1.4;
    }

    .btn-custom {
      background-color: #6f42c1;
      color: white;
      font-weight: 600;
      border: none;
      padding: 12px;
      border-radius: 10px;
      transition: all 0.3s;
    }

    .btn-custom:hover {
      background-color: #59359a;
      color: white;
    }

    .links-alternativos a {
      color: #6f42c1;
      text-decoration: none;
      font-size: 0.9rem;
      font-weight: 500;
    }

    .links-alternativos a:hover {
      text-decoration: underline;
    }

    .btn-outline-custom {
      border: 2px solid #6f42c1;
      color: #6f42c1;
      font-weight: 600;
      padding: 12px;
      border-radius: 10px;
      text-align: center;
      transition: all 0.3s;
    }

    .btn-outline-custom:hover {
      background-color: #6f42c1;
      color: white;
    }
  </style>
</head>

<body>

  <div class="container-fluid m-0 p-0">
    <div class="row g-0">
      
      <div class="col-md-6 d-none d-md-flex lado-esquerdo">
        <img src="<?= base_url('codenova_logo.jpeg'); ?>" alt="Logo Emprega NL" class="img-banner">
      </div>

      <div class="col-md-6 lado-direito">
        <div class="form-container">
          <h2>Portal Emprega NL</h2>
          <h1>Secretaria Municipal de Desenvolvimento Econômico</h1>
          
          <?php if (session()->getFlashdata('erro_login')): ?>
            <div class="alert alert-danger text-center py-2 mb-4" style="font-size: 0.9rem; font-weight: bold; border-radius: 8px;">
              <?= session()->getFlashdata('erro_login'); ?>
            </div>
          <?php endif; ?>

          <form action="<?= base_url('logar'); ?>" method="post">
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail" name="email" value="<?= old('email'); ?>" required>
            </div>

            <div class="mb-3">
              <label for="pwd" class="form-label">Senha</label>
              <input type="password" class="form-control" id="pwd" placeholder="Digite sua senha" name="pswd" required>
            </div>

            <button type="submit" class="btn btn-custom w-100 mb-4">Entrar no Sistema</button>

            <div class="text-center mb-3">
              <span class="text-muted">Não possui uma conta?</span>
            </div>

            <div class="d-grid gap-2">
              <a href="<?= base_url('escolha'); ?>" class="btn btn-outline-custom">Criar Nova Conta</a>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

</body>
</html>