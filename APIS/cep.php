<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API CEP</title>
</head>
<body>
    <h1>API CEP</h1>
    <form method="post">
        <input type="text" name="cep" id="cep">
        <button type="submit">Ver</button>
    </form>
    <?php
    $cep = $_POST['cep'] ?? "11689320";
    //file_get_contents() pegar conteúdo de um arquivo
    $url = "https://viacep.com.br/ws/$cep/json/";
    //https://viacep.com.br/ws/11689320/json/
    // $json = file_get_contents($url);
    //decodificar dados json para php, 'true' para que ele decodifique em um array associativo
    // $dados = json_decode($json, true);
    // echo "<pre>";
    // print_r($dados);

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $resposta = curl_exec($curl);
    curl_close($curl);
    $dados = json_decode($resposta, true);

    echo $dados['logradouro'].', '.$dados['bairro'].' - '.$dados['localidade'].'/'.$dados['estado'];
    ?>
</body>
</html>