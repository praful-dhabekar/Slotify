<?php
include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");

//session_destroy(); LOGOUT

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}

?>

<html>
<head>
	<title>Welcome to Slotify!</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="assets/js/jQuery.js"></script>
	<script src="assets/js/script.js"></script>
</head>

<body>

	<div id="mainContainer">

		<div id="topContainer">

			<?php include("includes/navBarContainer.php"); ?>

			<div id="mainViewContainer">

				<div id="mainContent">
