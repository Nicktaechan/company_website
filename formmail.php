<?php
/* Copyright (c) 2002 Eli Sand */

/*
COMP 1850 NOTES: 
how to configure (A) your HTML FORM and (B) this PHP Script
this script will email the data from a form to a specified address

A - HTML FORM:
---------------------------------------------------------
A.1 ** REQUIRED **
Configure the 'To:' email address    
The HTML form that uses this script must include the following hidden input
to determine which email address the form data will be sent to.
Replace the 'recipient_email@server.com' with your desired recipent email address
		<input type="hidden" name="recipient" value="recipient_email@server.com" />

A.2 ** REQUIRED **
Configure the 'From:' email address 
The HTML form must also include an email field with a valid email address	
	<input type="text" name="email" />

A.3 ** OPTIONAL **
Optionaly, your HTML form may include other hidden inputs in order to 
send the user to specific pages based on how the form submission went.
		<input type="hidden" name="redirect" value="http://server.com/ok.htm" />
		<input type="hidden" name="error_redirect" value="http://server.com/error.htm" />

B - PHP script:
--------------------------------------------------------------
Remember this will only work when run on an HTTP server that knows PHP
You must alter one line of code below before this will work.
Line 96:		alter the instruction here to include the domain name
				of the recipient email address. For example, if
				you are sending the data to yourname@hotmail.com
				you would change the current line:
		$auth = "*@127.0.0.1, *@localhost";
				by adding to the comma delimited list:
		$auth = "*@127.0.0.1, *@localhost, *@hotmail.com";

*/

	########################################################################
	#                                                                      #
	#                      PHP FormMail v2.0 20030305                      #
	#                                                                      #
	########################################################################
	#
	# Settings
	#

	# Initialize variables
	#
	$auth = NULL;
	$deny = NULL;
	$must = NULL;
	$post = NULL;
	$http = NULL;
	$form = NULL;
	$list = NULL;

	# Fix for pre PHP 4.1.x versions
	#
	if (!isset($_POST)) {
		$_POST = &$HTTP_POST_VARS;
	}
	if (!isset($_SERVER)) {
		$_SERVER = &$HTTP_SERVER_VARS;
	}
	if (!function_exists('array_key_exists')) {
		function array_key_exists($key, $array) {return in_array($key, array_keys($array)) ? true : false;}
	}

	# Fix for magic quotes when enabled
	#
	if (get_magic_quotes_gpc()) {
		foreach ($_POST as $key => $value) {
			$_POST["$key"] = stripslashes($value);
		}
	}

	# Detect any Windows operating system
	#
	if (strstr(php_uname(), 'Windows')) {
		$IS_WINDOWS = TRUE;
	}

	########################################################################
	#                                                                      #
	#                      USER CONFIGURABLE SETTINGS                      #
	#                                                                      #
	########################################################################

	# Authorized email address masks that can be used as the recipient
	#
	$auth = "*@127.0.0.1, *@localhost, *@hotmail.com, *@ms5.hinet.net, *@gmail.com";

	# Authorize all email addresses to the current domain
	#
	# If you want strict email account authorization, comment this out and
	# the script will only authorize the masks in the list defined above.
	#
	$auth .= ", *@" . get_domain($_SERVER['SERVER_NAME']);

	# Email address masks that will be rejected if in the email field
	#
	$deny = "nobody@*, anonymous@*, postmaster@*";

	# The following allow you to set some default settings
	#
	# These are commented out by default and when used, either override or
	# append to any values.  This allows you to ensure that hackers don't
	# post their own values to certain fields, making you miss out on
	# important data that you want to ensure is included in the email.
	#
	#$must['required']                = "env_report";
	#$must['env_report']              = "REMOTE_ADDR";
	#$must['redirect']                = "http://my.domain.com/ok.html";
	#$must['error_redirect']          = "http://my.domain.com/error.html";
	#$must['missing_fields_redirect'] = "http://my.domain.com/missing.html";

	#
	########################################################################

	########################################################################
	#                                                                      #
	#                 DO NOT EDIT ANYTHING PAST THIS POINT                 #
	#                                                                      #
	########################################################################

	########################################################################
	#
	# Functions
	#

	# Trim leading and trailing white space from array values
	#
	function array_trim(&$value, $key) {
		$value = trim($value);
	}

	# Return the top level domain of a hostname
	#
	function get_domain($string) {
		if (@eregi('\.?([a-zA-Z0-9\-]+\.?[a-zA-Z0-9\-]+)$', $string, $values)) {
			return $values[1];
		}

		return NULL;
	}

	# Show an error message to the user
	#
	function error_msg($error, $required = FALSE) {
		global $post;

		if (!empty($post['missing_fields_redirect']) && $required) {
			header('Location: ' . $post['missing_fields_redirect']);
		}
		elseif (!empty($post['error_redirect'])) {
			header('Location: ' . $post['error_redirect']);
		}
		else {
			echo "<html lang=\"en\">\r\n";
			echo "\t<head>\r\n";
			echo "\t\t<title>Form Error</title>\r\n";
			echo "\t\t<style type=\"text/css\">* {font-family: \"Verdana\", \"Arial\", \"Helvetica\", monospace;}</style>\r\n";
			echo "\t</head>\r\n";
			echo "\t<body>\r\n";
			echo "\t\t<p>${error}</p>\r\n\t\t<p><small>&laquo; <a href=\"javascript: history.back();\">go back</a></small></p>\r\n";
			echo "\t</body>\r\n";
			echo "</html>\r\n";
		}

		exit();
	}

	# Basic pattern matching on an entire array
	#
	function pattern_grep($input, $array) {
		foreach ($array as $value) {
			$value = addcslashes($value, '^.[]$()|{}\\');
			$value = str_replace('*', '.*', $value);
			$value = str_replace('?', '.?', $value);
			$value = str_replace('+', '.+', $value);

			if (@eregi('^' . $value . '$', $input)) {
				return TRUE;
			}
		}

		return FALSE;
	}

	#
	########################################################################

	########################################################################
	#
	# Main
	#

	# Check to make sure the info was posted
	#
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$post = array(
			'recipient'			=> $_POST['recipient'],
			'email'				=> $_POST['email'],
			'subject'			=> $_POST['subject'],
			'realname'			=> $_POST['realname'],
			'required'			=> $_POST['required'],
			'env_report'			=> $_POST['env_report'],
			'sort'				=> $_POST['sort'],
			'redirect'			=> $_POST['redirect'],
			'error_redirect'		=> $_POST['error_redirect'],
			'missing_fields_redirect'	=> $_POST['missing_fields_redirect']
		);

		$http = array(
			'REMOTE_USER'			=> $_SERVER['REMOTE_USER'],
			'REMOTE_ADDR'			=> $_SERVER['REMOTE_ADDR'],
			'HTTP_USER_AGENT'		=> $_SERVER['HTTP_USER_AGENT']
		);

		if (isset($must['required'])) {
			$post['required']			= $must['required'] . ',' . $_POST['required'];
		}
		if (isset($must['env_report'])) {
			$post['env_report']			= $must['env_report'] . ',' . $_POST['env_report'];
		}
		if (isset($must['redirect'])) {
			$post['redirect']			= $must['redirect'];
		}
		if (isset($must['error_redirect'])) {
			$post['error_redirect']			= $must['error_redirect'];
		}
		if (isset($must['missing_fields_redirect'])) {
			$post['missing_fields_redirect']	= $must['missing_fields_redirect'];
		}

		if (($auth = explode(',', $auth))) {
			array_walk($auth, 'array_trim');
		}
		if (($deny = explode(',', $deny))) {
			array_walk($deny, 'array_trim');
		}

		# Check for missing required fields
		#
		if ((!empty($post['required'])) && ($list = explode(',', $post['required']))) {
			$list[] = 'recipient';
			$list[] = 'email';

			array_walk($list, 'array_trim');

			foreach ($list as $value) {
				if (!empty($value) && empty($_POST["$value"])) {
					error_msg("You have left a required field blank.", TRUE);
				}
			}
		}

		# Check the email addresses submitted
		#
		if (pattern_grep($post['email'], $deny)) {
			error_msg("You have specified a banned email address.");
		}
		if (!@eregi('^([a-zA-Z0-9\.\_\-]+)\@((([a-zA-Z0-9\-]+)\.)+([a-zA-Z]+))$', $post['email'])) {
			error_msg("You have specified an invalid email address.");
		}
		if (!$IS_WINDOWS) {
			if (!getmxrr(get_domain($post['email']), $mxhost)) {
				error_msg("You have no mail exchange records for your email address.");
			}
		}

		# Check if the recipients email address is authorized
		#
		if ((!empty($post['recipient'])) && ($list = explode(',', $post['recipient']))) {
			array_walk($list, 'array_trim');

			foreach ($list as $value) {
				if (!@eregi('^([a-zA-Z0-9\.\_\-]+)\@((([a-zA-Z0-9\-]+)\.)+([a-zA-Z]+))$', $value)) {
					error_msg("The recipients email address is invalid.");
				}
				if (!pattern_grep($value, $auth)) {
					error_msg("The recipients email address is unauthorized.");
				}
			}
		}
		else {
			error_msg("There was an unknown error while checking the recipients email address.");
		}

		# Sort the fields
		#
		if ((!empty($post['sort'])) && ($list = explode(',', $post['sort']))) {
			array_walk($list, 'array_trim');

			foreach ($list as $value) {
				$form["$value"] = $_POST["$value"];
			}
		}
		else {
			$form = $_POST;
		}

		# Create the message
		#
		$subject = empty($post['subject']) ? "Biz.com Web Online form" : "Biz.com Web Online form: " . $post['subject'];

		$message = "Submitted by: " . $post['realname'] . " <" . $post['email'] . "> on " . date('l, F jS, Y @ g:i:s a (O)') . "\r\n\r\n";

		if (!empty($post['env_report'])) {
			if (($list = explode(',', $post['env_report']))) {
				$message .= "Client Variables\r\n";
				$message .= "----------------\r\n\r\n";

				array_walk($list, 'array_trim');

				foreach ($list as $value) {
					if (array_key_exists($value, $http)) {
						$message .= "${value}:\r\n" . $http["$value"] . "\r\n\r\n";
					}
				}
			}
		}

		$message .= "Online Form Fields\r\n";
		$message .= "------------------\r\n\r\n";

		foreach ($form as $key => $value) {
			if (!array_key_exists($key, $post)) {
				$message .= "${key}:\r\n${value}\r\n\r\n";
			}
		}

		# Send out the email
		#
		if (mail($post['recipient'], $subject, $message, "From: " . $post['email'] . "\r\nReply-To: " . $post['email'] . "\r\nX-Mailer: PHP FormMail")) {

			if (!empty($post['redirect'])) {
				header('Location: ' . $post['redirect']);
			}
			else {
				echo "<html lang=\"en\">\r\n";
				echo "\t<head>\r\n";
				echo "\t\t<title>Thank you</title>\r\n";
				echo "\t\t<style type=\"text/css\">* {font-family: \"Verdana\", \"Arial\", \"Helvetica\", monospace;}</style>\r\n";
				echo "\t</head>\r\n";
				echo "\t<body>\r\n";
				echo "\t\t<p>Thank you for filling out the form.</p>\r\n\t\t<p><small>&laquo; <a href=\"javascript: history.back();\">go back</a></small></p>\r\n";
				echo "\t</body>\r\n";
				echo "</html>\r\n";
			}
		}
		else {
			error_msg("There was an unknown error while sending email.");
		}
	}
	else {
		error_msg("Invalid request method used.");
	}

	#
	########################################################################
?>
