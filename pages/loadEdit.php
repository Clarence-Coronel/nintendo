<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/create.css">
    <title>Editing</title>
</head>
<body>
    <?php
        $xml = new DOMDocument('1.0');
        $xml->formatOutput = true;
        $xml-> preserveWhiteSpace = false;
        $xml->load('../data/data.xml');

        $titleSearch = htmlspecialchars_decode($_POST['gameTitle']);
        $genre = $_POST['genre'];
        $releaseYear = $_POST['releaseYear'];
        $console = $_POST['console'];
        $director = htmlspecialchars($_POST['director']);
        $img = base64_encode(file_get_contents(addslashes($_FILES["poster"]["tmp_name"])));
        
        $games = $xml->getElementsByTagName('nintendoGame');
        
        foreach($games as $game){

            $gameTitle = $game->getElementsByTagName('gameTitle')->item(0)->nodeValue;

            if($titleSearch == $gameTitle){
                $newNode = $xml->createElement('nintendoGame');
                $eGameTitle = $xml->createElement('gameTitle', $titleSearch);
                $eGenre = $xml->createElement('genre', $genre);
                $eReleaseYear = $xml->createElement('releaseYear', $releaseYear);
                $eConsole = $xml->createElement('console', $console);
                $eDirector = $xml->createElement('director', $director);

                $pic = $xml->createElement('image');
                $cdata = $xml->createCDATASection($img);
                $pic->appendChild($cdata);

                $newNode->appendChild($eGameTitle);
                $newNode->appendChild($eGenre);
                $newNode->appendChild($eReleaseYear);
                $newNode->appendChild($eConsole);
                $newNode->appendChild($eDirector);
                $newNode->appendChild($pic);

                $xml->getElementsByTagName('nintendoGames')->item(0)->replaceChild($newNode, $game);
                $xml->save('../data/data.xml');

                echo'<p>Record Updated</p>
                <a href="edit.php">Back</a>';
            }
        }
    ?>

<script>
        window.location.href = "update.php";
    </script>
</body>
</html>