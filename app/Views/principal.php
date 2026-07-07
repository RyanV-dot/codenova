<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: antiquewhite;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .semijuntinho {
            display: flex;
            justify-content: space-between;
        }

        .vaga {
            border-radius: 20px;
            border: 2px solid #9c9d9eff;
            margin-left: 5%;
            margin-right: 5%;
            padding: 15px;
        }

        .candidatar {
            color: white;
            font-family: Georgia, 'Times New Roman', Times, serif;
            background-color: #0707e5ff;
            border: 2px transparent;
            border-radius: 20px;
        }

        .detalhes {
            color: black;
            font-family: Georgia, 'Times New Roman', Times, serif;
            background-color: #ebebf0ff;
            border: 2px solid rgba(208, 209, 209, 1);
            border-radius: 20px;

        }

        .mensagem {
            color: white;
            text-align: left;
            background-color: #181fe1ff;
            border: 2px transparent;
            border-radius: 25px;
            text-align: center;
            margin: 20px;
            padding: 10px;
            position: relative;
        }   

        footer{

            display: flex;
            margin-left: 5%;
            margin-right: 5%;
            position: fixed;
        }
    </style>
</head>

<body>

    <div class="mensagem">
        <h3>Seja Bem-Vindo ao Portal</h3>
        <h1>João da Silva</h1>
        <h4>Encontre ótimas oportunidades em Nova Lima</h4>
    </div>

    <div class="aviso">
        Como funciona: O portal conecta candidatos com oportunidades.
        Os processos seletivos são conduzidos diretamente pelas empresas e instituições.
    </div>

    <table border="2">
        <tr>
            <th>Nome vaga</th>
            <th>status da vaga</th>
            <th>requisitos</th>
            <th>salario</th>
            <th>data inicio</th>
            <th>data encerramento</th>
            <th>tipo</th>
        </tr>

        <?php foreach ($vagas as $v): ?>
            <tr>
                <td><?= $v['nome']; ?></td>
                <td><?= $v['statts']; ?></td>
                <td><?= $v['requisitos']; ?></td>
                <td><?= $v['salario']; ?></td>
                <td><?= $v['data_iniciada']; ?></td>
                <td><?= $v['data_encerrada']; ?></td>
                <td><?= $v['tipo']; ?></td>
            </tr>
        <?php endforeach; ?>


    </table>


        <div class="vaga">
            <div class="semijuntinho">
                <p>Vaga</p>
                <p>TI</p>
                <p>Aberta</p> <br>
            </div>
            <p><b>Desenvolvedor web Full Stack</b></p>
            <p>TechNova Sistemas</p>
            <div class="semijuntinho">
                <p>Nova Lima</p>
                <p>R$ 4.200</p>
            </div> <br>

            <div class="semijuntinho">
                <div><button class="detalhes">Ver detalhes</button></div>
                <div><button class="candidatar">Candidatar-se</button></div>
            </div>
        </div>
        <hr>

        <div class="vaga">
            <div class="semijuntinho">
                <p>Vaga</p>
                <p>TI</p>
                <p>Aberta</p> <br>
            </div>
            <p><b>Desenvolvedor web Full Stack</b></p>
            <p>TechNova Sistemas</p>
            <div class="semijuntinho">
                <p>Nova Lima</p>
                <p>R$ 4.200</p>
            </div> <br>

            <div class="semijuntinho">
                <div><button class="detalhes">Ver detalhes</button></div>
                <div><button class="candidatar">Candidatar-se</button></div>
            </div>
        </div>
        <hr>

        <div class="vaga">
            <div class="semijuntinho">
                <p>Vaga</p>
                <p>TI</p>
                <p>Aberta</p> <br>
            </div>
            <p><b>Desenvolvedor web Full Stack</b></p>
            <p>TechNova Sistemas</p>
            <div class="semijuntinho">
                <p>Nova Lima</p>
                <p>R$ 4.200</p>
            </div> <br>

            <div class="semijuntinho">
                <div><button class="detalhes">Ver detalhes</button></div>
                <div><button class="candidatar">Candidatar-se</button></div>
            </div>
        </div>
        <hr>

        <div class="vaga">
            <div class="semijuntinho">
                <p>Vaga</p>
                <p>TI</p>
                <p>Aberta</p> <br>
            </div>
            <p><b>Desenvolvedor web Full Stack</b></p>
            <p>TechNova Sistemas</p>
            <div class="semijuntinho">
                <p>Nova Lima</p>
                <p>R$ 4.200</p>
            </div> <br>

            <div class="semijuntinho">
                <div><button class="detalhes">Ver detalhes</button></div>
                <div><button class="candidatar">Candidatar-se</button></div>
            </div>
        </div>
        <hr>

        
</body>

</html>