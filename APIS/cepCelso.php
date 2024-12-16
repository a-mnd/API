<!DOCTYPE html>
<html>

<head>
    <title>Consulta de CEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function consultarCEP() {
            var cep = document.getElementById('cep').value;
            // Verifica se o CEP possui apenas números
            if (!cep.match(/^[0-9]+$/)) {
                alert('O CEP deve conter apenas números.');
                return;
            }
            // Consulta o CEP no ViaCEP
            $.getJSON('https://viacep.com.br/ws/' + cep + '/json/', function(data) {
                if (!data.erro) {
                    document.getElementById('logradouro').value = data.logradouro;
                    document.getElementById('bairro').value = data.bairro;
                    document.getElementById('cidade').value = data.localidade;
                    document.getElementById('estado').value = data.uf;
                } else {
                    alert('CEP não encontrado.');
                }
            });
        }
    </script>
</head>

<body>
    <h1>Consulta de CEP</h1>
    <form>
        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" maxlength="8" pattern="[0-9]{8}" required>
        <button type="button" class="btn btn-primary" onclick="consultarCEP()">Consultar</button>
        <br><br>
        <label for="logradouro" class="form-label">Logradouro:</label>
        <input type="text" id="logradouro" name="logradouro" readonly>
        <br><br>
        <label for="bairro" class="form-label">Bairro:</label>
        <input type="text" id="bairro" name="bairro" readonly>
        <br><br>
        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" readonly>
        <br><br>
        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" readonly>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>