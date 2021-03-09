<?php
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')){
        if(isset($_GET['creator-id'])){
            $curl = curl_init();
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    $creator_id = htmlentities(strtolower($_GET['creator-id'])); //FJEkejfdkf = fjekjfdkf
                    $ts = time();
                    $public_key = '08e5826f399b494c9c6fb31a4f0f807c';
                    $private_key = 'c7ed3bf104aba381a9f4306621d2d96b7d6e79a5';
                    $hash = md5($ts . $private_key . $public_key);
                    $query = array(
                        'apikey' => $public_key,
                        'ts' => $ts,
                        'hash' => $hash,
                    );
                    curl_setopt($curl, CURLOPT_URL,
                        "https://gateway.marvel.com:443/v1/public/creators/" . $creator_id . "?" . http_build_query($query)
                    );
                    $result = json_decode(curl_exec($curl), true);
                        curl_close($curl);
                        echo json_encode($result);
        }else{
            echo "Error comic-id invalid.";
        }
    }else{
        echo "Error: wrong server.";
    }
?>
