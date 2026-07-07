<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
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
        /* Sombra */
        display: block;
        margin: 0 auto;

    }

    .junto {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    input {
        width: 100%;
        padding: 8px;
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

    a{
        text-decoration: none;
        color: rgba(56, 60, 103, 1)
    }
    a:hover {
        color: rgba(56, 60, 103, 0.5)
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
    <!-- Modal -->

    <div class="modal">

        <div class="modal-conteudo">

            <h2>Criar Conta Empresa</h2>

            <form class="form" method="post" action="<?= base_url('/')?>">

                <label>Nome Da Empresa/ Instituição</label>
                <input type="text" placeholder="Digite seu nome completo"><br><br>

                <label>CNPJ</label>
                <input type="text" placeholder="000.000.000-00"><br><br>

                <label>Telefone</label>
                <input type="text" placeholder="(00) 00000-0000"><br><br>

                <label>E-mail</label>
                <input type="email" placeholder="Digite seu e-mail"><br><br>

                <label>Senha</label>
                <input type="password" placeholder="Digite sua senha">

                <button type="submit">Criar Conta</button>
                <div class="junto">
                    <p><a href="<?= base_url('criarconta'); ?>"> criar conta como usuario </a></p><br>
                    <p><a href="<?= base_url('/'); ?>"> tela de login </a></p>
                </div>

            </form>

        </div>

    </div>

</body>

</html>