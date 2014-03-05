<?php
	//pass one of the following strings as ajaxID
	//create-user
	//manage-users
	//create-admin
	//manage-admins
	//create-project
	//manage-projects
	//profile
	//help
	
	$requestedPage = $_GET['ajaxID'];
	
	if($requestedPage == 'create-user')
	{
echo <<<EOT
   <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Create User</h1>
    </div>
    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<form action="createUser.php" class="form-horizontal" role="form" method="post" id="create-user-post">
			<div class="form-group">
				<label for="firstname" class="col-sm-1 control-label">First Name:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="firstname" placeholder="First Name (Required)" name="firstname">
				</div>
			</div>
			<div class="form-group">
				<label for="middlename" class="col-sm-1 control-label">Middle Name:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="middlename" placeholder="Middle Name" name="middlename">
				</div>
			</div>
			<div class="form-group">
				<label for="lastname" class="col-sm-1 control-label">Last Name:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="lastname" placeholder="Last Name (Required)" name="lastname">
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-1 control-label">Email</label>
				<div class="col-sm-4">
					<input type="email" class="form-control" id="email" placeholder="Email (Required)" name="email">
				</div>
			</div>
			<div class="form-group">
				<label for="title" class="col-sm-1 control-label">Title:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="title" placeholder="Title" name="title">
				</div>
			</div>
			<div class="form-group">
				<label for="position" class="col-sm-1 control-label">Position:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="position" placeholder="Position" name="position">
				</div>
			</div>
			<div class="form-group">
				<label for="officelocation" class="col-sm-1 control-label">Office:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="officelocation" placeholder="Office Location" name="officelocation">
				</div>
			</div>
			<div class="form-group">
				<label for="biotext" class="col-sm-1 control-label">Bio:</label>
				<div class="col-sm-4">
					<textarea rows="6" class="form-control" id="officelocation" placeholder="Bio" name="biotext"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="biophoto" class="col-sm-1 control-label">Bio-Photo</label>
				<div class="col-sm-4">
					<input type="file" class="form-control" id="officelocation" placeholder="" name="biophoto">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-10">
					Note:  Faculty can edit all of these fields after account creation.
				</div>
			</div>
	</form>
			<div class="form-group">
			<div class="col-sm-offset-1 col-sm-10">
				<br/>
				<button onclick="validateUserPanel();"class="btn btn-primary">
					Create User
				</button>
			</div>
		</div>
    </div>

	</div>
EOT;
	}
	else if($requestedPage == 'manage-users')
	{
echo <<<EOT
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Current Users</h1>
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
						<th>Email</th>
						<th>Accepted Invitation</th>
						<th>Edit</th>
					</tr>
					<?php
						//TODO
						//Add for loop to go through user DB and print out tr/td info
					?>
					<tr>
						<td>1</td>
						<td>John</td>
						<td>Doe</td>
						<td>email@email.com</td>
						<td class="success">Yes</td>
						<td><a href="#">Edit</a></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Woodrow</td>
						<td>Wilhelm</td>
						<td>WoodrowSWilhelm@armyspy.com</td>
						<td class="danger">No <a href="#">(Resend Email)</a></td>
						<td><a href="#">Edit</a></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Roy</td>
						<td>Walker</td>
						<td>RoyKWalker@teleworm.us</td>
						<td class="success">Yes</td>
						<td><a href="#">Edit</a></td>
					</tr>
					<tr>
						<td>4</td>
						<td>Benjamin</td>
						<td>Grace</td>
						<td>BenjaminDGrace@dayrep.com</td>
						<td class="success">Yes</td>
						<td><a href="#">Edit</a></td>
					</tr>
					<tr>
						<td>5</td>
						<td>Louis</td>
						<td>Hales</td>
						<td>LouisAHales@armyspy.com</td>
						<td class="danger">No <a href="#">(Resend Email)</a></td>
						<td><a href="#">Edit</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
EOT;
	}
	else if($requestedPage == "create-admin")
	{
echo <<<EOT
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Create Administrator User</h1>
    </div>
    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<form action="createAdminUser.php" class="form-horizontal" role="form" method="post">
			
			<div class="form-group">
				<label for="firstname" class="col-sm-1 control-label">First Name:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="firstname" placeholder="First Name (Required)" name="firstname">
				</div>
			</div>
			<div class="form-group">
				<label for="middlename" class="col-sm-1 control-label">Middle Name:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="middlename" placeholder="Middle Name" name="middlename">
				</div>
			</div>
			<div class="form-group">
				<label for="lastname" class="col-sm-1 control-label">Last Name:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="lastname" placeholder="Last Name (Required)" name="lastname">
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-1 control-label">Email</label>
				<div class="col-sm-4">
					<input type="email" class="form-control" id="email" placeholder="Email (Required)" name="email">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-1 control-label">Password:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="password" placeholder="Password (Required)" name="password">
				</div>
			</div>
			<!-- see note 4  
			<div class="form-group">
				<label for="position" class="col-sm-1 control-label">Access Level:</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="accessLevel" placeholder="Administrator or Faculty Member (Required)" name="accessLevel">
				</div>
			</div>
			-->
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-10">
					Note1: Only Administrator can create, view, update, and delete an Database user record.<br>
					Note2: We have perfomed create rule in this file. we may integrate update rule and delete rule with
							view rule since updating and deleting need to be performed only after viewing.<br>
					Note3: This file is intended to perfom the same action as createUser.php. <br>
					Task1:	Database Table[ADMIN] add attribute MiddleName.<br>
					Task2: 	create a file to view || update || delete Database user.<br>
					Note4: If the definition for ADMIN table is all the people who can access this DB and the definition for 
							FACULTY is all the people who have been involved into a project as Researcher, or PI, or Co-PI,
							then ADMIN-AccessLevel attribute is useless.<br>
					Note5: Assume we have ADMIN table and FACULTY table, how could a faculty (a Database user) edit his or 
							her profile in FACULTY table?<br>
					Note6: Assume we have ADMIN table and FACULTY table separately, how could we obtain current user's ID and 
							hold it into a SESSION variable? Be specific, If the same person is both a administrator and 
							faculty, this person's data is duplicated in ADMIN table and FACULTY table. This is not a 
							problem. When this person is logged in, we can hold his or her identity from ADMIN.Email and 
							store this value into SESSION. But, how could we pull out all the projects belong to him or her? 
							Since in FACULTY table, this person's identity is using an auto-incremented key. Besides, we can 
							make the Email attribute in FACULTY as PK. But, a database user may change this FACULTY.Email 
							value later on. In other words, there is a chance that ADMIN.Email and FACULTY.Email would not 
							be equal all the time.<br>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-10">
					<br/>
					<!-- use input instead button -->
					<input type="submit" class="btn btn-primary" name="formSubmit" value="Create Administrator User" />
					<!--  
					<button type="submit" class="btn btn-primary" name="formSubmit">
						Create Database User
					</button>
					-->
				</div>
			</div>
	</form>
    </div>

	</div>
EOT;
	}
	else if($requestedPage == 'manage-admins')
	{
echo <<<EOT
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Current Admins</h1>
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
						<th>Email</th>
						<th>ROLE</th>
						<th>Edit</th>
					</tr>
					<?php
						//TODO
						//Add for loop to go through user DB and print out tr/td info
					?>
					<tr>
						<td>1</td>
						<td>John</td>
						<td>Doe</td>
						<td>email@email.com</td>
						<td class="success">ADMIN</td>
						<td><a href="#">Edit</a></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Woodrow</td>
						<td>Wilhelm</td>
						<td>WoodrowSWilhelm@armyspy.com</td>
						<td class="success">ADMIN</a></td>
						<td><a href="#">Edit</a></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Roy</td>
						<td>Walker</td>
						<td>RoyKWalker@teleworm.us</td>
						<td class="success">ADMIN</td>
						<td><a href="#">Edit</a></td>
					</tr>
					<tr>
						<td>4</td>
						<td>Benjamin</td>
						<td>Grace</td>
						<td>BenjaminDGrace@dayrep.com</td>
						<td class="success">ADMIN</td>
						<td><a href="#">Edit</a></td>
					</tr>
					<tr>
						<td>5</td>
						<td>Louis</td>
						<td>Hales</td>
						<td>LouisAHales@armyspy.com</td>
						<td class="success">ADMIN</a></td>
						<td><a href="#">Edit</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
EOT;
}
	else if($requestedPage == 'create-project')
	{
echo <<<EOT
   <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Create Project</h1>
    </div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<form action="createProject.php" class="form-horizontal" role="form" method="post">
			<div class="form-group">
				<label for="projecttitle" class="col-sm-1 control-label">Title:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="projecttitle" placeholder="Project Title" name="projecttitle">
				</div>
			</div>
			<div class="form-group">
				<label for="projecttitle" class="col-sm-1 control-label">Abstract:</label>
				<div class="col-sm-4">
					<textarea rows="6" class="form-control" id="projectAbstrct" placeholder="Project Abstract" name="projectAbstract"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-1 control-label">Description:</label>
				<div class="col-sm-4">
					<textarea rows="6" class="form-control" id="description" placeholder="Project Description" name="description"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="startdate" class="col-sm-1 control-label">Project Start Date:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="startdate" placeholder="Project Start Date" name="startdate">
				</div>
			</div>
			<div class="form-group">
				<label for="enddate" class="col-sm-1 control-label">Project End Date:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="enddate" placeholder="Project End Date" name="enddate">
				</div>
			</div>
			<div class="form-group">
				<label for="projectInspector" class="col-sm-1 control-label">Project Inspector:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="projectInspector" placeholder="Project Inspector" name="projectInspector">
				</div>
			</div>
			<div class="form-group">
				<label for="projectInspectorStartDate" class="col-sm-1 control-label">project Inspector Start Date:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="projectInspectorStartDate" placeholder="project Inspector Start Date" name="projectInspectorStartDate">
				</div>
			</div>
			<div class="form-group">
				<div class="control-group">
				<label for="projectCoInspector" class="col-sm-1 control-label">Project Co-Inspector:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="projectCoInspector" placeholder="Project Co-Inspector" name="projectCoInspector">
				</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-4">
			<input type='button' class='btn btn-primary' value='Add Co-PI' id='addButton' />
    			<input type='button' class='btn btn-primary' value='Remove Co-PI' id='removeButton' />
				</div>
			</div>
			<div class="form-group"><br/>
				<div class="col-sm-offset-1 col-sm-4">
					Note:  Once a project has been created, you can assign team members, upload files, and make changes to the above fields again.<br>
					Issue1: Co-Inspector layout.<br>
					Issue2: Co-Inspector have to have a date for his or her co-inspection on this project.<br>
					Note: we may want to redesign the co-inspector stuff; get those out and follow the below scenario.<br>
					Note: In the perspective of this functionality, I am thinking we can add the default PI only, then add other participatants seperately.<br>
					Note: for the same person, he or she can join a project as a normal reseacher or as a PI or as a Co-PI. <br>
					On the other hands, a person can grant one or more as a normal reseacher or as a PI or as a Co-PI.<br>
					
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-10">
					<br/>
					<button type="submit" class="btn btn-primary">
						Create Project
					</button>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
EOT;
	}
	else if($requestedPage == 'manage-projects')
	{
echo <<<EOT
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Manage Projects</h1>
 </div>    
 
 <div class="container-fluid">
      <div class="row">	        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>#</th>
						<th>Project Title</th>
						<th>Created On</th>
						<th>Members</th>
						<th>Edit</th>
					</tr>
					<?php
						//TODO
						//Add for loop to go through project DB and print out tr/td info
					?>
					<tr>
						<td>1</td>
						<td>Project 1</td>
						<td>2/14/2014</td>
						<td>
							<ul>
							  <li>User 1 (Creator)</li>
							  <li>User 2</li>
							  <li>User 3</li>
							</ul>
						</td>
						<td><a href="#">Edit</a></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Project 2</td>
						<td>2/04/2014</td>
						<td>
							<ul>
							  <li>User 1 (Creator)</li>
							  <li>User 2</li>
							  <li>User 3</li>
							  <li>User 4</li>
							</ul>
						</td>
						<td><a href="#">Edit</a></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Project 3</td>
						<td>1/01/2013</td>
						<td>
							<ul>
							  <li>User 1 (Creator)</li>
							</ul>
						</td>
						<td><a href="#">Edit</a></td>
					</tr>
					<tr>
						<td>4</td>
						<td>Project 4</td>
						<td>9/10/2012</td>
						<td>
							<ul>
							  <li>User 1 (Creator)</li>
							  <li>User 2</li>
							</ul>
						</td>
						<td><a href="#">Edit</a></td>
					</tr>
					<tr>
						<td>5</td>
						<td>Project 5</td>
						<td>1/29/2013</td>
						<td>
							<ul>
							  <li>User 1 (Creator)</li>
							  <li>User 2</li>
							  <li>User 3</li>
							  <li>User 4</li>
							  <li>User 5</li>
							</ul>
						</td>
						<td><a href="#">Edit</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
EOT;
	}
	else if($requestedPage == 'profile')
	{
echo <<<EOT
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">My Profile</h1>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-5 col-md-offset-2 main">
	<table class="table">
  		<tr>
  			<th>My Profile</th>
  			<th></th>
  		</tr>
  		<tr>
  			<td><b>First Name:</b></td>
  			<td>Name</td>
  		</tr>
  		<tr>
  			<td><b>Middle Name:</b></td>
  			<td>Name</td>
  		</tr>
  		<tr>
  			<td><b>Last Name:</b></td>
  			<td>Name</td>
  		</tr>
  		<tr>
  			<td><b>Email:</b></td>
  			<td>email@email.com</td>
  		</tr>
  		<tr>
  			<td><b>Title:</b></td>
  			<td>Title</td>
  		</tr>
  		<tr>
  			<td><b>Position:</b></td>
  			<td>Position</td>
  		</tr>
  		<tr>
  			<td><b>Office Location:</b></td>
  			<td>Room</td>
  		</tr>
  		<tr>
  			<td><b>Bio:</b></td>
  			<td>Bio</td>
  		</tr>
  		<tr>
  			<td><b>Bio-Photo</b></td>
  			<td>Headshot</td>
  		</tr>
	</table>
	<!-- The following need to be delete after PHP implementation. -->
	<div class="form-group">
		<div class="col-sm-offset-1 col-sm-10">
			Note1: Current DB Design wouldn't let a faculty edit his or her profile in FACULTY table. 
					Since current DB Design, assume only instance of ADMIN can Create, Read, Update, delete FACULTY table.<br>	
		</div>
	</div>
	<div class="col-sm-offset-0 col-sm-10">
	<br/>
		<button type="submit" class="btn btn-primary btn-lg">
			Edit My Profile
		</button>
	</div>	
</div>
EOT;
	}
	else if($requestedPage == 'help')
	{
echo <<<EOT
    <div class="container-fluid">
      <div class="row">	        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Help Page</h1>
          <h2 class="sub-header">Learn how to use this tool here.</h2>
        </div>
      </div>
    </div>
EOT;
	}
	else
	{
		echo 'Sorry, that content was not found.';	
	}
?>