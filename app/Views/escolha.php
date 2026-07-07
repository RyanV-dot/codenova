<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
  body {
    background-color: antiquewhite;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
  }

  .form {
    background-color: white;
    width: 420px;
    padding: 35px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, .2);
    
    display: block;
    margin: 0 auto;

  }

  input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
  }

  button {
    width: 100%;
    padding: 12px;
    background: #0d6efd;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
  }

  a {
    color: white;
    text-decoration: none;
  }

  .img {
    display: block;
    margin: 0 auto;
  }

  .h1 {
    display: block;
    margin: 0 auto;

  }

  .h2 {
    display: block;
    margin: 0 auto;
  }

  .div-absolute {
    display: block;
    margin: 0 auto;
  }
</style>
</head>
<body>

  <div>
    <h3>Escolha uma opção de login</h3> <br>
    <button type="submit" class="btn btn-primary" class="div-absolute">
      <a href="<?= base_url('criarconta'); ?>">Login Candidato</a>
    </button> <br><br>
    <button type="submit" class="btn btn-primary" class="div-absolute">
      <a href="<?= base_url('criarcontaempresa'); ?>">Login Empresa</a>
    </button>
  </div>
    
</body>
</html>