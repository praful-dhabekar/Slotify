<?php
		$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");
		$resultArray = array();
		while ($row = mysqli_fetch_array($songQuery)) {
			array_push($resultArray, $row['id']);
		}
		$jsonArray = json_encode($resultArray);

  ?>

<script>
					$(document).ready(function(){
								currentPlaylist = <?php echo $jsonArray; ?>;
								audioElement = new Audio();
								setTrack(currentPlaylist[0], currentPlaylist, false );

								$(".playbackBar .progressBar").mousedown(function() {
										mouseDown = true;
								});

								$(".playbackBar .progressBar").mousemove(function(e) {
										if (mouseDown) {
											//Set time of song, depending on position of mouse
											timeFromOffSet(e, this);
										}
								});
								$(".playbackBar .progressBar").mouseup(function(e) {
											//Set time of song, depending on position of mouse
											timeFromOffSet(e, this);
								});
					});

					function timeFromOffSet(mouse, progressBar) {
						var percentage = mouse.offsetX = (this).width() * 100;
						var seconds = audioElement.audio.duration * (percentage/100);
						audioElement.setTime(seconds);
					}

					function setTrack(trackId, newPlaylist, play) {
							//AJAX call
							$.post("includes/handlers/Ajax/getSongJson.php", { songId: trackId}, function(data) {
									var track = JSON.parse(data);

									$(".trackName span").text(track.title);
									$.post("includes/handlers/Ajax/getArtistJson.php", { artistId: track.artist}, function(data) {
												var artist = JSON.parse(data);
												$(".artistName span").text(artist.name);
									});
									$.post("includes/handlers/Ajax/getAlbumJson.php", { albumId: track.album}, function(data) {
												var album = JSON.parse(data);
												$(".albumLink img").attr("src", album.artworkPath);

									});

									audioElement.setTrack(track);
									playSong();
							});
							if (play) {
								audioElement.play();
							}

					}

					function playSong() {
						if (audioElement.audio.currentTime == 0) {
							$.post("includes/handlers/Ajax/updatePlays.php", { songId: audioElement.currentlyPlaying.id});
						}
						$(".controlButton.play").hide();
						$(".controlButton.pause").show();
						audioElement.play();

					}
					function pauseSong() {
						$(".controlButton.play").show();
						$(".controlButton.pause").hide();
						audioElement.pause();
					}
</script>

<div id="nowPlayingBarContainer">

	<div id="nowPlayingBar">

		<div id="nowPlayingLeft">
			<div class="content">
				<span class="albumLink">
					<img src="" class="albumArtwork">
				</span>

				<div class="trackInfo">

					<span class="trackName">
						<span></span>
					</span>

					<span class="artistName">
						<span></span>
					</span>

				</div>
			</div>
		</div>

		<div id="nowPlayingCenter">

			<div class="content playerControls">

				<div class="buttons">

					<button class="controlButton shuffle" title="Shuffle button">
						<img src="assets/images/icons/shuffle.png" alt="Shuffle">
					</button>

					<button class="controlButton previous" title="Previous button">
						<img src="assets/images/icons/previous.png" alt="Previous">
					</button>

					<button class="controlButton play" title="Play button">
						<img src="assets/images/icons/play.png" alt="Play" onclick="playSong()">
					</button>

					<button class="controlButton pause" title="Pause button" onclick="pauseSong()" style="display: none;" >
						<img src="assets/images/icons/pause.png" alt="Pause">
					</button>

					<button class="controlButton next" title="Next button">
						<img src="assets/images/icons/next.png" alt="Next">
					</button>

					<button class="controlButton repeat" title="Repeat button">
						<img src="assets/images/icons/repeat.png" alt="Repeat">
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
