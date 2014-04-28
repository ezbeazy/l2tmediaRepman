<?php
		/*if(!empty($_POST['city'])) {
				header('Location: error.php');
				exit;
			}	*/	
	
	require('../../../wp-load.php');
			
	$address      = of_get_option('form_emails');
	$personName   = of_get_option('form_name');
	$personPhone  = of_get_option('form_phone');
	$personEmail  = of_get_option('form_email');
	$client       = of_get_option('client_name');
		
	$error    		    = '';
	$custname  			= ''; 
	$email			    = '';
	$phone			    = '';
	$who			    = '';
	$overall		    = '';
	$customerservice	= '';
	$qualitywork		= '';
	$facilities			= '';
	$city               = '';
	$comments		    = '';
	
		
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
	$custname 			= $_POST['custname'];
	$email 				= $_POST['email'];
	$phone 				= $_POST['phone'];
	$who   			    = $_POST['who'];
	$overall   		    = $_POST['overall'];
	$customerservice	= $_POST['customerservice'];
	$qualitywork   		= $_POST['qualitywork'];
	$facilities   		= $_POST['facilities'];
	$city               = $_POST['city'];
	$comments	 	    = $_POST['comments'];



    if(trim($custname) == '') {
        $error = '<div class="error_message">Error: Please enter your name.</div>';
       					
	} else if(trim($email) == '') {
        $error = '<div class="error_message">Error: Please enter a valid email address.</div>';
              
    } else if(!isEmail($email)) {
        $error = '<div class="error_message">Error: Please enter a valid email address.</div>';
			
    } else if(trim($overall) == '') {
        $error = '<div class="error_message">Error: Please rate us overall.</div>';
	
    } 

	if($error !== ''){
          echo $error;
        }

    if($error == '') {
        
		if(get_magic_quotes_gpc()) {
            $comments = stripslashes($comments);
        }
	
    $e_subject = 'Hot Issue Review - Requires Dealer Response';
	$e_body = "Customer Review Submitted for ".$client." \r\n\n";
		 
	$e_name = "Name: $custname\r";
	$e_email = "Email: $email\r";
	$e_phone = "Phone: $phone\r\r\n";
	$e_who = "Who Took Care Of You?: $who\r\r\n";
	$e_overall = "Overall Rating: $overall\r";
	$e_customerservice = "Customer Service Rating: $customerservice\r";
	$e_qualitywork = "Quality of Service/Product Rating: $qualitywork\r";
	$e_facilities = "Quality of Facilites Rating: $facilities\r\r\n";
	$e_content = "Comments:\r$comments\r\n";
		 					
    $msg = $e_body . $e_name . $e_email . $e_phone . $e_who . $e_overall . $e_customerservice . $e_qualitywork . $e_facilities . $e_content;

    mail($address, $e_subject, $msg, "From: no-reply@l2tmedia.com\r\nReply-To: no-reply@l2tmedia.com\r\nReturn-Path: bzawlocki@l2tmedia.com\r\n");
					
	$submissionConfirm =
		
		"<div class='thank-you-message'>
		<p class='thank-you'>Thank you for your feedback!</p><br>
		<p>Sincerely,</p>
		 		
		<div class='contact-info'>
		<p>".$personName."</p>
		<p>".$personPhone."</p>
		<p>".$personEmail."</p>
		<p>".$client."</p>
		</div>";
		
	echo $submissionConfirm;
		 
                      
	}
	}


	function isEmail($email) { // Email address verification, do not edit.
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
	}

    if(!isset($_POST['contactus']) || $error != ''){ }// Do not edit.



?>
