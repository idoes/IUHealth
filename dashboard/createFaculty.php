<?php
	include_once('inc/utilityFunction.php');
	require_once("mail/mail.class.php");
	require_once("dbconnect.php");
	include_once('./php/header.php');
	
	/********************************************************************
	* PHP - Page Initialization
	 *
	***********************************************************************/
	$interactiveMessage = "";
	$password 			= "";
	//password is generated for user and send to user's email for activation purpose
	//The given password is exactly 12 in length, contaning mixed Captical English Letter and single digit
	$password 	= randomCodeGenerator(12);
	
	//test
	/*
	print_r($_POST);
	if(isset($_POST['formSubmit']))
	{
		echo "<br>bootstrap button works in terms of input form post method";
	}
	*/
	
	/*
	 * send Email
	*/
	function sendEmail($emailAddress, $firstName, $userName, $password)
	{
		global $interactiveMessage;
		//now send the email to the username registered for activating the account
		//$code = randomCodeGenerator(50);
		$code = randomCodeGenerator(50);
		$subject = "Email Activation";
		//TODO change the re-direct direcotory || reset password page
		$body = 'Your code is '.$code.
		'<br>Your UserName is '.$userName.
		'<br>Your Password is '.$password.
		'<br>Please click the following link in order to finish registration preocess<br>'.
		'http://corsair.cs.iupui.edu:22071/IUEM/dashboard/validate.php?theQueryString='.$code;
		$mailer = new Mail();
	
		if (($mailer->sendMail($emailAddress, $firstName, $subject, $body)) == true)
			$interactiveMessage .= "<br>A welcome message has been sent to the address. He or she have futher instrunction
									in order to activate his or her account<br>";
		else $interactiveMessage .= "<br>Email not sent. " . $emailAddress.' '. $firstName.' '. $subject.' '. $body;
	
		return $code;
	}

	/********************************************************************
	 * PHP - Page Initialization
	***********************************************************************/
	$firstName 			= "";
	$lastName			= "";
	$middleName 		= "";
	$email				= "";
	
	/********************************************************************
	 * PHP - IF Subimit
	***********************************************************************/
	if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		//flag for all input validation purpose
		$firstNameIsOk 	= false;
		$lastNameIsOk	= false;
		$middleNameIsOk = false;
		$passwordIsOk 	= false;
		$emailIsOk		= false;
		
		//always trim input values
		$firstName 	= trim($_POST['firstname']);
		$lastName	= trim($_POST['lastname']);
		$middleName = trim($_POST['middlename']);
		$email		= trim($_POST['email']);
		
		// validate text box input 1 - check empty
		if(empty($firstName))
		{
			$interactiveMessage = $interactiveMessage . "<br>First Name can not be empty.<br>";
		}
		if(empty($lastName))
		{
			$interactiveMessage = $interactiveMessage . "<br>Last Name can not be empty.<br>";
		}
		if(empty($password))
		{
			$interactiveMessage = $interactiveMessage . "<br>Password can not be empty.<br>";
		}
		if(empty($email))
		{
			$interactiveMessage = $interactiveMessage . "<br>Email can not be empty.<br>";
		}
		
		//validate text box input 2 - check English letter based
		if(characterCheck($firstName) == false)
		{
			$interactiveMessage = $interactiveMessage . "<br>First Name can only be English based letter.<br>";
		}
		else
		{
			$firstNameIsOk = true;
		}
		if(characterCheck($lastName) == false)
		{
			$interactiveMessage = $interactiveMessage . "<br>Last Name can only be English based letter.<br>";
		}
		else
		{
			$lastNameIsOk = true;
		}
		
		//validate text box input 3 - password qualify
		if(pwdValidate($password) == false)
		{
			$interactiveMessage = $interactiveMessage . "<br>Password should be Longer than 12 characters and alphanumeric letters.<br>";
		}
		else
		{
			$passwordIsOk = true;
		}
		
		//validate text box input 4 - Email qualify
		if(emailAddressCheck($email) == false)
		{
			$interactiveMessage = $interactiveMessage . "<br>Email is not an valid Email Address.<br>";
		}
		else
		{
			$emailIsOk = true;
		}
		
		//TODO
		//validate text box input 5 - mysql_real_escape_string()
		
		
		//all input flag issue are passing
		if ($firstNameIsOk && $lastNameIsOk && $passwordIsOk && $emailIsOk)
		{
			//Database activities - check Whether the Record has already occur
			$sqlCountFaculty = "SELECT COUNT(*) AS COUNTER FROM A_FACULTY WHERE UserName = '" . $email. "';";
			$resultSqlCountFaculty = mysql_query($sqlCountFaculty, $conn) or die(mysql_error());
			$theObject = mysql_fetch_object($resultSqlCountFaculty);
			$count = $theObject -> COUNTER;
			if ($count != 0)
			{
				$interactiveMessage.="<br/>This user has already been registered as an Admin.";
			}//END if ($count != 0)
			else
			{
				//send Email
				$activationCode = sendEmail($email, $firstName, $email, $password);

				$sqlFacultyInsertion = "INSERT INTO A_FACULTY
											(	FacultyID, 
												FirstName, 
												LastName, 
												MiddleName, 
												UserName, 
												UserPassword, 
												ActivationCode, 
												IsActive,
												FirstAccessDate)
											values(
												null,
												'$firstName',
												'$lastName',
												'$middleName',
												'$email',
												'$password',
												'$activationCode',
												'NO',
												'0000-00-00 00:00:00');";
				$resultInsertion = mysql_query($sqlFacultyInsertion, $conn) or die(mysql_error());
				if ($resultInsertion)
				{
					$interactiveMessage .= "<br>You information has been inserted into Database successfully.";
				}
				else
				{
					$interactiveMessage .= "<br>there has some problems during record insertion; please re-insert admin. record again.";
				}
				
				
				}//END ELSE($count != 0)
			}			
		}//END if ($firstNameIsOk && $lastNameIsOk && $passwordIsOk && $emailIsOk)

echo <<<EOT
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Create Faculty User</h1>
    </div>
EOT;

if ($interactiveMessage != "")
{
	print "<div class=\"col-sm-6 col-sm-offset-3 col-md-10 col-md-offset-2 main\">
	<div class=\"row bg-danger\">
	 		<center>".$interactiveMessage."</center><br/>
	 	</div>
	    </div>";
}
$interactiveMessage = "";

echo <<<EOT

    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<form id="post_form" action="createFaculty.php" class="form-horizontal" role="form" method="post">
			
EOT;
			//screen out the issues at the top of page
			
echo <<<EOT
<!--div class="col-sm-9 col-sm-offset-1 col-md-4 col-md-offset-1"-->
		<div class="form-group has-warning">
			<label for="firstname" class="col-sm-2 control-label">First Name:</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname">
			</div>
		</div>
		<div class="form-group">
			<label for="middlename" class="col-sm-2 control-label">Middle Name:</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="middlename" placeholder="Middle Name" name="middlename">
			</div>
		</div>
		<div class="form-group has-warning">
			<label for="lastname" class="col-sm-2 control-label">Last Name:</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname">
			</div>
		</div>
		<div class="form-group has-warning">
			<label for="email" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-6">
				<input autocomplete="off" type="email" class="form-control" id="email" placeholder="Email" name="email">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password:</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="password" placeholder="{$password}" name="password" disabled>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-1 col-xs-6 col-md-4">
				<br/>
				<input type="button" class='btn btn-primary' onclick='validateCreateFaculty();' name="formSubmit" value="Create Faculty User" />
			</div>
		</div>
		</div>
</form>
</div>
EOT;

	include_once('./php/footer.php');
?>