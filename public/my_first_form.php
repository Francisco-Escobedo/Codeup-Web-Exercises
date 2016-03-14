<?php

	var_dump($_GET);

	var_dump($_POST);
?>

<!DOCTYPE html>

<html>
	<head>

		<meta charset="utf-8">

		<title>My First HTML Form</title>

	</head>
	<body>

		<h2>User Login</h2>

			<form method="POST" action="/my_first_form.php">

			<p>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="Enter username here">
			</p>

			<p>
				<label for="password">Password</label>
				<input id="password" name="password" type="password" placeholder="Enter password here">
			</p>

			<p>
				<button type="submit">Login</button>
			</p>

			</form>

		<hr>

		<h2> Compose an Email </h2>

			<form method="POST" action="/my_first_form.php">

				<p>
					<label for="To">To</label>
					<input id="To" name="To" type="email" placeholder="To: Email address">
				</p>

				<p>
					<label for="From">From</label>
					<input id="From" name="From" type="email" placeholder="From: Email address">
				</p>

				<p>
					<label for="Subject">Subject</label>
					<input id="Subject" name="Subject" type="text" placeholder="Enter subject here">
				</p>

				<p>
					<textarea id="email_body" name= "email_body" rows="5" cols="40" Placeholder="Compose email message here"></textarea>
				</p>

				<p>
					<label for="save_copy">Would you like to save a copy in your sent folder?</label>

					<input type="checkbox" id="save_copy" name="save_copy" value="yes" checked>
				</p>

				<p>
					<button type="submit">Send Email</button>
				</p>

			</form>

			<h2> Multiple Choice Test </h2>

				<form method="POST" action="/my_first_form.php">

					<p>How many quarts of blood are circulating in the human body?</p>

					<label>
						<input type="radio" name="a1" value="10">
						10
					</label>
					<label>
						<input type="radio" name="a1" value="15">
						15
					</label>
					<label>
						<input type="radio" name="a1" value="4">
						4
					</label>
					<label>
						<input type="radio" name="a1" value="2">
						2
					</label>

					<p>What are the Spurs team colors?</p>

					<label>
						<input type="radio" name="a2" value="Red_and_Green">
						Red and Green
					</label>
					<label>
						<input type="radio" name="a2" value="Orange_and_Blue">
						Orange and Blue
					</label>
					<label>
						<input type="radio" name="a2" value="Brown_and_Teal">
						Brown and Teal
					</label>
					<label>
						<input type="radio" name="a2" value="Silver_and_Black">
						Silver and Black
					</label>
					

					<p> Which of the following cities are in Texas? </p>

					<label>
						<input type="checkbox" id="lc1" name="lc[]" value="San Antonio"> San Antonio 
					</label>
					<label>
						<input type="checkbox" id="lc2" name="lc[]" value="Boston">Boston 
					</label>
					<label>
						<input type="checkbox" id="lc3" name="lc[]" value="Austin">Austin 
					</label>
					<label>
						<input type="checkbox" id="lc4" name="lc[]" value="Las Vegas">Las Vegas 
					</label>

					<p>
						<button type="submit">Submit</button>
					</p>

				</form>

				<h2>Select Testing</h2>

				<form method="POST" action="/my_first_form.php">

					<div>
						<label for="walk">Will you walk 10,000 steps today? </label>
						<select id="walk" name="walk">
							<option value="1">Yes</option>
							<option value="0" selected>No</option>
						</select>
					</div>

					<div>
						<label for="meals">Which meals will you consume today?</label>
						<select id="meals" name="meals[]" multiple>
							<option value="0">Breakfast</option>
							<option value="1">Second Breakfast</option>
							<option value="2">Lunch</option>
							<option value="3">Dinner</option>
							<option value="4">Second Dinner</option>
							<option value="5">Midnight Snack</option>
						</select> 
					</div>

					<button type="select">Select</button>
				</form>

	</body>
</html>