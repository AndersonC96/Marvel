<?php
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')){// Se a solicitação for AJAX
        if(isset($_GET['creator-id'])){// Se o ID do criador foi enviado
            $curl = curl_init();// Inicia a conexão
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);// Retorna o resultado da requisição
            $creator_id = htmlentities(strtolower($_GET['creator-id'])); //FJEkejfdkf = fjekjfdkf
            $ts = time();// Pega o timestamp
            $public_key = '08e5826f399b494c9c6fb31a4f0f807c';// Chave pública
            $private_key = 'c7ed3bf104aba381a9f4306621d2d96b7d6e79a5';// Chave privada
            $hash = md5($ts . $private_key . $public_key);// Gera o hash
            $query = array(// Array com os parâmetros da requisição
                'apikey' => $public_key,
                'ts' => $ts,
                'hash' => $hash,
            );
            curl_setopt($curl, CURLOPT_URL, "https://gateway.marvel.com:443/v1/public/creators/" . $creator_id . "?" . http_build_query($query));
            $result = json_decode(curl_exec($curl), true);
            curl_close($curl);
            echo json_encode($result);
        }else{
            echo "Erro HQ ID inválido.";
        }
    }else{
        echo "Erro: servidor errado.";
    }
?>
