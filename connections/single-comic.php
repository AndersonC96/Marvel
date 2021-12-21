<?php
    if(isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ){// Se a solicitação for AJAX
        if(isset($_GET['comic-id'])){// Se o ID do personagem foi enviado
            $curl = curl_init();// Inicia a conexão
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);// Retorna o resultado da requisição
            $comic_id = htmlentities(strtolower($_GET['comic-id']));// Pega o ID do personagem
            $ts = time();// Pega o timestamp
            $public_key = '08e5826f399b494c9c6fb31a4f0f807c';// Chave pública
            $private_key = 'c7ed3bf104aba381a9f4306621d2d96b7d6e79a5';// Chave privada
            $hash = md5($ts . $private_key . $public_key);// Gera o hash
            $query = array(// Array com os parâmetros da requisição
                'apikey' => $public_key,
                'ts' => $ts,
                'hash' => $hash
            );
            curl_setopt($curl, CURLOPT_URL, "https://gateway.marvel.com:443/v1/public/comics/" . $comic_id . "?" . http_build_query($query));// URL da requisição
            $result = json_decode(curl_exec($curl), true);// Resultado da requisição
            curl_close($curl);// Fecha a conexão
            echo json_encode($result);// Retorna o resultado da requisição
        }else{// Se o ID do personagem não foi enviado
            echo "Erro: ID da HQ inválido";
        }
        }else{// Se a solicitação não for AJAX
            echo "Erro: servidor errado.";
        }
?>