<?php

function renderForm($district, $bts_site_name, $consumer_id, $computer_id, $error){

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
		<strong>district: *</strong><b/>
			<select name="district">
		    <option selected="selected" value="">Select district</option>
		    <?php 
		   
		        $query = "SELECT * FROM district";
		        $result = mysql_query($query);
			    if ($result) {
			        while($row = mysql_fetch_array($result)) {
			        
				      	if ($district == $row['id']){

				      		echo '<option selected="selected" value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
				      		
				      	}else{
				      		echo '<option value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
				      	}
			        }
			    }
			    else {
			      echo mysql_error();
			    }
		    ?>
		    </select>
	    	<br>
	    	<br>

	<form action="" method="post">
	<div>
		<strong>bts_site_name: *</strong><b/>
			<select name="bts_site_name">
		    <option selected="selected" value="">Select bts name</option>
		    <?php 
		   
		        $query = "SELECT * FROM bts_name";
		        $result = mysql_query($query);
			    if ($result) {
			        while($row = mysql_fetch_array($result)) {
			        
				      	if ($bts_site_name == $row['id']){

				      		echo '<option selected="selected" value="'.$row['id'].'">"'.$row['bts_site_name'].'"</option>';
				      		
				      	}else{
				      		echo '<option value="'.$row['id'].'">"'.$row['bts_site_name'].'"</option>';
				      	}
			        }
			    }
			    else {
			      echo mysql_error();
			    }
		    ?>
		    </select>
	    	<br>
	    	<br>    	

		<strong>consumer_id: *</strong> <input type="text" name="consumer_id" value="<?php echo $sonsumer_id; ?>" /><br/>
		<strong>computer_id: *</strong> <input type="text" name="computer_id" value="<?php echo $computer_id; ?>" /><br/>
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
		$bts_site_name = mysql_real_escape_string(htmlspecialchars($_POST['bts_site_name']));
		$consumer_id = mysql_real_escape_string(htmlspecialchars($_POST['consumer_id']));
		$computer_id = mysql_real_escape_string(htmlspecialchars($_POST['computer_id']));

		// check to make sure both fields are entered

	if ($district == '' || $bts_site_name == '' || $consumer_id == '' || $computer_id == '')

		{
		// generate error message

			$error = 'ERROR: Please fill in all required fields!';

		// if either field is blank, display the form again

			renderForm($bts_site_name, $consumer_id, $computer_id, $error);
		
		}
		else{
			// save the data to the database

			mysql_query("INSERT identification SET district='$district', bts_name='$bts_site_name', consumer_id='$consumer_id', computer_id='$computer_id'")
			or die(mysql_error());

			// once saved, redirect back to the view page

			header("Location: identification_number_form.php");

			}
	}else
			// if the form hasn't been submitted, display the form
			{
			renderForm('','','','');
			}
?>



        