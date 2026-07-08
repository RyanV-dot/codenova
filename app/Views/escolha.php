<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha seu perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
      }
      .lado-direito {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
      }
      .conteudo-container {
        background-color: #ffffff;
        width: 100%;
        max-width: 440px;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      }
      h3 {
        color: #212529;
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 30px;
        text-align: center;
      }
      .btn-opcao {
        padding: 12px;
        border-radius: 10px;
        font-weight: 500;
        text-decoration: none;
        display: block;
        text-align: center;
        margin-bottom: 15px;
        transition: all 0.3s;
      }
      .btn-candidato {
        background-color: #0d6efd;
        color: white;
      }
      .btn-candidato:hover {
        background-color: #0b5ed7;
        color: white;
      }
      .btn-empresa {
        background-color: #6f42c1; 
        color: white;
      }
      .btn-empresa:hover {
        background-color: #59359a;
        color: white;
      }
    </style>
</head>
<body>

  <div class="container-fluid m-0 p-0">
    <div class="row g-0">
      
      <div class="col-md-6 d-none d-md-flex lado-esquerdo">
        <img src="<?= base_url('codenova.png'); ?>" alt="Logo Emprega NL" class="img-banner">
      </div>

      <div class="col-md-6 lado-direito">
        <div class="conteudo-container">
          <h3>Escolha uma opção de cadastro</h3>
          
          <a href="<?= base_url('criarconta'); ?>" class="btn-opcao btn-candidato">Sou Candidato</a>
          <a href="<?= base_url('criarcontaempresa'); ?>" class="btn-opcao btn-empresa">Sou Empresa / Instituição</a>
          
          <div class="text-center mt-4">
            <a href="<?= base_url('/'); ?>" style="color: #6c757d; text-decoration: none; font-size: 0.9rem;">Voltar para o Login</a>
          </div>
        </div>
      </div>

    </div>
  </div>
    
</body>
</html>