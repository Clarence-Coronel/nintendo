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
    <script defer src="../script/functions2.js"></script>
    <script defer src="../script/updateInput.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script defer src="../script/jquery.js"></script>
    <title>Delete</title>
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
                    <li><a class="dropdown-item" href="update.php">Update Existing Game</a></li>
                    <li><a class="dropdown-item" href="#">Remove Game</a></li>
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
        <div class="form" id="create-form">
            <div class="head-form">
                <h1>Remove Game</h1>
                <div class="warning">NOTE: The <span class="highlight">game</span> you are about to remove will be permanently deleted on the list, check the information on what you remove <span class="highlight">carefully</span>.</div>
            </div>
            <div class="main-form"> 
                <div class="img-container">
                    <div id="file-upload-form" class="uploader">
                        <input disabled type="file" id="poster" accept="image/png, image/jpg" name="poster">
                        <div id="image-prev" class='filter' onclick="posterInput()">
                                <div id="cover" class="cover">
                                </div>
                                <div id="start" class="start">
                                    <span class="download-text" id="download-text">Game Poster</span>
                                </div>
                        </div>                
                    </div>
                </div>
                <div class="game-input">
                    <div class="input">
                        <label for="gameTitle">TITLE</label>
                        <select onfocus="highlight(this.id)" onblur="exitHighlight(this.id)" class="form-select gameTitle" name="gameTitle" id="gameTitle-update" aria-label="Default select example"> 
                            <option value ="" selected disabled>Select</option>
                            <?php
                                $xml = new DOMDocument('1.0');
                                $xml->load('../data/data.xml');
                                $games = $xml->getElementsByTagName('nintendoGame');

                                foreach($games as $game){
                                    $title =  $game->getElementsByTagName('gameTitle')->item(0)->nodeValue;
                                    echo'<option>'. $title .'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input" autocomplete="off">
                        <label for="console">CONSOLE</label>
                        <input onfocus="highlight(this.id)" onblur="exitHighlight(this.id)" type="text" name="console" id="console" class="form-input" autocomplete="off">
                    </div>
                    <div class="input" autocomplete="off">
                        <label for="genre">GENRE</label>
                        <input onfocus="highlight(this.id)" onblur="exitHighlight(this.id)" type="text" name="genre" id="genre" class="form-input" autocomplete="off">
                    </div>
                    <div class="input" autocomplete="off">
                        <label for="director">DIRECTOR</label>
                        <input onfocus="highlight(this.id)" onblur="exitHighlight(this.id)" type="text" name="director" id="director" class="form-input" autocomplete="off">
                    </div>
                    <div class="input" autocomplete="off">
                        <label for="releaseYear">RELEASE YEAR</label>
                        <input onfocus="highlight(this.id)" onblur="exitHighlight(this.id)" type="text" name="releaseYear" id="releaseYear" class="form-input" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="footer-form">
                <input type="button" class="form-submit" value="REMOVE GAME" id="create-submit" onclick='confirmed()'>
            </div>
        </div>
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
    <div id='holder' style='display:none'>TESTINGGG</div>
    <!-- Modal Trigger -->
    <button id="modal-trigger" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal" style="display:none;">
        Launch demo modal
    </button>
    <!-- Modal -->
    <div class="modal" tabindex="-1" id="deleteModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-content">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="confirm" data-bs-dismiss="modal" onclick='deleteRecord()'>Delete</button>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>