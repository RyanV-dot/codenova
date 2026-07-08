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
      padding: 35px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    h2 {
      color: #0d6efd; 
      font-weight: 600;
      font-size: 1.8rem;
    }

    h1 {
      color: #6c757d;
      font-size: 1rem;
      margin-bottom: 25px;
    }

    .btn-primary {
      background-color: #0d6efd;
      border: none;
      padding: 10px;
      border-radius: 8px;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
    }

    .btn-outline-custom {
      border: 1px solid #6f42c1; 
      color: #6f42c1;
      padding: 10px;
      border-radius: 8px;
      text-decoration: none;
      display: block;
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
          
          <form action="<?= base_url('logar'); ?>" method="post">
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail" name="email" required>
            </div>

            <div class="mb-3">
              <label for="pwd" class="form-label">Senha</label>
              <input type="password" class="form-control" id="pwd" placeholder="Digite sua senha" name="pswd" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">Entrar no Portal</button>
            
            <a href="<?= base_url('escolha'); ?>" class="btn btn-outline-custom w-100">Criar Conta</a>
          </form>
        </div>
      </div>

    </div>
  </div>

</body>
</html>