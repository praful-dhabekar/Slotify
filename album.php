<?php include("includes/header.php");

  if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
  }
  else {
    header("Location: index.php");
  }
$album = new Album($con, $albumId);

$artist =  $album->getArtist();

?>
  <div class="entityInfo">
    <div class="leftSection">
      <img src="<?php echo $album->getArtWorkPath(); ?>" title="<?php echo $album->getTitle(); ?>" alt="">
    </div>
    <div class="rightSection">
      <h2><?php echo $album->getTitle(); ?></h2>
      <p>By <?php echo $artist->getName(); ?></p>
      <p><?php echo $album->getNumberOfSongs(); ?> Songs</p>
    </div>
  </div>

  <div class="trackListContainer">
    <ul class="trackList">
      <?php
            $i = 1;
            $songIdArray = $album->getSongIds();
            foreach ($songIdArray as $key => $songId) {

              $albumSong = new Song($con, $songId);
              $albumArtist = $albumSong->getArtist();
              echo "<li class='trackListRow'>
                      <div class='trackCount'>
                        <img class='play' src='assets/images/icons/play-white.png' >
                        <span class='trackNumber'>$i</span>
                      </div>

                      <div class='trackinfo'>
                        <span class='trackName'>".$albumSong->getTitle()."</span>
                        <span class='artistName'>".$albumArtist->getName()."</span>
                      </div>

                      <div class='trackOption'>
                        <img class='optionButton' src = 'assets/images/icons/more.png' >
                      </div>

                      <div class='trackDuration'>
                        <span class='Duration'>".$albumSong->getDuration()."</span>
                      </div>

                    </li>";
                $i++;
            }
        ?>
    </ul>
  </div>
<?php include("includes/footer.php"); ?>
