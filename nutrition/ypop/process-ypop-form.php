<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
 	<title>Your Plate of Plenty Purchase</title>
	<link rel="stylesheet" href="/_/css/main.css" />
</head>
<body style="background-image: none;">
<div id="page-content" style="padding: 20px;">
<h1 style="color:#265e80">Your Plate of Plenty Purchase</h1>

<?php

	// Check for missing mandatory data
	$errors = "";
	foreach ( $_POST as $key=>$value ) {
		if ( (substr($key, -1) == '*') and ( empty($value) ) ) {
			$errors .= "<li>$key is required.</li>";
		}
	}

	if ( empty($errors)) {

		// Set email header variables
		$email_to      = "yourplate@fit-fish.co.uk";
		$email_subject = "Plate Purchase";

		// Get submitted form data
		$name = $_POST["first-name*"] + ' ' + $_POST["surname*"];
		$email_from = $_POST["email*"];
		$message = "CONTACT FORM\n\nYou have received a Your Plate of Plenty enquiry.\nThe details are:\n\n";
		$message .= "----------------------------------------\n";
		foreach ($_POST as $key=>$value) {
			$message .= "$key = $value\n\n";
		}
		$message .= "----------------------------------------\n\n";

		// Validate the email address entered by the user
		if (!filter_var($email_from, FILTER_VALIDATE_EMAIL)) die("The email address entered is invalid.");

		// Set email headers
		$headers  = "From: " . $email_to . "\r\n";
		$headers .= "Reply-To: " . $email_from . "\r\n";
		$headers .= "Cc: office@fit-fish.co.uk, chris@virelai.co.uk\r\n";

		// Initialise the sendmail_from address
		ini_set("sendmail_from", $email_to);

		// Send the email - NOTE: The "-f" parameter is required on the Fasthosts
		$sent = mail($email_to, $email_subject, $message, $headers, "-f" . $email_to);

		// Email sent successfully
		if ($sent) {
			echo "<p>Thank you for taking the time to send us all of your information! As soon as we receive payment (see bottom of page) we will start working on Your Plate and send it to you via email within 10 working days (most likely sooner) so that you can start to fulfil your goals!</p>\n";

			echo "<ul>\n";
			foreach ($_POST as $key=>$value) {
				if ($key <> "Submit") echo "<li><strong>$key:</strong> $value</li>\n";
			}
			echo "</ul>\n";
			echo '<p>Please use the PayPal button, below, to pay for <strong>Your Plate</strong>. Once payment is received we will start working on <strong>Your Plate</strong> straightaway. If you fill <strong>Your Plate</strong> you will fulfil <strong>Your Goals!</strong></p>';
			echo '
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="V5D7QRR9XDVSC">
          <table>
            <tr>
              <td><input type="hidden" name="on0" value="Your Plate">Your Plate</td>
            </tr>
            <tr>
              <td>
                <select name="os0">
                  <option value="Simple">Simple £39.00 GBP</option>
                  <option value="Standard">Standard £59.00 GBP</option>
                  <option value="Success">Success £79.00 GBP</option>
                </select>
              </td>
            </tr>
          </table>
          <input type="hidden" name="currency_code" value="GBP">
          <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
          <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
        </form>
			';
		}

		// Problem sending the email
		else {
			echo "<p>There has been an error sending your message. Please try later.</p>";
		}
	}

	// Mandatory fields missing
	else {
		echo "<p>Sorry the following errors were found:</p>";
		echo "<ul>$errors</ul>";
		echo "<p>Please <a href=\"yourplateofplenty-form.html\" onclick=\"history.go(-1);return false;\">go back</a> and enter the correct values.</p>";
	}

?>

<!-- Google Analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21699255-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50771900-1', 'auto');
  ga('send', 'pageview');
</script>

</body>
</html>
