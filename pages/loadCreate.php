<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/modify.css">
    <link rel="stylesheet" href="../css/modify2.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>Creating</title>
</head>
<body>
    <header>
            <div class="nintendo-logo">
                <img src="../imgs/Nintendo.png" alt="Nintendo Logo" width="150px" id="nintendoLogo">
            </div>
            <div class="right">
            <div class="search-container">
                <img src="../imgs/searchButton.png" alt="Search Button" id="search-button" class="search-button">
                <div class="alignment">
                <input onkeyup="searchData()" type="text" name="search-box" id="search-box" class="search-box" placeholder="Search a game...">
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
                        <li><a class="dropdown-item" href="delete.php">Remove Game</a></li>
                    </ul>
                    <a class="btn btn-secondary" href="about.html">
                        ABOUT US
                    </a>
                </div>
            </nav>
            </div>
        </header>
    <?php
        $xml = new DOMDocument('1.0');
        $xml->formatOutput = true;
        $xml->preserveWhiteSpace =false;
        $xml->load('../data/data.xml');

        $gameTitle = htmlspecialchars($_POST['gameTitle']);
        $genre = $_POST['genre'];
        $releaseYear = $_POST['releaseYear'];
        $console = $_POST['console'];
        $director = htmlspecialchars($_POST['director']);
        $img = base64_encode(file_get_contents(addslashes($_FILES["poster"]["tmp_name"])));

        $eGame = $xml->createElement('nintendoGame');

        $eTitle = $xml->createElement('gameTitle', $gameTitle);
        $eGenre = $xml->createElement('genre', $genre);
        $eReleaseYear = $xml->createElement('releaseYear', $releaseYear);
        $eConsole = $xml->createElement('console', $console);
        $eDirector = $xml->createElement('director', $director);
    
        $pic = $xml->createElement('image');
        $cdata = $xml->createCDATASection($img);
        $pic->appendChild($cdata);

        $eGame->appendChild($eTitle);
        $eGame->appendChild($eGenre);
        $eGame->appendChild($eReleaseYear);
        $eGame->appendChild($eConsole);
        $eGame->appendChild($eDirector);
        $eGame->appendChild($pic);

        $xml->getElementsByTagName('nintendoGames')->item(0)->appendChild($eGame);
        $xml->save('../data/data.xml');

        echo'<p>Record Saved</p>
        <a href="create.php">Back</a>';
    ?>
    <script>
        window.location.href = "create.html";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>
