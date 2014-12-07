<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1>Lets Enter The Race Details</h1>
<form action="process_race_information_form.php" id="EnterRaceInformationForm" method="post"> 
<fieldset>
    
		<label for="date" id="date">Date:</label>
        <input type="text" name="date" id="date" size="30">
        
        <label for="boat">(YYYY-MM-DD)
        <br />
        <br />
        Which Boat:</label>
        <select name="boat" id="boat">
          <option>Ultra Violet</option>
          <option>Avrio</option>
        </select>
        <br />
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
        <input type="text" name="windspeedstart" id="windspeedstart" size="30">
        
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
        <textarea name="comments" cols="100" rows="4" id="comments"></textarea>
        
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
</body>
</html>
