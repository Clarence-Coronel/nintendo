<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/create.css">
    <title>Deleting</title>
</head>
<body>
    <?php
        $xml = new DOMDocument('1.0');
        $xml->load('../data/data.xml');
        
        $games = $xml->getElementsByTagName('nintendoGame');

        $target = $_REQUEST['q'];

        foreach($games as $game){
            $gameTitle = $game->getElementsByTagName('gameTitle')->item(0)->nodeValue;

            if($target == $gameTitle){
                $xml->getElementsByTagName('nintendoGames')->item(0)->removeChild($game);
                $xml->save('../data/data.xml');

                echo'<p>Record Deleted</p>
                <a href="delete.php">Back</a>';
            }
        }
    ?>
    <script>
        window.location.href = "delete.php";
    </script>
</body>
</html>