<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumindo API's</title>
</head>
<body>
    <h1>Consumo de API's com cURL</h1>
    <p>
        <b>API</b> (Application Programming Interface) ou Interface de Aplicação de Programação define um conjunto de regras para que uma aplicação acesse dados de outras aplicações, independente da forma que elas foram implementadas.
    </p>
    <p>
        Na prática, a API atua cmo uma ponte entre softwares, facilitando a troca de informações de froma segura e controlada.
    </p>
    <h2>REST</h2>
    <p>REST é um conjunto de princípios arquiteturais que define como uma API deve ser estruturada.
        <br>
        API's REST fazem requisições HTTP (GET, POST, PUT e DELETE) que retornam em formato<b> JSON.</b>
    </p>
    <h3>Funções nativas do PHP</h3>
    <h4>file_get_contents()</h4>
    <p>Pegar o conteúdo de um arquivo.</p>
    <h4>cURL (cliente url)</h4>
    <p>Ferramenta de linha de comando usada para transferir dados de ou para um servidor, utilizando diversos protocolos.
        <br>
        É mais flexível e recomendado para integrações complexas.
    </p>
    <h4>json_decode()</h4>
    <p>Função para converter dados JSON em objeto ou array em PHP.</p>
    <h3>Códigos comuns de erro</h3>
    <ul>
        <li>200: requisição bem sucedida</li>
        <li>400: requisição mal sucedida</li>
        <li>404: não encontrado</li>
        <li>500: erro do servidor (genérico)</li>
    </ul>
</body>
</html>