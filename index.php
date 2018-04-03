<?php

      include 'includes\config.php';

      #session_destroy(); //LOGOUT

      if(isset($_SESSION['userLoggedIn'])) {
        $userLoggedIn = $_SESSION['userLoggedIn'];
      }
      else {
      	header("Location: register.php");
      }

  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="assets/images/icons/spotify.png"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Welcome to Slotify!</title>
  </head>
  <body>
      <div id="mainContainer">
        <div id="nowPlayingBarContainer">

            <div id="topContainer">
              <div id="navBarContainer">

              </div>
            </div>
            <div class="footer">
            <div id="nowPlayingBar">

                <div id="nowPlayingLeft">
                  <div class="content">
                    <span class="albumLink">
                      <img src="https://is1-ssl.mzstatic.com/image/thumb/Music3/v4/78/36/42/783642fb-4d8b-84c1-79c8-d8a99ce60d2c/5054316967835_cover.jpg/268x0w.jpg" alt="" class="albumArtWork">
                    </span>
                    <div class="trackInfo">
                      <span class="trackName">
                          <span>Candyland</span>
                      </span>
                      <span class="artistName">
                          <span>Tobu</span>
                      </span>
                    </div>
                  </div>
                </div>
                <div id="nowPlayingCenter">
                    <div class="content playerControls">

                      <div class="buttons ">
                        <button class="controlButton shuffle" type="button" name="button" title="Shuffle">
                          <img src="assets/images/icons/shuffle.png" alt="Shuffle">
                        </button>

                        <button class="controlButton previous" type="button" name="button" title="previous">
                          <img src="assets/images/icons/previous.png" alt="previous">
                        </button>

                        <button class="controlButton play" type="button" name="button" title="play">
                          <img src="assets/images/icons/play.png" alt="play">
                        </button>

                        <button class="controlButton pause" type="button" name="button" title="pause" style="display: none;">
                          <img src="assets/images/icons/pause.png" alt="pause">
                        </button>

                        <button class="controlButton next" type="button" name="button" title="next">
                          <img src="assets/images/icons/next.png" alt="next">
                        </button>

                        <button class="controlButton repeat" type="button" name="button" title="repeat">
                          <img src="assets/images/icons/repeat.png" alt="repeat">
                        </button>
                    </div>
                    <div class="playbackBar">
                      <span class="progressTime current">0.00</span>
                        <div class="progressBar">
                          <div class="progressBarBg">
                            <div class="progress"></div>
                          </div>
                        </div>
                      <span class="progressTime remaining">0.00</span>
                    </div>
                    </div>
                </div>


                <div id="nowPlayingRight">
          				<div class="volumeBar">

          					<button class="controlButton volume" title="Volume button">
          						<img src="assets/images/icons/volume.png" alt="Volume">
          					</button>

          					<div class="progressBar">
          						<div class="progressBarBg">
          							<div class="progress"></div>
          						</div>
          					</div>

          				</div>
          			</div>


          </div>
        </div>
        </div>
      </div>

  </body>
</html>
