<!-- dataCollectionFromHTML1.php --> 
<?php

 
// $file = fopen($outfile, "(a for append, w for write, r for read"); 
// if (!$file) {
//    die("no file matches $outfile");}
// $outfileContents = fread($file, filesize($outfile));
// fclose($file);

class Songs {
    private $outfile = "outfile.txt";

    public $songlist = ["song"=>"n1","comp"=>"n2","art"=>"n3"];

    function addSongToList($song, $co, $ar) {
        $newSong = [
            "song" => $song,
            "composer" => $co,
            "artist" => $ar
        ];
        $currentList = $this->readFromFile();
        $currentList[] = $newSong;
        $this->writeToFile($currentList);
        //foreach ($song as $s, $co as $c, $ar as $a);
            // (leave comment) make the song, composer, and artist append or overwrite the array and write to a file
        //  $songlist = ("song"=>$song, "comp"=>$c, "art"=>$a)
        //fwrite($outfile, $songlist . PHP_EOL)
    } 
    
    private function readFromFile() {
        if (file_exists($this->outfile)) {
            $fileContents = file_get_contents($this->outfile);
            if ($fileContents) {
                return json_decode($fileContents, true);
            }
        }
        return [];
    }

    private function writetoFile($data) {
        file_put_contents($this->outfile, json_decode($data));
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $songName = $_POST["songName"];
    $composer = $_POST["composer"];
    $artist = $_POST["artist"];
    
    $songs = new Songs();
    $songs->addSongToList($songName, $composer, $artist)
}

?>
