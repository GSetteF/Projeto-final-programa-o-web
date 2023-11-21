<?php

include_once("spotify_api_artist.php");
function get_top_rated($token, $artista_id){
    // Define a URL da API de pesquisa do Spotify.
    $url = "https://api.spotify.com/v1/artists/" . "$artista_id" . "/top-tracks?country=BR";

    // Define um cabeçalho de autorização com o token de autenticação fornecido.
    $headers = [
        "Authorization: Bearer " . $token,
    ];


    $context = stream_context_create([
        'http' => [
            'header' => implode("\r\n", $headers)
        ]
    ]);

    // Faz uma solicitação HTTP GET para a URL de consulta.
    $response = file_get_contents($url, false, $context);

    // Verifica se a solicitação foi bem-sucedida.
    if ($response === false) {
        return null;
    }

    // Converte a resposta JSON em um objeto PHP.
    $json_result = json_decode($response);

    // Retorna o objeto JSON.
    return $json_result->tracks;
}

/*
$i = 1;
echo "As músicas mais escutadas do Gorillaz: <br>";
foreach ($top_rated as $top_rated) {
$nome = $top_rated->name;
echo" $i ° : $nome <br>";
$i ++;
}
*/

?>