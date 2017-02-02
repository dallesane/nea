<?php

function renderForm($bts_site_name, $error){

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

		<strong>bts_site_name: *</strong> <input type="text" name="bts_site_name" value="<?php echo $bts_site_name; ?>" /><br/>
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

		$bts_site_name = mysql_real_escape_string(htmlspecialchars($_POST['bts_site_name']));

		// check to make sure both fields are entered

	if ($bts_site_name == '')

		{
		// generate error message

			$error = 'ERROR: Please fill in all required fields!';

		// if either field is blank, display the form again

			renderForm($bts_site_name, $error);
		
		}
		else{
			// save the data to the database

			mysql_query("INSERT bts_name SET bts_site_name='$bts_site_name'")
			or die(mysql_error());

			// once saved, redirect back to the view page

			header("Location: bts_site_form.php");

			}
	}else
			// if the form hasn't been submitted, display the form
			{
			renderForm('');
			}
?>



        