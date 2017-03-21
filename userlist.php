<!--Listing the USer by order wise in rank --> 
<html>
		<head>
		<link rel="stylesheet" type="text/css" href="node_modules\bootstrap\dist\css\bootstrap.css">
		<link rel="stylesheet" type="text/css" href="node_modules\bootstrap\dist\css\animate.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="node_modules\bootstrap\dist\js\bootstrap.js"></script>
    <style>
      body{
        background-image:url("img/bg.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        color: #fff;
      }
      table{
        padding-top: 15px;
      }
      a:link{
        color: #bbd0f7;
      }
      a:visited{
        color: #fff;
      }
      .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
        background-color: #000;
      }
	   .navbar-inverse
	  {
		  padding-top:10px;
		 
	  }
	 .navbar-brand
	 {
	margin-bottom:50px;
	 }
	 .tb{
		 color:Black;
	 }
	 .well
	 {
		 background-color:black;
		 color:White;
		 text-align:center;
	 }
    </style>

</head>

				<body>
				<!--navigation menu start-->
				<nav class="navbar navbar-inverse" role="navigation">
				<div class="container-fluid">
				<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"data-target="#example-navbar-collapse">
				<span class="sr-only">Click</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><img src="img/bot.png" width="100%" height="auto" alt="Bot" class="img-responsive"></img></a>
				</div><br/>
				<div class="collapse navbar-collapse" id="example-navbar-collapse">
				<ul class="nav nav-tabs nav-justified">
				<li><a href="index.php">Home</a></li>
				<li class="active"><a href="userlist.php">User List</a></li>
				<li><a href="http://fcc-status.herokuapp.com" target="_blank">Live View</a></li>
				<li><a href="userprofile.php">User Profile</a></li>
          
				<li><a href="activity.php">Activity Report</a></li>
				<li><a href="https://gitter.im/kgisl/campsite">Message to Campsite</a></li>
				<li><a href="http://kgashok.github.io/elm-simple-json-decoding/freecodecamp.html">Camper Bot</a></li>
				</ul>
				</div>
    </nav>
    <!--navigation menu end-->
		<div class="container-fluid">
		<div class="well well-sm"><img src="img/camp.gif" alt="KGISL CAMPERS"></div>
		</div>
		<br/>
		<div class="container-fluid table-responsive">
		<div class="row">
        <div class="col-lg-12">
				<table class="table table-hover text-center">
				<tr class="info">
                <th class="text-center"><h3 class="tb">Rank</h3></th>
                <th colspan="2" class="text-center"><h3 class="tb">Name</h3></th>
                <th class="text-center"><h3 class="tb">points</h3></th>
                <th class="text-center" colspan="2"><h3 class="tb">link to FCC</h3></th>
				</tr>
                </table>
		</div>
		</div>
		</div>
</body>
