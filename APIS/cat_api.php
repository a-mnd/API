<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat API</title>
</head>

<body>
    <h1>API de gatinhos</h1>
    <form method="post">
        <!-- <label for="breed">Raça de gato</label>
        <input type="text" name="breed" id="breed" placeholder="tudo minusculo e em ingles"> -->
        <select name='breed' id='breed'>
            <?php
            foreach ($breeds as $breed) {
                echo "<option value='" . $breed['id'] . "'>" . $breed['name'] . "</option>";
            }
            ?>
        </select>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $breed = $_POST['breed'];
    }

    $demoKey = "live_0Dm2JIatnJ69Qs1vzLchwxBjcUMfwMP7KxlW6tA9AIcKShlkL8ktev4c0P1Xg3z0";
    $url = "https://api.thecatapi.com/v1/images/search?limit=30&api_key=$demoKey"; //&breed_ids=$breed

    $json = file_get_contents($url);
    $dados = json_decode($json, true);

    // echo "<pre>";
    // print_r($dados);

    foreach ($dados as $gato) {
        echo "<img src='" . $gato['url'] . "' alt='Gato' style='width:200px; height:auto;'/>";
    }
    ?>
</body>

</html>