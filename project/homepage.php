<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet">
	<style type="text/css">
		body
		{
			background: #f7f7f7;
			font-family: Roboto;
		}

		*
		{
 			box-sizing: border-box;
		}

		hr
		{
			padding-top: 2px;
		    border: 0;
		    height: 1px;
		    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
		}

		img
		{
			float: left;
			border-radius: 150px;
		}

		.rowOne
		{
			padding-bottom: 5em;
		}

		.topBar
		{
			opacity: 100%;
			z-index:10;
    		background:inherit;
    		background-color: #dbf7ff; 
    		border: 1px solid darkgrey; 
    		position: fixed; 
    		top: 0; left: 0; right: 0; 
    		width: 100%;
		}

		.names
		{
			padding-right: 5em;
			padding-left: 5em;
			font-size: 1vw;
		}

		.center 
		{
		    color: #ff6138;
		    font-weight: 700;
		    display: block;
		    border: 1px solid #ff6138;
		    border-width: 1px 0;
		    margin: 10px 0;
		    padding: 15px 0;
		    font-size: .72em;
		}

		.row 
		{
  			display: flex;
		}

		/* Create two equal columns that sit next to each other */
		.column-two
		{
  			flex: 50%;
	  		padding: 10px;
		}

		/* Create four equal columns that sits next to each other */
		.column-three
		{
  			flex: 33.3%;
	  		padding: 10px;
	  		text-align: center;
		}

		table.htmlTable thead, table.htmlTable td, table.htmlTable tr
		{
			border: 1px solid black;
			padding-left: 1em;
			padding-right: 1em;
		}

		table.cssTable thead, table.cssTable td, table.cssTable tr
		{
			border: 1px solid darkgrey;
			border-radius: 3px;
			padding-left: 1em;
			padding-right: 1em;
			background-color: #c2d9ff;
		}

		table.cssTable td:hover
		{
			transition: transform .2s .05s;
			transform: scale(1.1);
			transition-delay: 0s;
		}

		table.jsTable thead, table.jsTable td, table.jsTable tr
		{
			border: 1px solid darkgrey;
			border-radius: 3px;
			padding-left: 1em;
			padding-right: 1em;
			background-color: #d2fcea;
		}

		table.jsTable td:hover
		{
			transition: transform .2s .05s;
			transform: scale(1.1);
			transition-delay: 0s;
		}

		#tyler, #nabil, #keren, #tariq
		{
			opacity: 50%;
		}

		#tyler:hover, #nabil:hover, #keren:hover, #tariq:hover
		{
			opacity: 100%;
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

		if ( isset($_POST['guestInput']) && !empty($_POST['guestInput']) )
		{
			$altered = preg_replace("/[^[:alnum:][:space:]]/u", '', $_POST['guestInput']);
			echo $altered;
			$sql = "INSERT IGNORE INTO guest_names (guest_name)
			VALUES ('".$altered."')";
			if (mysqli_query($conn, $sql)) {
			}
			else
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		$sql = "SELECT guest_name FROM guest_names ORDER BY guest_number DESC LIMIT 5";
		$result = $conn->query($sql);
		$guestArr = array();

		while ($row = $result->fetch_assoc()) {
			$hobbyArr[] = $row["guest_name"];
		}
	?>
	<div class="row topBar">
		<div class="column-two" style="text-align: center; font-family: 'Roboto', sans-serif; font-size: 1.85vw;">
			<span>CS 4300</span>
			<span class="center">GROUP</span>
			<span>Project</span>
		</div>
		<div class="column-two" style="font-weight: 300; font-style: italic;">
			<table>
				<tr>
					<td class="rowOne names"><a href="pages/tyler/index.php">Tyler Hebert</a></td>
					<td class="rowOne names">Nabil Mehari</td>
				</tr>
				<tr >
					<td class="names"><a href="pages/keren/index.html">Keren Nino</a></td>
					<td class="names"><a href="pages/tariq/index.html">Tariq Ali</a></td>
				</tr>
			</table>
		</div>
	</div>
	<hr style="margin-bottom: 25px; margin-top: 11.9em;">

	
	<h1 style="text-align: center; padding-bottom: 14px;">Meet the team</h1>

	<div class="row">
		<div class="column-two" id="tyler">
			<img src="pics/tyler.jpg" style="width:300px; height: 300px">
			<p id="tylerParagraph" style="margin-left: 20.2em;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="column-two" id="nabil">
			<img src="pics/nabil.png" style="width:300px; height: 300px">
			<p id="nabilParagraph" style="margin-left: 20.2em">Nabil Mehari is a senior at the University of Houston Downtown. Prior to this class, he learned coding languages such as C++, C#, Python, Java, and Assembly. Through this class, he gained experience in the likes of HTML, CSS, and JavaScript. Nabil is on track to graduate this month (December 2020) with a degree in Computer Science. On the side, Nabil has done theatre (both regular and musicals) for a large portion of his life alongside his programming studies and plans on continuing with it once the pandemic is over.</p>
		</div>
	</div>
	<div class="row">
		<div class="column-two" id="keren">
			<img src="pics/keren.jpeg" style="width:300px; height: 300px">
			<p id="kerenParagraph" style="margin-left: 20.2em">Keren Nino is a senior at the University of Houston-Downtown. She is scheduled to graduate on Dec 19, 2020. After she graduates, she plans to work in IT or web designing. She would also like to travel to London or Greece. In her spare time, she likes to draw, paint and watch movies. Keren also like to apply her coding skills - she is currently practicing her JavaScript coding skills. She has two dogs: a husky named Balto and chihuahua named Milo. Keren loves the little moments in life and enjoys spending time with her family. She is ready to graduate and start the next journey of her life.
</p>
		</div>
		<div class="column-two" id="tariq">
			<img src="pics/tariq.jpeg" style="width:300px; height: 300px">
			<p id="tariqParagraph" style="margin-left: 20.2em">Tariq Ali is a senior at the University of Houston Downtown. He is scheduled to graduate next semester in spring 2021. After the graduation he is planning to work in IT industry. He was born in Pakistan and moved here at the age of 12, he loves playing sports. He loves to travel. He has been to Europe, Asia, Africa and Australia. He also like to apply his coding skills in to work, he practicing Java, Python.</p>
		</div>
	</div>

	<div class="row" style="font-family: 'Roboto'; font-weight: 300; border-bottom: 2px dotted darkgrey; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; padding-bottom: 25px;
	border-top: 2px dotted darkgrey; border-top-right-radius: 20px; border-top-left-radius: 20px; margin-top: 25px;">
		<div class="column-three" id="htmlColumn">
			<h4>HTML</h4>
			<hr style="padding-top: 1px;">
			<table style="border: 1px solid black; margin: 0 auto;" class="htmlTable">
				<thead>This is a table.</thead>
				<tr>
					<td>It has rows.</td>
					<td>And it has columns.</td>
				</tr>
				<tr>
					<td>Using HTML, we can</td>
					<td>change the borders, margins,</td>
				</tr>
				<tr>
					<td>and make small style changes.</td>
					<td>It's very basic!</td>
				</tr>
			</table>
		</div>
		<div class="column-three" id="cssColumn">
			<h4>CSS</h4>
			<hr style="padding-top: 1px;">
			<table class="cssTable" style="border: 1px solid darkgrey; border-radius: 12px; padding: 5px; background-color: #ffe8c2;">
				<thead>This is a table <em>with CSS</em>.</thead>
				<tr>
					<td>With CSS, you can change the style of your element.</td>
					<td>Or make it change when you hover.</td>
				</tr>
				<tr>
					<td>Using CSS, we can design </td>
					<td>everything JUST the way we want it!</td>
				</tr>
				<tr>
					<td>We can even perform small animations!</td>
					<td>It really takes HTML elements to the next level.</td>
				</tr>
			</table>
		</div>
		<div class="column-three" id="jsColumn">
			<h4>JavaScript</h4>
			<hr style="padding-top: 1px;">
			<table class="jsTable" style="border: 1px solid darkgrey; border-radius: 12px; padding: 5px; background-color: #fcd2e4;">
				<thead>This is a table <em>with CSS <strong>and</strong> JavaScript</em>.</thead>
				<tr>
					<td>JavaScript allows you to handle data</td>
					<td>or perform functions on your page.</td>
				</tr>
				<tr>
					<td>Using JavaScript, when you</td>
					<td>click this <button type="button" onclick="document.getElementById('dateTimeContent').innerHTML = Date()">
					button,</button></td>
				</tr>
				<tr>
					<td>the date and time will appear over here! --></td>
					<td id="dateTimeContent"></td>
				</tr>
			</table>
		</div>
	</div>

	<div class="row" style="border-bottom: 2px dotted darkgrey; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; padding-bottom: 25px;">
		<div class="column-three"></div>
		<div class="column-three">
			<h1>Sign our guest book!</h1>
			<form method="post" action="homepage.php" style="text-align: center;">
				<input type="text" name="guestInput" id="guestInput" placeholder="Enter your name here :)">
				<input type="submit" name="submitButton" style="height: 2.0vw">
				<div>
					<p>Recent guests:</p>
					<div>
						<select size="5" style="width: 200px; display: inline-block;">
						<?php
							for ($i = 0; $i < 5; $i++)
							{
								echo "<option>" .$hobbyArr[$i]. "</option>";
							}

							$conn->close();
						?>
					</select>
					</div>
				</div>
				
			</form>
		</div>
		<div class="column-three"></div>
	</div>

</body>
</html>