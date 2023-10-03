<?php
        $xml = new DOMDocument("1.0");
        $xml->load('../data/data.xml');
        $games = $xml->getElementsByTagName('nintendoGame');

        $search = strtolower($_REQUEST['q']);

        foreach($games as $game){

            $gameTitle = $game->getElementsByTagName('gameTitle')->item(0)->nodeValue;
            $temp = strtolower($gameTitle);
            if($search == substr($temp, 0, strlen($search))){
                $image = $game->getElementsByTagName('image')->item(0)->nodeValue;
                $year = $game->getElementsByTagName('releaseYear')->item(0)->nodeValue;
                echo '
                <div class="result-container" onclick="clicked(this.id)" id="'. $gameTitle .'"> 
                    <div class="image-container"> 
                        <img class="img-search" src="data:image;base64,'. $image . '"height="150px" width="110px">  
                    </div>
                    <div class="result-detail">
                        <span class="result-title" >'. $gameTitle . '</span>
                        <span class="result-year" >'. $year . '</span>
                    </div>
                </div>';

            }else{
                echo"";
            }
        }
?>
    