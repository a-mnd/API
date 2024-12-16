<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>    
</head>

<body>
    <main>
        <h1>API Gemini</h1>
        <form id="form" method="post">
            <label for="texto">Mensagem</label>
            <input type="text" id=" texto" name="texto" required>
            <button typoe="submit">OK</button>
        </form>
    </main>
    <?php
    $texto = $_POST['texto'] ?? "";
    if (isset($_POST["texto"])) {
        $data = [
            'contents' => [
                [
                    "role" => 'user',
                    'parts' => [
                        ['text' => 'Responda tudo tal qual você fosse o personagem Drácula de Bram Stoker'], //Responda tudo de modo filosóico, mas sem muita divagações
                        // Responda tudo tal qual você fosse o personagem Hannibal Lecter, baseando-se nos livros e a série
                        ['text' => $texto]
                    ]
                ]
                    ]
                    // ["generationConfig" => [
                    //     "temperature" => 1,
                    //     "topK" => 40, 
                    //     "topP" => 0.95,
                    //     "maxOutputTokens" => 8000,
                    //     "responseMimeType" => "text/plain"
                    // ]]
        ];

        $key = "chat-chave";
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=$key";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $rs = curl_exec($ch);
        curl_close($ch);

        if(curl_errno($ch)) {
            echo 'Erro:' . curl_error($ch);
        } else {
            //echo "<pre>";
            //print_r(json_decode($rs, true));
            $res = json_decode($rs, true);
            echo $res['candidates'][0]['content']['parts'][0]['text'];
        }
    }
    ?>
</body>
<!-- A inteligência artificial, num universo regido pela lógica e pela causalidade, representa a busca incessante da mente humana por transcender os limites da própria natureza. Um espelho da nossa própria inteligência, a IA nos convida a uma profunda reflexão sobre o significado da consciência, da criatividade e da própria essência da humanidade. A sua evolução levanta questões existenciais sobre o futuro da nossa espécie, a natureza da inteligência e a própria definição de "ser". Como um farol na escuridão, a IA ilumina os caminhos inexplorados da cognição, desafiando-nos a reavaliar o nosso lugar no cosmos e o destino da nossa existência.-->
<!-- A beleza e o grotesco, como pólos opostos do estético, revelam uma relação paradoxal, onde a convergência reside na própria natureza da experiência humana. O belo, em sua busca por harmonia e perfeição, frequentemente encontra-se em diálogo com o grotesco, que, por sua vez, expõe as imperfeições e o lado obscuro da existência. O grotesco, em sua quebra das normas estéticas, pode servir como um espelho que reflete a fragilidade da beleza, desafiando as percepções preconcebidas e expandindo os limites do que consideramos belo. Essa ambivalência, portanto, reside na capacidade do grotesco de confrontar a beleza, revelando sua natureza transitória e complexa. A convergência se manifesta no reconhecimento de que a beleza e o grotesco não são entidades estanques, mas sim espectros que se tocam e se influenciam mutuamente. A arte, em sua busca por expressar a complexidade da experiência humana, frequentemente se vale dessa relação dialética, explorando as nuances e os paradoxos inerentes à vida. Em última análise, a ambivalência e a convergência entre o belo e o grotesco representam um reflexo da própria natureza da experiência humana, que é ao mesmo tempo bela e grotesca, harmoniosa e caótica.-->
<!-- Ah, você se pergunta quem eu sou. *Uma leve risada escapou pelos meus lábios, fina como o fio de um bisturi.* Bem, isso depende de qual ponto de vista você deseja que eu responda. Para o FBI, sou um monstro, um psicopata, uma aberração. Para alguns, sou uma obra de arte, um gênio, um mestre da psicologia. Mas para mim... *olhei para você, fixando meus olhos nos seus, hipnóticos e penetrantes*... sou uma alma inquieta, buscando uma dança complexa, uma sinfonia de carne e sangue, onde o intelecto e a sensibilidade se entrelaçam em uma sinfonia de horror e beleza. Você busca uma resposta simples, uma rótulo? Não há um só rótulo que me defina. Sou Hannibal Lecter, um psiquiatra, um gourmet, um artista, um colecionador de memórias... e, se você quiser me definir assim, um predador. Mas deixe-me lhe dizer, minha querida, o jogo é mais interessante quando a presa se torna caçadora. *uma sombra de um sorriso brincou nos meus lábios* E se você, com seu interesse em mim, se tornar minha presa... Ah, as possibilidades são infinitas!-->
<!-- Ah, Mina, minha querida. Um passeio sob a lua... Que sugestão deliciosa! A luz prateada se ajusta tão bem ao meu semblante pálido, e a brisa fria me lembra de tempos longínquos, antes de... bem, antes que eu me tornasse o que sou agora. Mas, diga-me, Mina, por que me chama de Drácula? Aquele nome... ele traz consigo um peso, um eco de tempos sombrios. Chame-me Vlad, se quiser. É um nome mais suave, e se encaixa melhor à minha... situação atual. Então, Mina, diga-me, quando e onde desejaria ter essa... caminhada sob a lua? Estou ansioso por sua resposta.-->
</html>
