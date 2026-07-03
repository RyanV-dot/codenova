<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

body {
  background-color: lightblue;
}

.form{
  background-color: white;
   width: 420px;
    padding: 35px;
    border-radius: 20px;     
    box-shadow: 0 10px 30px rgba(0,0,0,.2); /* Sombra */
     display: block;
   margin: 0 auto;
    
}
input{
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
}

button{
    width: 100%;
    padding: 12px;
    background: #0d6efd;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}
.img{
   display: block;
   margin: 0 auto;
}
.h1{
  display: block;
   margin: 0 auto;
}
.h2{
  display: block;
   margin: 0 auto;
}
div.absolute {
display: block;
   margin: 0 auto;
}
    </style>
<body>
    <!-- Modal -->

<div class="modal">

    <div class="modal-conteudo">

        <h2>Criar Conta</h2>

        <form class="form">

            <label>Nome Completo</label>
            <input type="text" placeholder="Digite seu nome completo"><br><br>

            <label>CPF</label>
            <input type="text" placeholder="000.000.000-00"><br><br>

            <label>Telefone</label>
            <input type="text" placeholder="(00) 00000-0000"><br><br>

            <label>E-mail</label>
            <input type="email" placeholder="Digite seu e-mail"><br><br>

            <label>Senha</label>
            <input type="password" placeholder="Digite sua senha">

            <button type="submit">Criar Conta</button>

            <a href="criarcontaempresa"> criar conta como empresa </a><br>
             <a href="login"> tela de login </a>


        </form>

    </div>

</div>

</body>
</html>