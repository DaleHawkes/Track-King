<?php 

// Lets work out what point of sail we are on.
	switch ($true_bearing) 
	{
		//THIS SECTION IS ALL TO DO WITH THE PORT SIDE OF THE COURSE
		case $true_bearing >=20 && $true_bearing <=40:
        //print "Reach";
		$pointofsail = "Beat";
        break;
		
		case $true_bearing >=41 && $true_bearing <=80:
        //print "Reach";
		$pointofsail = "Close Reach";
        break;
		
		case $true_bearing >=81 && $true_bearing <=110:
        //print "Reach";
		$pointofsail = "Reach";
        break;
		
		case $true_bearing >=111 && $true_bearing <=150:
        //print "Reach";
		$pointofsail = "Broad Reach";
        break;
		
		//THIS SECTION IS ALL TO DO WITH THE STARBOARD SIDE OF THE COURSE
		case $true_bearing >=320 && $true_bearing <=340:
        //print "Reach";
		$pointofsail = "Beat";
        break;
		
		case $true_bearing >=280 && $true_bearing <=319:
        //print "Reach";
		$pointofsail = "Close Reach";
        break;
		
		case $true_bearing >=250 && $true_bearing <=279:
        //print "Reach";
		$pointofsail = "Reach";
        break;
		
		case $true_bearing >=211 && $true_bearing <=249:
        //print "Reach";
		$pointofsail = "Broad Reach";
        break;
 
        case $true_bearing >=151 && $true_bearing <=210:
        //print "Run";
		$pointofsail = "Run";		
        break;
 
        default:
        //print "Not Sure";
		$pointofsail = "Not Sure";		
	}
	
?>