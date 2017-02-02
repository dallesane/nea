<?php

function renderForm($district, $error){

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

	<head>
		<title>New Record</title>

	</head>
	<body>

<?php
// if there are any errors, display them

	if ($error != '')
		{
			echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
		}
?>

	<form action="" method="post">
	<div>

		<strong>district: *</strong> <input type="text" name="district" value="<?php echo $district; ?>" /><br/>
		<p>* required</p>
		<input type="submit" name="submit" value="Submit">

	</div>
	</form>

	</body>
</html>

<?php

}

	// connect to the database
	include('../connect_nea_db.php');
	// check if the form has been submitted. If it has, start to process the form and save it to the database
	if (isset($_POST['submit'])){

		// get form data, making sure it is valid

		$district = mysql_real_escape_string(htmlspecialchars($_POST['district']));

		// check to make sure both fields are entered

	if ($district == '')

		{
		// generate error message

			$error = 'ERROR: Please fill in all required fields!';

		// if either field is blank, display the form again

			renderForm($district, $error);
		
		}
		else{
			// save the data to the database

			mysql_query("INSERT district SET district_name='$district'")
			or die(mysql_error());

			// once saved, redirect back to the view page

			header("Location: district_form.php");

			}
	}else
			// if the form hasn't been submitted, display the form
			{
			renderForm('');
			}
?>



        