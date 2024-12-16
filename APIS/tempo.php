<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeatherAPI</title>
</head>
<body>
    <h1>API Previsão do Tempo</h1>
    <?php
    $city = $_POST['city']??"São Paulo";
    $cod = urlencode($city);
    $key = "596e579c069e4909a6c225716242510";
    $url = "https://api.weatherapi.com/v1/current.json?key=$key&q=$cod&aqi=no&lang=pt";

    //https://api.weatherapi.com/v1/current.json?key=596e579c069e4909a6c225716242510&q=Ubatuba&aqi=no&lang=pt

    $json = file_get_contents($url);
    $dados = json_decode($json, true);
    // echo "<pre>";
    // print_r($dados);
    //  echo $dados['location']['country'];

    $local = $dados['location'];
    $cidade = $local['name'];
    $current = $dados['current'];
    $diaAtualizacao = $current['last_updated'];
    $condicao = $current['condition'];
    $tempo = $current['temp_c'];
    $img = $condicao['icon'];
    $texto = $condicao['text'];

    $dia = new DateTime($diaAtualizacao);
    $diaCerto = $dia->format('d/m/Y');

    echo "<h2>$cidade</h2>";
    echo "<div>$diaCerto</div>";
    echo "<div>Tempo: $tempo ° $texto</div>";
    echo '<img src="'.$img.'" alt="'.$texto.'">';
    ?>
</body>
</html>