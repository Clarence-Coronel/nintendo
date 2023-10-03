<?php
    $xml = new DOMDocument();
    $xml->load("../data/data.xml");

    $lists = $xml->getElementsByTagName("gameTitle");

    $regGame = $_REQUEST["q"];
    
    $flag = 0;

    foreach($lists as $list){
        if(strtolower($regGame) == strtolower($list->nodeValue)){
            $flag++;
            echo "0";
            break;
        }
    }
    
    if($flag == 0){
        echo "1";
    }

?>