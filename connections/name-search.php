<?php
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')){
        if(isset($_GET['name'])){
            $curl = curl_init();
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    $name_to_search = htmlentities(strtolower($_GET['name'])); // HuLk == hulk
                    $ts = time();
                    $public_key = '08e5826f399b494c9c6fb31a4f0f807c';
                    $private_key = 'c7ed3bf104aba381a9f4306621d2d96b7d6e79a5';
                    $hash = md5($ts . $private_key . $public_key);
                    $query = array(
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
            echo "Error: no name given.";
        }
    }else{
    echo "Error: wrong server.";
    }
?>
