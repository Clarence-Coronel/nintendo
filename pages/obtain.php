<?php
            $xml = new DOMDocument("1.0");
            $xml->load("../data/data.xml");
            $test = 0;
            $games = $xml->getElementsByTagName("nintendoGame");

            foreach($games as $game){
                $title = strtoupper($game->getElementsByTagName('gameTitle')->item(0)->nodeValue);
                $genre = $game->getElementsByTagName('genre')->item(0)->nodeValue;
                $releaseYear = $game->getElementsByTagName('releaseYear')->item(0)->nodeValue;
                $console = $game->getElementsByTagName('console')->item(0)->nodeValue;
                $director = $game->getElementsByTagName('director')->item(0)->nodeValue;
                $image = $game->getElementsByTagName('image')->item(0)->nodeValue;
                echo'
                    <div class="game" onmouseover="scale(this)">
                        <div class="image-container"> 
                            <img class="uimg" src="data:image;base64,'. $image . '"height="380px" width="300px">  
                        </div>

                        <div class="text-container"> 
                            <h3 class="title">' . $title .'</h3>
                            <div class="genre">' . $genre .'</div>
                            <div class="releaseYear">' . $releaseYear .'</div>
                            <div class="console">' . $console .'</div>
                            <div class="director">' . $director .'</div>
                        </div>
                        
                    </div>
                ';
            }
        ?>