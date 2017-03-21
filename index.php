<!-- index page -->

<?php
$link = mysqli_connect('localhost','root','','full');
if (!$link) {
  die('Could not connect to MySQL: ' . mysql_error());
}
 ?>

<!-- PHP  DB Call-->

<html>
  <head>
			<title>Home </title>
					<link rel="stylesheet" type="text/css" href="node_modules\bootstrap\dist\css\bootstrap.css">
					<link rel="stylesheet" type="text/css" href="node_modules\bootstrap\dist\css\animate.css">
					<link rel="shortcut icon" type="image/png" href="img/favicon.jpg" />	
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
					<script src="node_modules\bootstrap\dist\js\bootstrap.js"></script>
						<style>
								h2	{
									font-size: 150px;
									}
								h1	{
									font-size: 50px;
									}
								h3	{
									font-size: 75px;
									font-weight: bold;
									font-style: italic;
									}
								h4	{
									font-size: 50px;
									font-style: italic;
									}
								.count	{
									padding: 100px 0px 0px 300px;
									}
								.cont	{
									padding-top: 100px;
									}
								.carousel-inner	{
										height:75%;
									}
								.navbar-header
								{ 
									}
	  
								body	{
											background-image:url("img/bg.jpg");
											background-repeat: no-repeat;
											color: #fff;
									}
								.navbar-inverse
									{
										padding-top:10px;
		 
										}
								.navbar-brand
									{
										margin-bottom:50px;
									} 
    </style>

			</head>

<body>
					<!--body with bootstrap-->
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
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="userlist.php">User List</a></li>
						<li><a href="http://fcc-status.herokuapp.com" target="_blank">Live View</a></li>
						<li><a href="userprofile.php">User Profile</a></li>
          
						<li><a href="activity.php">Activity Report</a></li>
						<li><a href="https://gitter.im/kgisl/campsite">Message to Campsite</a></li>
						<li><a href="http://kgashok.github.io/elm-simple-json-decoding/freecodecamp.html">Camper Bot</a></li>
        </ul>
      </div>
    </nav>
   

    <!--body slides -->
    <div class="container-fluid">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
         
      <div class="carousel-inner" role="listbox">

                <?php
                    $qry="SELECT * FROM `daily_count` where `u_date`='".date('Y-m-d')."'";
                    //echo $qry;
                    $qry2=mysqli_query($link,$qry) or die (mysqli_error($link));

                        while($row = mysqli_fetch_array($qry2, MYSQL_ASSOC)) {
                              $pts=$row['pts_count'];
                              $ucount=$row['u_count'];
                        }

                        echo "<div class=\"item active\">
						 <h1 class=\"col-lg-12 text-center\"><span class=\"label label-warning\">KGISL Campers Record</span></h1>
                                  <div class=\"cont\">
                                  <div class=\"row\">
                                      <div class=\"col-lg-12 text-center\">
                                        <h1>Total Problems:".$pts." </h1>
                                      </div>
                                  </div>
                                  <div class=\"row\">
                                      <div class=\"col-lg-12 text-center\">
                                        <h1>Total Campers:".$ucount." </h1>
                                      </div>
                                  </div>
                                  </div>
                              </div>";

                    $qry="SELECT `user`.`name`,`user`.`url`,`daily_update`.`points` FROM `daily_update`,`user` WHERE `user`.`uid`=`daily_update`.`uid` and `daily_update`.`r_date`='".date('Y-m-d')."' ORDER BY `daily_update`.`points` DESC limit 3";
               
                    $qry2=mysqli_query($link,$qry) or die (mysqli_error($link));
                    $count=0;

                        while($row = mysqli_fetch_array($qry2, MYSQL_ASSOC)) {
                           $count++;
                           $name=$row['name'];
                           $url=$row['url'];
                           $points=$row['points'];
						   
						   
                           echo "<div class=\"item\">
                           <h1 class=\"col-lg-12 text-center\"><span class=\"label label-success\">Maximum Problem Solver</span></h1>
                               <div class=\"row\">
                                   <div class=\"col-lg-6 count\">
                                     <h2>#".$count."</h2>
                                   </div>
                                   <div class=\"col-lg-6\">
                                     <div class=\"cont\">
                                       <h3>".$name."</h3>
                                       <h4>".$points."</h4>
                                       <img src=\"".$url."\"></img>
                                    </div>
                                   </div>
                               </div>
                             </div>\n";
                       }
                ?>

				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            
              
            </div>
    </div>
  </body>
</html>
