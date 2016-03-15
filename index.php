<?php session_start(); ?>
<html>
	<head>
		<link rel="stylesheet" href="index.css"></style>
		<title>ARC Recreation Coordinator</title>
	</head>
	<body>
		<div id="main">
			<div id="top">
				<img id="headerimage" src="Header.png"><img>
				<img src="Logo.png"></img>
				<div id="header">
					<ul id="navigation">
						<li><a href="index.php">Home</a></li>
						<li><a href="index.php">About</a></li>
						<li><a href="index.php">Activities</a></li>
						<li><a href="index.php">Reservations</a></li>
					</ul>
					<ul id="account">
						<?php if (array_key_exists('username', $_SESSION)): ?>
							<li><a href="logout.php">Log Out</a></li>
							<li>Logged in as <?php echo $_SESSION['username']; ?></li>
						<?php else: ?>
							<li><a href="signin.php">Log In</a></li>
							<li><a href="signup.php">Join</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div id="body">
			<div id="pagetitle">Home Page</div>
			<div id="content">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut orci accumsan, posuere purus quis, maximus dolor. Proin tempor ex vestibulum, pharetra ante ut, elementum orci. Etiam condimentum pellentesque dui, vel pellentesque leo sagittis euismod. Nulla consectetur sem sapien, ac lobortis nibh faucibus eu. Fusce mi neque, dictum et nisi sed, faucibus varius lectus. Etiam ut lacinia nulla. Maecenas gravida neque sed scelerisque hendrerit. Vestibulum malesuada justo nibh, at malesuada dui imperdiet vitae. Nam non cursus nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec sit amet sapien tincidunt, fringilla tellus sed, sollicitudin turpis. Curabitur rhoncus, orci vitae vulputate posuere, ligula nisi fermentum nunc, eget tincidunt tellus sem sit amet mauris. Aliquam erat volutpat.<br><br>

Donec nisl justo, euismod nec accumsan in, vulputate sit amet nisi. Nulla tincidunt neque sit amet scelerisque congue. Phasellus ac lorem dignissim, ultrices erat sit amet, imperdiet purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut eleifend rhoncus nunc nec lobortis. Pellentesque viverra, nisi eget efficitur feugiat, nisl urna tristique elit, ac elementum diam nisi ac odio. Donec fermentum nisl est, eget elementum tortor gravida a. Donec nec odio ut elit tincidunt aliquet ac vel diam. Etiam in erat id lectus molestie ultrices. Morbi urna nibh, rhoncus nec mattis quis, efficitur in erat. Praesent porta est eget viverra elementum.<br><br>

Cras vel mauris ut orci scelerisque bibendum. Sed in sodales sem. Praesent consectetur lobortis mi, id faucibus enim placerat sit amet. Sed gravida, purus non consequat fringilla, turpis lectus aliquet mi, at porttitor ligula purus in nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla non tortor orci. Integer enim est, ornare tempus porttitor vitae, blandit sed metus. Vivamus est diam, sodales non pretium vitae, fermentum a enim. Mauris suscipit euismod eros. In lectus diam, accumsan at cursus a, lobortis eu mi. Quisque ut elit nisi.<br><br>

Nullam enim dui, cursus et felis non, luctus pharetra nibh. Quisque malesuada rhoncus rutrum. Vivamus tellus diam, commodo quis bibendum vel, vehicula in turpis. Integer bibendum ante a dui fermentum facilisis. Praesent posuere vel mi sit amet sodales. Morbi eu augue libero. Mauris ac est a lacus bibendum pulvinar nec a lacus. In vehicula tortor quis nisi fermentum, vel pellentesque eros mattis. Etiam fermentum sodales blandit. Etiam sodales ultricies nisl sed fringilla. Pellentesque sit amet velit sollicitudin nulla eleifend sagittis sit amet a augue. Nam ut lacus est. Sed lacinia risus commodo euismod gravida. Etiam ac metus neque. Etiam tempor luctus justo sit amet imperdiet. Fusce sit amet orci id ex congue interdum vitae id sapien.<br><br>

Proin dictum tincidunt lacus non ullamcorper. Donec euismod lectus id felis sollicitudin, consectetur eleifend sem ullamcorper. Nunc rhoncus, sem vel commodo faucibus, ex erat commodo turpis, eu facilisis purus magna eget felis. Aliquam ligula augue, tristique tincidunt libero non, blandit pretium diam. Morbi in massa vel odio hendrerit iaculis sit amet quis ipsum. Morbi tincidunt vitae justo at varius. Mauris eu erat vehicula, cursus odio ut, dapibus elit. Curabitur pulvinar massa non ipsum molestie, at convallis orci eleifend. Maecenas finibus interdum eros, sed interdum urna ultricies sed. Sed suscipit magna elit, eu vestibulum neque volutpat quis. Aenean id felis scelerisque, vestibulum risus nec, venenatis turpis. Aenean euismod dolor mattis ipsum condimentum hendrerit. 
</div>
			</div>
		</div>
  	</body>
</html>