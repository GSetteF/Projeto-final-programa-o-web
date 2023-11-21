<?php

include_once("spotify_api_token.php");

function pesquisa_musica($token, $pesquisa)
{
    // Define a URL da API de pesquisa do Spotify.
    $url = "https://api.spotify.com/v1/search";

    // Define um cabeçalho de autorização com o token de autenticação fornecido.
    $headers = [
        "Authorization: Bearer " . $token,
    ];

    // Cria uma string de consulta com o nome do artista e o tipo de pesquisa (artista).
    $query = http_build_query([
        "q" => $pesquisa,
        "type" => "track",
        "limit" => 1,
    ]);

    $context = stream_context_create([
        'http' => [
            'header' => implode("\r\n", $headers)
        ]
    ]);

    // Formata a string de consulta para ser usada com a função file_get_contents().
    $query_url = sprintf("%s?%s", $url, $query);

    // Faz uma solicitação HTTP GET para a URL de consulta.
    $response = @file_get_contents($query_url, false, $context);

    // Verifica se a solicitação foi bem-sucedida.
    if ($response === false) {
        return null;
    }

    // Converte a resposta JSON em um objeto PHP.
    $json_result = json_decode($response);

    // Retorna o objeto JSON.
    return $json_result;
}


?>