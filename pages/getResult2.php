<?php
            $xml = new DOMDocument("1.0");
            $xml->load("../data/data.xml");
            $test = 0;
            $games = $xml->getElementsByTagName("nintendoGame");
            $search = strtolower($_REQUEST['q']);
            echo $search;

            foreach($games as $game){
                $gameTitle = $game->getElementsByTagName('gameTitle')->item(0)->nodeValue;

                

                if($search == strtolower($gameTitle)){
                    $genre = $game->getElementsByTagName('genre')->item(0)->nodeValue;
                    $releaseYear = $game->getElementsByTagName('releaseYear')->item(0)->nodeValue;
                    $console = $game->getElementsByTagName('console')->item(0)->nodeValue;
                    $director = $game->getElementsByTagName('director')->item(0)->nodeValue;
                    $image = $game->getElementsByTagName('image')->item(0)->nodeValue;

                        echo '
                            <img id="image-data" src="data:image;base64,'. $image . '"height="190px" width="150px">  
                            <span id="genre-data">'. $genre .'</span>
                            <span id="console-data">'. $console .'</span>
                            <span id="releaseYear-data">'. $releaseYear .'</span>
                            <span id="director-data">'. $director .'</span>
                        ';

                    
                }
                else{
                    echo'error! ';
                }
            }
?>