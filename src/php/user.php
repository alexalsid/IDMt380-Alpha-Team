


<section class="userModal modal" id="userModal">
	<h1 class="modalTitle" id="userTitle">Account</h1>

	<div class="innerUserModal">

	<div class="show" id="form-cont">

	<form id="signIn" class="signIn" action="" method="post">
	<h2 class="login_header" id="login_header">Log In</h2>
		<input name="username" class="input_box" type="email" id="username" maxlength="30" placeholder="Email">
		<input name="password"class="input_box" type="password"  id="password" minlength="8" maxlength="15" placeholder="Password (at least 8 characters)">
		<input type="submit" class="infoBtn" id="oldSubmit" value="Sign In">
</form>

<form id="signUp" class="signIn" action="" method="POST">
<h2 class="login_header" id="login_header">Sign Up</h2>
		<input class="input_box" type="email" name="new-username" id="new-username" minlength="8" maxlength="" placeholder="Email">	
		<input class="input_box" type="password" name="new-password" id="new-password" minlength="8" maxlength="15" placeholder="Password" onclick="matchPW()">	
		<input class="input_box" type="password" id="passwordConfirm" minlength="8" maxlength="15" placeholder="Confirm Password" onclick="matchPW()">
		<input type="submit" class="infoBtn" id="newSubmit" value="Sign Up">
	</form>


</div>






	<div class="info hide" id="info">
	<h2 class="yourName" id="yourName">Your Info</h2>
		<img class="yourImg" id="yourImg" src="" alt="Profile Image">
		<button class="infoBtn" id="exportAllBtn">Export Images</button>
		<button class="infoBtn" id="clearAllBtn">Clear Images</button>
		<button class="infoBtn" id="logout">Log Out</button>
	</div>

	<div class="myGallery hide" id="myGallery">
		

		<?php

		$userFile = file_get_contents('../src/php/json/user.json');
		$userData = json_decode($userFile, true);
		$thisUser = $_GET['username'];

		foreach($userData as $user) {

			if($user['username']== $thisUser) {

					foreach ($user['saved_work'] as $work) {

						echo 
						'<div class="SVGbox">
						<div class="innerBox">
						<div class="svg-data user">';
						
						include $work["saved_source"];	

					echo'</div>
						</div>
						</div>';
						
						
					};

			};

		};
?>
		
		
	
	</div>

	</div>
	
</section>

<?php include 'signup.php'; ?>