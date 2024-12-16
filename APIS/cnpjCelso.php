<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Receita</title>
    <style>
        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"] {
            width: 300px;
            padding: 5px;
        }

        button {
            margin-top: 10px;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <h1>Consulta Receita</h1>
    <label for="numero">Número:</label>
    <input type="text" id="numero" name="numero">
    <button onclick="consultar()">Consultar</button>

    <h2>Informações</h2>
    <label for="razao_social">Razão Social:</label>
    <input type="text" id="razao_social" name="razao_social">
    <label for="endereco">Endereço:</label>
    <input type="text" id="logradouro" name="logradouro">
    <label for="tipo">Cep:</label>
    <input type="text" id="cep" name="cep">

    <script>
        async function consultar() {
            const numero = document.getElementById('numero').value;
            const response = await fetch(`https://minhareceita.org/numero/${numero}`);
            const data = await response.json();

            document.getElementById('razao_social').value = data.razao_social;
            document.getElementById('logradouro').value = data.descricao_tipo_de_logradouro + ' ' + data.logradouro;
            document.getElementById('cep').value = data.cep;
        }
    </script>
</body>

</html>