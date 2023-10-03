<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/modify.css">
    <link rel="stylesheet" href="../css/modify2.css">
    <link rel="stylesheet" href="../css/imgUp.css">
    <link rel="stylesheet" href="../css/create.css">
    <link rel="stylesheet" href="../css/footer2.css">
    <link rel="stylesheet" href="../css/_e.css">
    <script defer src="../script/functions2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script defer src="../script/jquery.js"></script>
    <title>Update</title>
</head>
<body>
    <header>
        <div class="nintendo-logo">
            <a href="../index.html"><img src="../imgs/Nintendo.png" alt="Nintendo Logo" width="150px" id="nintendoLogo"></a>
        </div>
        <div class="right">
            <div class="search-container">
                <div class="alignment">
                <div class="search">
                <input onkeyup="searchData()"  type="text" name="search-box" id="search-box" class="search-box" placeholder="Search a game...">
                    <img src="../imgs/searchButton.png" alt="Search Button" id="search-button" class="search-button">
                </div>
                <div class="drop" id="drop"></div> 
                </div>
            </div>
          <nav>  
              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle selected" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    GAMES
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><span class="label">GAMES</span></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../index.html">Browse Games</a></li>
                    <li><a class="dropdown-item" href="create.html">Add New Game</a></li>
                    <li><a class="dropdown-item" href="#">Update Existing Game</a></li>
                    <li><a class="dropdown-item" href="delete.php">Remove Game</a></li>
                  </ul>
                  <a class="btn btn-secondary" href="about.html">
                    ABOUT US
                  </a>
              </div>
          </nav>
        </div>
    </header>
    <main>
        <!-- <div class="form">
            <input type="text" id="testField">
            <button onclick="test()">Click me</button>
        </div> -->
    
        <form onsubmit="return validate()" class="form" id="create-form" enctype="multipart/form-data" method="post" action="loadEdit.php">
            <div class="head-form">
                <h1>Update Existing Game</h1>
                <div class="warning">NOTE: The <span class="highlight">game</span> you are about to change will be updated on the list, check the information on what you update <span class="highlight">carefully</span>.</div>
            </div>
            <div class="main-form"> 
                <div class="img-container">
                    <div id="file-upload-form" class="uploader">
                        <input type="file" id="poster" accept="image/png, image/jpg" name="poster">
                        <div id="image-prev" onclick="posterInput()">
                                <div id="cover" class="cover">
                                    <img src="../imgs/download.png" alt="" srcset="">
                                    <span class="download-text">Change <br> Game Poster</span>
                                </div>
                                <div id="start" class="start">
                                    <img src="../imgs/download.png" alt="" srcset="">
                                    <span class="download-text">Upload <br> Game Poster</span>
                                </div>
                        </div>                
                    </div>
                </div>
                <div class="game-input">
                    <div class="input">
                        <label for="gameTitle">TITLE</label>
                        <select onfocus="highlight(this.id)" onblur="exitHighlight(this.id)" class="form-select gameTitle" name="gameTitle" id="gameTitle" aria-label="Default select example"> 
                            <option value ="" selected disabled>Select</option>
                            <?php
                                $xml = new DOMDocument('1.0');
                                $xml->load('../data/data.xml');
                                $games = $xml->getElementsByTagName('nintendoGame');

                                foreach($games as $game){
                                    $title = $game->getElementsByTagName('gameTitle')->item(0)->nodeValue;
                                    echo'<option>'. $title .'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input">
                        <label for="console">CONSOLE</label>
                        <select onfocus="highlight(this.id)" onblur="exitHighlight(this.id)" class="form-select console" name="console" id="console" aria-label="Default select example"> 
                            <option value ="" selected disabled>Select</option>
                            <option value="NES">NES</option>
                            <option value="SNES">SNES</option>
                            <option value="Gameboy">Gameboy</option>
                            <option value="Gameboy Advance">Gameboy Advance</option>
                            <option value="Gamecube">NES</option>
                            <option value="Wii">Wii</option>
                            <option value="Gamecube">Gamecube</option>
                            <option value="Switch">Switch</option>
                        </select>
                    </div>
                    <div class="input">
                        <label for="genre">GENRE</label>
                        <select onfocus="highlight(this.id)" onblur="exitHighlight(this.id)" class="form-select genre" name="genre" id="genre" aria-label="Default select example"> 
                            <option value ="" selected disabled>Select</option>
                            <option value="Puzzle">Puzzle</option>
                            <option value="Shooters">Shooters</option>
                            <option value="Platformer">Platformer</option>
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Racing">Racing</option>
                            <option value="RPG">RPG</option>
                            <option value="Run n' Gun">Run n' Gun</option>
                            <option value="Fighting">Fighting</option>
                            <option value="Social Simulation">Social Simulation</option>
                            <option value="Action-Adventure">Action-Adventure</option>
                            <option value="Action-Platformer">Action-Platformer</option>
                        </select>
                    </div>
                    <div class="input" autocomplete="off">
                        <label for="director">DIRECTOR</label>
                        <input  type="text" name="director" id="director" class="form-input" autocomplete="off">
                    </div>
                    <div class="input" autocomplete="off">
                        <label for="releaseYear">RELEASE YEAR</label>
                        <input  type="text" name="releaseYear" id="releaseYear" class="form-input" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="footer-form">
                <input type="submit" class="form-submit" value="UPDATE GAME" id="create-submit">
            </div>
        </form>
    </main>
    <footer>
        <div class="footer-logo-container">
            <img src="../imgs/grayscaled.png" alt="nintendo logo" class="footer-logo" width="240px">
        </div>
        <p class="footer-desc">
            &copy Nintendo. Games are property of their respective owners. <br>
            Nintendo of America Inc. Headquarters are in Redmond, Washington, USA.
        </p>
        <span class="policy-container">
            <a href="https://www.nintendo.com/ph/about_hp.html" target="_blank">WEBSITE POLICY</a> 
        </span>
    </footer>
    <!-- Modal Trigger -->
    <button id="modal-trigger" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="display:none;">
        Launch demo modal
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="modal-title">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-content">
            ...
            </div>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>