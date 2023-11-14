<?php

$client_id = '0a2df32981fb4b02a2f0b5e63f13385f';
$client_secret = 'bd01819477b44c2c9bcf32b28cf045f6';

// Configuração da solicitação
$authOptions = array(
    'headers' => array(
        'Authorization: Basic ' . base64_encode($client_id . ':' . $client_secret),
    ),
    'form' => array(
        'grant_type' => 'client_credentials',
    ),
);

// Configuração do contexto para a solicitação HTTP
$context = stream_context_create(array(
    'http' => array(
        'method' => 'POST',
        'header' => implode("\r\n", $authOptions['headers']),
        'content' => http_build_query($authOptions['form']),
    ),
));

// Realiza a solicitação usando file_get_contents()
$requisicao_token = file_get_contents('https://accounts.spotify.com/api/token', false, $context);

// Decodifica a resposta JSON
$dados_token = json_decode($requisicao_token);

$token = $dados_token->access_token;

?>