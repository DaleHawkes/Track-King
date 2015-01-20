<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width-device-width, initial-scale=1" />

<title>Track King Index</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link href="css/style.css" rel="stylesheet">

</head>

<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<!-- Site Navigation -->
<?php include 'Includes/Navigation.php'; ?>

<div class="container"> 
<!-- START OF MAIN CONTENT AREA -->

<!-- Site banner -->       	
    <div class="banner">
        <div class="container">
 
            <h1>Import Race Information</h1>
            <p>Let enter the race details.</p>
        </div>
    </div>
<br />

<!-- ENTER OUR CONTENT HERE -->
<form action="process_race_information_form.php" id="EnterRaceInformationForm" method="post"> 
<fieldset>
    
		<label for="date" id="date">Date:</label>
        <input type="text" name="date" id="date" size="30">
        
        <label for="boat">(YYYY-MM-DD)
        <br />
        </label>
    <br />
		<label for="winddirectionstart" id="winddirectionstart">Wind Direction At Start:</label>
		<input type="text" name="winddirectionstart" id="winddirectionstart" size="30">
        
    	<label for="winddirectionend" id="windirectionend">
        <br />
    	<br />
   	    Wind Direction At End:</label>
        <input type="text" name="winddirectionend" id="winddirectionend" size="30">
        
        <label for="windspeedstart" id="windseppedstart">
        <br />
        <br />
 
    Average Wind Speed At Start:</label>
        <select name="windspeedstart" id="windspeedstart">
          <option>0 to 2 Knots</option>
          <option>2 to 4 Knots</option>
          <option>4 to 6 Knots</option>
          <option>6 to 8 Knots</option>
          <option>8 to 10 Knots</option>
          <option>10 to 12 Knots</option>
          <option>12 to 14 Knots</option>
          <option>14 to 16 Knots</option>
          <option>16 to 18 Knots</option>
          <option>18 to 20 Knots</option>
          <option>20 to 22 Knots</option>
          <option>22 to 24 Knots</option>

        </select>
        
        <label for="windspeedend" id="windspeedend">
        <br />
        <br />
        Average Wind Speed At End:</label>
        <input type="text" name="windspeedend" id="windspeedend" size="30">
         
        <label for="rake" id="rake">
        <br />
        <br />
        Ultra Violet Rake:</label>
        <select name="rake" id="rake">
          <option>22 Feet 2 Inches</option>
          <option>22 Feet 4 Inches</option>
          <option>22 Feet 6 Inches</option>
          <option>22 Feet 8 Inches</option>
        </select>
        <br />
		<br />
       
        <label for="waveconditions" id="waveconditions">What Were The Waves Like?<br />
        </label>
		<textarea name="waveconditions" cols="100" rows="4" id="waveconditions"></textarea>
        
    	<br />
    	<br />
		<label for="comments" id="comments">Comments:<br /></label>
        <textarea name="comments" cols="100" rows="5" id="comments"></textarea>
        
      <br />
        <br />
		<label for="spamcheck">Spam Check:</label> 
		<input id="spamcheck" name="spamcheck">
		(A19FED6)
        <br />
		<br />
	<input id="send" name="send" type="submit" value="Submit Race Information" />
</fieldset>
</form>
<!-- END OF CONTENT HERE -->

<br />
<br />

<!-- Back To Top -->
<?php include 'Includes/Back-To-Top.php'; ?>

<br />
<br />

<!-- Site footer -->
<?php include 'Includes/Footer.php'; ?>
      
</div> 
<!-- END OF MAIN CONTENT AREA -->

</body>
</html>
