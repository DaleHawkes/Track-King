<?php 
// The NO Error re-direct page.
$thankYouPage = 'processed_race_information_thanks.php';

//DB Connection
require_once('connect.php');

$boat = "Ultra Violet";

//-------------------------------------------------------------------------------------------------------------------
//SPAM CHECK STATEMENT

$spam_check_variable = "A19FED6";

if ($_POST[spamcheck] == $spam_check_variable) 
{
	echo "The if statement evaluated to true";
	
//COMPLETE THIS FORM IF SPAM CHECK IS OK
//-------------------------------------------------------------------------------------------------------------------

// Define which values we are to accept from the form. 
$allowedFields = array(
	'date',
	'boat', 
	'winddirectionstart',
	'winddirectionend',
	'windspeedstart',
	'windspeedend',
	'rake',
	'waveconditionss',
	'comments',
);

// Specify the required form fields. 
$requiredFields = array(
	'date' => 'The Date is required.', 
);

$errors = array();

// We need to loop through the required variables to make sure they were posted with the form.
foreach($requiredFields as $fieldname => $errorMsg)
{
	if(empty($_POST[$fieldname]))
	{
		$errors[] = $errorMsg;
	}
}

// Loop through the $_POST array, to create the PHP variables from our form.
foreach($_POST AS $key => $value)
{
    // Is this an allowed field? This is a security measure.
    if(in_array($key, $allowedFields))
    {
        ${$key} = $value;
    }
}

// Were there any errors?
if(count($errors) > 0)
{
    $errorString .= '<ul>';
    foreach($errors as $error)
    {
        $errorString .= "<li>$error</li>";
    }
    $errorString .= '</ul>';
 
    // display the errors on the page
    ?>
    <html>
    <head>
    <title>Error Processing Race Information</title>
    </head>
    <body>
    <h2>Error Processing Form</h2>
    <p>There was an error processing the form.</p>
    <?php echo $errorString; ?>
    <p><a href="import_race_information_form.html">Go Back to the Form</a></p>
    </body>
    </html>
    <?php 
}
else
{
	// display the thank you page
    header("Location:$thankYouPage");

	
	$Insert_entry = "INSERT INTO race_information VALUES('','$date','$boat','$winddirectionstart','$winddirectionend','$windspeedstart','$windspeedend','$rake','$waveconditions','$comments')";
	mysql_query($Insert_entry) or die(mysql_error());

    // display the thank you page
    header("Location:$thankYouPage");
}
//-----------------------------------------------------------------------------------------
// SPAM CHECK ELSE THEY HAVE NOT PUT RIGHT CODE IN
} else {
	
	// display the errors on the page
    ?>
    <html>
    <head>
    <title>Error Processing Entry</title>
    </head>
    <body>
    <h2>Error Processing Form</h2>
    <p>Sorry you put the wrong spam code in, remember to enter the letters in capitals and numbers in numerical form.</p>
    <p>Press the back button on your borwser.</p>
    </body>
    </html>
    <?php
	
}
?>