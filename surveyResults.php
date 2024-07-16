<!--surveyResults.php-->
<?php 
class Songs {
    private $outfile = "outfile.txt";

    function getSongList() {
        if (file_exists($this->outfile)) {
            $fileContents = file_get_contents($this->outfile);
            if ($fileContents) {
                return json_decode($fileContents, true);
            }
        }
        return [];
    }
}

$songs = new Songs(); 
$songList = $songs->getSongList();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Results from Favorite Songs Survey</title>
</head>
<body>
    <h1>Results For Favorite Songs</h1>
    <ul>
        <?php foreach ($songList as $song): ?>
            <li>
                SongName: <?= htmlspecialchars($song["song"]) ?>
                <ul>
                    <li>Composer: <?= htmlspecialchars($song["composer"]) ?></li>
                    <li>Artist: <?= htmlspecialchars($song["artist"]) ?></li>
                </ul>    
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

