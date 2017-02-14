<!DOCTYPE html>
<html>
	<?php
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$start = $time;
	?>
	<head>
		<title><?php echo $config['site_title']; ?></title>

		<meta charset="utf-8">
		<meta http-equiv="content-language" content="en">
		<meta name="description" content="Tibia is a free massively multiplayer online role-playing game (MMORPG)">
		<meta name="keywords" content="opentibia, free online rpg, free mmorpg, mmorpg, mmog, online role playing game, online multiplayer game, internet game, online rpg, rpg">

		<!-- Icons -->
		<link rel="shortcut icon" href="layout/images/favicon.gif" />

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="layout/css/style.css">
		<link rel="stylesheet" type="text/css" href="layout/css/bootstrap.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<!-- JS -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	</head>

	<body>
		<div id="container">
			<div class="header"></div>
			<nav class="navbar navbar-inverse" role="navigation">
				<div class="container-fluid">
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?php include('layout/menu.php'); ?>
					</div>
				</div>
			</nav>

			<div class="sidebar">
				<?php
					if (user_logged_in() && is_admin($user_data)) include 'layout/widgets/Wadmin.php'; 				
					include('layout/widgets/topplayers.php');
					include('layout/widgets/serverinfo.php');
					include('layout/widgets/serverstatus.php');
				?>
			</div>

			<div class="content">
				<div class="panel panel-default">
					<div class="panel-body">
