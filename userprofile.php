
<!-- ProfileView -->

<html>
    <head>
	<title>CAMPERS PROFILE</title>
      <link rel="stylesheet" type="text/css" href="node_modules\bootstrap\dist\css\bootstrap.css">
      <link rel="stylesheet" type="text/css" href="node_modules\bootstrap\dist\css\animate.css">
      <link rel="shortcut icon" type="image/png" href="img/favicon.jpg" />	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="node_modules\bootstrap\dist\js\bootstrap.js"></script>
      <script>
         $(document).ready(function()
        {
        	$('#search').keyup(function()
        	{
        		searchTable($(this).val());
        	});
        });

        function searchTable(inputVal)
        {
        	var table = $('#tblData');
        	table.find('tr').each(function(index, row)
        	{
        		var allCells = $(row).find('td');
        		if(allCells.length > 0)
        		{
        			var found = false;
        			allCells.each(function(index, td)
        			{
        				var regExp = new RegExp(inputVal, 'i');
        				if(regExp.test($(td).text()))
        				{
        					found = true;
        					return false;
        				}
        			});
        			if(found == true)$(row).show();else $(row).hide();
        		}
        	});
        }


      </script>
      <style>
        .img{
          position:absolute;
        }
        h2,h3{
          padding-left: 85px;
          padding-top: -5px;
        }
        .img{
          padding-top: 30px;
        }
          body{
        background-image:url("img/b2.jpg");
		 background-repeat: repeat-y;
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
          <li><a href="userlist.php">User List</a></li>
          <li><a href="http://fcc-status.herokuapp.com" target="_blank">Live View</a></li>
          <li class="active"><a href="userprofile.php">User Profile</a></li>
          
          <li><a href="activity.php">Activity Report</a></li>
          <li><a href="https://gitter.im/kgisl/campsite">Message to Campsite</a></li>
		  <li><a href="http://kgashok.github.io/elm-simple-json-decoding/freecodecamp.html">Camper Bot</a></li>
        </ul>
      </div>
    </nav>
      <!--navigation menu end-->

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
              <input type="text" placeholder="Enter the camper Name" class="form form-control" id="search"/>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <h1><span class="label label-lg label-primary col-lg-12">Select the User to view Individual Activity</span></h1>
          </div>
        </div>
          <table class="table table-hover" id="tblData">
            <?php
                $link = mysqli_connect('localhost','root','','full');
                if (!$link) {
                  die('Could not connect to MySQL: ' . mysql_error());
                }

                $qry="select `user`.`name`,`user`.`uname`,`user`.`url`,`user`.`uid`,`daily_update`.`points` from `user`,`daily_update` where `user`.`uid`=`daily_update`.`uid` and `daily_update`.`r_date`='".date("Y-m-d")."' and `user`.`excluder`='N' ORDER BY `daily_update`.`points` DESC";
                $res=mysqli_query($link,$qry) or die (mysqli_error($link));
                $count=0;
                $str="<tr>";
                while($row = mysqli_fetch_array($res, MYSQL_ASSOC)) {
                  $count++;
                  $str=$str."<td class=\"col-lg-4\">
                             <a href=\"profile.php?uid=".$row["uid"]."\"><div class=\"img\" >
                                  <img src=".$row["url"]." width=\"75px\" height=\"75px\" />
                             </div>
                             <span><h2>".$row["name"]."</h2></span>
                             <span><h3>".$row["points"]."</h3></span></a>
                           </td>";

                 if($count%3==0)
                   $str=$str."</tr><tr>";
                  echo $str;
                  $str="";

                }

             ?>

          </table>
      </div>



    </body>
</html>
