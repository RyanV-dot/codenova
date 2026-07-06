<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <title>Document</title>
</head>
<style>
  body {
    background-color: lightblue;
  }

  .form {
    background-color: white;
    width: 420px;
    padding: 35px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, .2);
    /* Sombra */
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

  div.absolute {
    display: block;
    margin: 0 auto;
  }
</style>

<body>
  <img src='codenova.png' height='100' width='100' class='img'>
  <button type="submit" class="btn btn-primary" class="div.absolute"><a href="<?= base_url('home/criarconta'); ?>">criar
      conta</a></button>

  <h2>Portal Emprega NL</h2>
  <h1> Secretaria Municipal de Desenvolvimento Econômico</h1>
  <form action="/action_page.php" class="form">
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>

    <div class="mb-3">
      <label for="pwd">senha</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>

    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>

    <button type="submit" class="btn btn-primary" class="float-end">Entrar na Portal</button>

  </form>

</body>

</html>