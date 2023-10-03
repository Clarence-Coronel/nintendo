<?php
            $xml = new DOMDocument("1.0");
            $xml->load("../data/data.xml");
            $test = 0;
            $games = $xml->getElementsByTagName("nintendoGame");
            $search = strtolower($_REQUEST['q']);

            foreach($games as $game){
                $gameTitle = $game->getElementsByTagName('gameTitle')->item(0)->nodeValue;
                if($search == strtolower($gameTitle)){
                    $genre = $game->getElementsByTagName('genre')->item(0)->nodeValue;
                    $releaseYear = $game->getElementsByTagName('releaseYear')->item(0)->nodeValue;
                    $console = $game->getElementsByTagName('console')->item(0)->nodeValue;
                    $director = $game->getElementsByTagName('director')->item(0)->nodeValue;
                    $image = $game->getElementsByTagName('image')->item(0)->nodeValue;
                    echo'
                        <div class="game_e">
                            <div class="image-container_e"> 
                                <img class="image-search_e" src="data:image;base64,'. $image . '"height="190px" width="150px">  
                            </div>

                            <div class="text-container_e"> 
                                <h3 class="title_e">' . $gameTitle .'</h3>
                                <div class="genre_e">' . $genre .'</div>
                                <div class="releaseYear_e">' . $releaseYear .'</div>
                                <div class="console_e">' . $console .'</div>
                                <div class="director_e">' . $director .'</div>
                            </div>
                            
                        </div>
                    ';
                }
            }
?>