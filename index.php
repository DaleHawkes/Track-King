<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width-device-width, initial-scale=1" />

<title>Track King Index</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link href="css/style.css" rel="stylesheet">

</head>

<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<!-- THIS IS THE START OF THE NAVIGATION BAR -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://127.0.0.1/my%20portable%20files/Track-King/index.php" title='Track King Home!'>Home</a>
        </div>
 
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">Link One</a>
                </li>
                <li>
                    <a href="#">Link Two</a>
                </li>
                <li>
                    <a href="#">Link Three</a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
 
    </div>
</div>
<!-- THIS IS THE END OF THE NAVIGATION BAR -->

<div class="container"> <!-- MAIN CONTENT AREA -->

<!-- Site banner -->       	
    <div class="banner">
        <div class="container">
 
            <h1>Track King</h1>
            <p>Ok we have 3 sections to look at, importing data, analysing a single race or looking at a Polar Diagram for a certain wind band.</p>
        </div>
    </div>
<br />
<h3>Import</h3>
<br />
<a href="import_race_data.php">Import Race Recording (File must be called samplefile.csv)</a>
<p><a href="import_race_information_form.php">Import Race Information (Actual race info like wind speed, mast rake etc)</a></p>
<h3>Single Race Analysis</h3>
<br />
<?php

require_once('connect.php');

$sql = "SELECT Date FROM race_information WHERE Boat = 'Ultra Violet'";
$result = mysql_query($sql)or die(mysql_error());

echo "<table border='0'>";
echo "<tr><th>Ultra Violet Racing Dates</th></tr>";
 
  while($row = mysql_fetch_array($result)){
  // Before we close out of PHP, lets define all of our variables so they are easier to remember and work with,
  // you can skip this though if you just want to directly reference each row.
 
  $date = $row['Date'];
  
  $selecteddate = $date;
 
// Now for each looped row
 
echo "<tr><td style='width: 200px;'><a href='analysis.php?selecteddate=$selecteddate'>".$date."</a></td></tr>";
 
} // End our while loop
echo "</table>";

?>
<h3>Polar Diagrams</h3> 


<br />
<br />

<!-- BACK TO TOP -->
<a href="#" class="back-to-top">Back to Top</a>

       <script>            
			jQuery(document).ready(function() {
				var offset = 220;
				var duration = 500;
				jQuery(window).scroll(function() {
					if (jQuery(this).scrollTop() > offset) {
						jQuery('.back-to-top').fadeIn(duration);
					} else {
						jQuery('.back-to-top').fadeOut(duration);
					}
				});
				
				jQuery('.back-to-top').click(function(event) {
					event.preventDefault();
					jQuery('html, body').animate({scrollTop: 0}, duration);
					return false;
				})
			});
		</script>

<br />
<br />
<!-- Site footer -->
    <div class="bottom">
        <div class="container">
            <div class="col-md-4">
                <h3><span class="glyphicon glyphicon-heart"></span> Footer section 1</h3>
                <p>Content for the first footer section.</p>
            </div>
            <div class="col-md-4">
                <h3><span class="glyphicon glyphicon-star"></span> Footer section 2</h3>
                <p>Content for the second footer section.</p>
            </div>
            <div class="col-md-4">
                <h3><span class="glyphicon glyphicon-music"></span> Footer section 3</h3>
                <p>Content for the third footer section.</p>
            </div>
        </div>
    </div>
        
</div> <!-- END OF MAIN CONTENT AREA -->

</body>
</html>
