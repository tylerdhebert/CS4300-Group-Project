<!DOCTYPE html>
<html>
<head>
	<title>Tyler Hebert's Personal Page</title>
	<style type="text/css">
		#meAndAzure
		{
			max-width: 100%;
			max-height: auto;
			float: left;
			margin-right: 3vw;
			padding: .6vw;
		}

		#meAndAzure:hover
		{
			position: relative;
  			animation: myMove 1s infinite;
  			animation-direction: alternate;
		}

		#top
		{
			padding-left: 33%;
			column-count: 2;
			column-rule: 4px double #ff00ff;
			column-width: 400vw;
			font-size: 1.4vw;
		}

		#github
		{
			background-color: orangered;
			opacity: 65%;
			transition: .3s;
		}

		#github:hover
		{
			background-color: maroon;
			opacity: 100%;
		}

		#facebook
		{
			background-color: orangered;
			opacity: 65%;
			transition: .3s;
		}

		#facebook:hover
		{
			background-color: maroon;
			opacity: 100%;
		}

		#links
		{
			margin-top: 8vw;
			max-width: 55%;
			margin-right: auto;
			text-align: center;
			font-family: Arial;
		}

		#paragraphs
		{
			font-size: 1.03vw;
		}

		.textStyle
		{
			background-color: aliceblue; 
			background-size: 50% 50%; 
			max-width: 40%; 
			text-align: center; 
			margin-left: auto; 
			margin-right: auto; 
			font-family: Arial, Helvetica, sans-serif;
		}

		a
		{
			color: lightgrey;
			text-decoration: none;
		}

		a:visited
		{
			color: lightgrey;
		}

		a:hover
		{
			color: darkgrey;
		}

		body
		{
			background-image: url(https://img.freepik.com/free-vector/seamless-pattern_1159-5086.jpg?size=626&ext=jpg); 
			background-repeat: repeat;"
		}

		h1
		{
			font-size: 1.83vw;
		}

		td, tr
		{
			padding: 15px;
			border-radius: 15px;
		}		

		@keyframes myMove {
			0% {left: 0px; top: 0px;}
			25% {left: 25px; top: 10px;}
			50% {left: 0px; top: 10px;}
			75% {left: 25px; top: 0px;}
			100% {left: 0px; top: 0px;}
		}
	</style>
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "project";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		if ( isset($_POST['hobbyInput']) && !empty($_POST['hobbyInput']) )
		{
			$altered = preg_replace("/[^[:alnum:][:space:]]/u", '', $_POST['hobbyInput']);
			$sql = "INSERT IGNORE INTO hobbies (hobby_name)
			VALUES ('".$altered."')";
			if (mysqli_query($conn, $sql)) {
			}
			else
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		$sql = "SELECT hobby_name FROM hobbies ORDER BY hobby_number DESC LIMIT 5";
		$result = $conn->query($sql);
		$hobbyArr = array();

		while ($row = $result->fetch_assoc()) {
			$hobbyArr[] = $row["hobby_name"];
		}
	?>
	<h1 align="center" id = "header">Tyler Hebert!</h1>
	<div style="text-align: center">
		<form style="display: inline-block;" action="../../homepage.php">
    		<input type="submit" value="Take me back" />
		</form>
	</div>
	<hr>
	<div id="top">
		<img id="meAndAzure" src="meAndAzure.jpg" alt = "Me and my girlfriend!" border="6" width="400vw">
		<table id="links">
			<tr>
				<td id="github">
					<a href="https://github.com/tylerdhebert">Github</a>
				</td>
			</tr>
			<tr>
				<td id="facebook">
					<a href="https://www.facebook.com/tyler.hebert.355/">Facebook</a>
				</td>
			</tr>
		</table>
	</div>
	<hr>

	<div id="paragraphs">
		<p class="textStyle" style="color: maroon;">Hello! My name is Tyler Hebert. I'm a 25 year old Computer Science student at University of Houston-Downtown. I recently received my Associate's degree from Lone Star College, and have since transferred to UHD as a full time student. I should be finishing my Bachelor's degree by December of next year! I'm extremely excited.</p>
		<p class="textStyle" style="color: orangered;">The beautiful young lady you see in the picture with me is my girlfriend of 4 and a half years, Azure. She is also a student at UHD, studying Communications Studies. We have a little orange cat together and are hoping to buy a home together soon!</p>
	</div>

	<hr>

	<table border=2 style="max-width: 55%; margin-left: auto; margin-right: auto;">
		<tr>
			<td style="padding: 10px">
				<h3 align="center">My Hobbies:</h3>
			</td>
			<td style="padding: 10px">
				<h3 align="center">Let me know your hobbies!</h3>
			</td>
		</tr>
		<tr>
			<td style="padding: 10px">
				<ul style="font-size: 1.09vw;">
					<li>Hanging out with my girlfriend</li>
					<li>Cooking and baking bread
						<ul>
							<li>Sourdough breads</li>
							<li>White country loaves</li>
							<li>Rolls and sweet breads</li>
						</ul>
					</li>
					<li>Video games with the boys</li>
					<li>Playing with my cat</li>
				</ul>
			</td>
			<td style="padding: 10px">
				<form method="post" action="index.php" style="text-align: center;">
					<input type="text" id="hobbyInput" name="hobbyInput" placeholder="Input your hobby here!" style="height: 2.0vw">
					<input type="submit" name="submitButton" style="height: 2.0vw">
					<br>
					<p>Recent hobby submissions:</p>
					<select size="5" style="width: 125px; display: inline-block;">
						<?php
							for ($i = 0; $i < 5; $i++)
							{
								echo "<option>" .$hobbyArr[$i]. "</option>";
							}

							$conn->close();
						?>
					</select>
				</form>
			</td>
		</tr>
	</table>
</body>
<!-- <script type="text/javascript">
		var visitorName = window.prompt("Enter your name:");
		if (visitorName != "") {
			document.getElementById("header").innerHTML += "<br>Welcome " + visitorName + "!";
		}
		else{
			document.getElementById("header").innerHTML += "<br>Welcome visitor!";
		}
		
</script> -->
</html>