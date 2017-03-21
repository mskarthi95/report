	<!-- PHP SCript to fetch the data from database-->
	<?php
	$link = mysqli_connect('localhost','root','','full');
	if (!$link) {
	die('Could not connect to MySQL: ' . mysql_error());
	}
		$qry="SELECT * FROM `daily_count`";
		$qry2=mysqli_query($link,$qry) or die (mysqli_error($link));
		$pts= array();
		$ucount= array();
		while($row = mysqli_fetch_array($qry2, MYSQL_ASSOC)) {
		$pts[]=$row['u_date'];
		$ucount[]=$row['pts_count'];
		}

		function js_str($s)
		{
		return '"' . addcslashes($s, "\0..\37\"\\") . '"';
		}

		function js_array($array)
		{
		$temp = array_map('js_str', $array);
		return '[' . implode(',', $temp) . ']';
		}
		?>
	<!-- PHP Script is over-->

<!-- HTML UI Start -->
	
		<html>
		<head>
		<title>Chart Report</title>
		<link rel="shortcut icon" type="image/png" href="img/favicon.jpg" />	
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        <link rel="stylesheet" type="text/css" href="node_modules\bootstrap\dist\css\bootstrap.css">
        <link rel="stylesheet" type="text/css" href="node_modules\bootstrap\dist\css\animate.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="node_modules\bootstrap\dist\js\bootstrap.js"></script>
        <style>
          body{
            background-image:url("img/bg.jpg");
			 background-repeat: repeat-y;
            color: #fff;
          }
        </style>
		</head>

		<body>
        <!--navigation menu start-->
			<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"data-target="#example-navbar-collapse">
			<span class="sr-only">navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><img src="img/bot.png" width="100%" height="auto" alt="Bot" class="img-responsive"></img></a>
			</div><br/>
				<div class="collapse navbar-collapse" id="example-navbar-collapse">
				<ul class="nav nav-tabs nav-justified">
				<li><a href="index.php">Home</a></li>
				<li><a href="userlist.php">User List</a></li>
				<li><a href="http://fcc-status.herokuapp.com" target="_blank">Live View</a></li>
				<li><a href="userprofile.php">User Profile</a></li>
          
				<li class="active"><a href="activity.php">Activity Report</a></li>
				<li><a href="https://gitter.im/kgisl/campsite">Message to Campsite</a></li>
				<li><a href="http://kgashok.github.io/elm-simple-json-decoding/freecodecamp.html">Camper Bot</a></li>
				</ul>
				</div>
				</nav>
 <!--navigation menu end-->
				<div class="col-lg-12 text-center">
				<h1><span class="label label-lg label-success">Daily Activity Report</span></h1>
				</div>
				</br>     </br>     </br>     </br>
				<div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
				</body>

		<script>
					var trace1 = {
					x: <?php echo  js_array($pts); ?>,
					y: <?php echo  js_array($ucount); ?>,
					type: 'scatter',
					mode: 'lines+markers'
					};
					var data = [trace1];
					var layout = {
                    xaxis: {
                      title: 'Time'
                    },
                    yaxis: {
                      title: 'Total Points',
                      exponentformat : 'none'
						}
						}
						Plotly.newPlot('myDiv', data,layout);
			</script>
</html>
