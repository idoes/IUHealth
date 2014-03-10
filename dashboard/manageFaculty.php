<?php
	include_once('./php/header.php');
	require_once("dbconnect.php");
	
	//TODO
	/*************************************************************
	 * DB activity - Check SESSION vaiable against DB.ADMIN
	*************************************************************/
	
	
	/********************************************************************
	 * Reference - Datbase Faculty Attribute name
	***********************************************************************/
	/*
	 * FacultyID,
		FirstName,
		LastName,
		MiddleName,
		Email,
		Title,
		Position,
		OfficeLocation,
		BioText,
		BioPhotoLink,
		CVFileLink,
		UserName,
		UserPassword,
		ActivationCode,
		IsActive,
		FirstAccessDate,
		LastAccessDate
	*/
	
	
	
	
	
	/*************************************************************
	 * DB activity - Fetch record from DB.ADMIN and build related XML
	*************************************************************/
	$sql = "SELECT * FROM A_FACULTY;";
	$result = mysql_query($sql, $conn) or die(mysql_error());
	$xml = new SimpleXMLElement('<xml/>');
	while($row = mysql_fetch_assoc($result))
	{
		$facultyInstance = $xml->addChild('FacultyInstance');
		$facultyInstance->addChild('FacultyID', 		$row['FacultyID']);
		$facultyInstance->addChild('FirstName', 		$row['FirstName']);
		$facultyInstance->addChild('LastName',	 		$row['LastName']);
		$facultyInstance->addChild('MiddleName', 		$row['MiddleName']);
		$facultyInstance->addChild('Email', 			$row['Email']);
		$facultyInstance->addChild('Title', 			$row['Title']);
		$facultyInstance->addChild('Position', 			$row['Position']);
		$facultyInstance->addChild('OfficeLocation', 	$row['OfficeLocation']);
		$facultyInstance->addChild('BioText', 			$row['BioText']);
		$facultyInstance->addChild('BioPhotoLink', 		$row['BioPhotoLink']);
		$facultyInstance->addChild('CVFileLink', 		$row['CVFileLink']);
		$facultyInstance->addChild('UserName', 			$row['UserName']);
		$facultyInstance->addChild('UserPassword', 		$row['UserPassword']);
		$facultyInstance->addChild('ActivationCode', 	$row['ActivationCode']);
		$facultyInstance->addChild('IsActive', 			$row['IsActive']);
		$facultyInstance->addChild('FirstAccessDate', 	$row['FirstAccessDate']);
		$facultyInstance->addChild('LastAccessDate', 	$row['LastAccessDate']);
	
	}//end while ($row = mysql_fetch_assoc($result))
	
	/*************************************************************
	 * write $xml variable to a file on the server
	*************************************************************/
	$fp = fopen("xml/Table-Solo-Faculty.xml","wb");
	fwrite($fp, $xml->asXML());
	fclose($fp);
?>


<!--********************************************************************
		* HTML part 
	***********************************************************************-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <!-- TODO use session variable to get user's full name -->
      <h1 class="page-header">Current Faculty</h1>
</div>
    
<div class="container-fluid">
	<div class="row">	        
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>#</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Middle Name</th>
						<th>User Name</th>
						<th>User Password</th>
						<th>Activation Code</th>
						<th>Activated</th>
						<th>First Access Date</th>
						<th>Last Access Date</th>
						<th>Edit</th>
					</tr>
					<?php
						
						//TODO
						//Add for loop to go through user DB and print out tr/td info
						$facultyRecord = simplexml_load_file('xml/Table-Solo-Faculty.xml');
						$i = -1;
						foreach ($facultyRecord as $index)
						{
							//get the index for this associated array
							$i++;
							//prepare for query string
							$get = $_GET;
							$get['facultyXMLID'] = $i;
							$theQueryString = http_build_query($get);
							print <<<HERE
							<tr>
								<td>$index->FacultyID</td>
								<td>$index->FirstName</td>
								<td>$index->LastName</td>
								<td>$index->MiddleName</td>
								<td>$index->UserName</td>
								<td>$index->UserPassword</td>
								<td>$index->ActivationCode</td>
								<td>$index->IsActive</td>
								<td>$index->FirstAccessDate</td>
								<td>$index->LastAccessDate</td>
								<td><a href="editSingleFaculty.php?$theQueryString">Edit</a></td>
							</tr>
HERE;
							//test
							echo "<br>" .$i;
						}//end foreach ($adminRecord as $index)
					?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
	include_once('./php/footer.php');
?>