<?php

function pesquisa_wiki($pesquisa){
    $pesquisa = str_replace(' ', '_', $pesquisa); //formatando o input do usuário

    $url = "https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&titles=".ucwords("$pesquisa")."&redirects=true";

    $buscar= file_get_contents( $url );

    $dados_wiki = json_decode( $buscar, true );

    #precisamos descobrir o num da pagina para acessar o texto
    foreach( $dados_wiki["query"]["pages"] as $key => $value ) {
        $pag_id = $key;
        break;
    }

    $texto = $dados_wiki["query"]["pages"][$pag_id]["extract"];

    function resumo_wiki($texto){
        $num_frases = 6;
        $i = 0;
        $pos_ponto = 0; 

        while( $i < $num_frases ) {
            $pos_ponto = strpos($texto,".", $pos_ponto+1);
            $i ++;
        }
        $resumo = substr($texto, 0, $pos_ponto+1);
        return "$resumo";
    }

    return resumo_wiki($texto);

}
?>