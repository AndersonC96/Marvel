<?php
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')){// Se a solicitação for AJAX
        if(isset($_GET['name'])){// Se o nome do personagem foi enviado
            $curl = curl_init();// Inicia a conexão
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);// Retorna o resultado da requisição
            $name_to_search = htmlentities(strtolower($_GET['name'])); // HuLk == hulk
            $ts = time();// Pega o timestamp
            $public_key = '08e5826f399b494c9c6fb31a4f0f807c';// Chave pública
            $private_key = 'c7ed3bf104aba381a9f4306621d2d96b7d6e79a5';// Chave privada
            $hash = md5($ts . $private_key . $public_key);// Gera o hash
            $query = array(// Array com os parâmetros da requisição
                "name" => $name_to_search, // ""
                "orderBy" => "name",
                "limit" => "20",
                'apikey' => $public_key,
                'ts' => $ts,
                'hash' => $hash,
            );
            $marvel_url = 'https://gateway.marvel.com:443/v1/public/characters?' . http_build_query($query);
            curl_setopt($curl, CURLOPT_URL, $marvel_url);
            $result = json_decode(curl_exec($curl), true);
            curl_close($curl);
            echo json_encode($result);
        }else{
            echo "Erro: nenhum nome fornecido.";
        }
    }else{
    echo "Erro: servidor errado.";
    }
?>
