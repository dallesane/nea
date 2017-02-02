<?php

function renderForm($date, $district, $bts_site_name, $month, $monthly_bill, $other_charge, $penalty, $rebate, $excess_amount, $total_bill_amount, $advance, $total_payment_amount, $error){

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

		<strong>date: *</strong> <input type="text" name="date" value="<?php echo $date; ?>" /><br/>
		<strong>month: *</strong> <input type="text" name="month" value="<?php echo $month; ?>" /><br/>
		<strong>monthly_bill: *</strong> <input type="text" name="monthly_bill" value="<?php echo $monthly_bill; ?>" /><br/>
		<strong>other_charge: *</strong> <input type="text" name="other_charge" value="<?php echo $other_charge; ?>" /><br/>
		<strong>penalty: *</strong> <input type="text" name="penalty" value="<?php echo $penalty; ?>" /><br/>
		<strong>rebate: *</strong> <input type="text" name="rebate" value="<?php echo $rebate; ?>" /><br/>
		<strong>excess_amount: *</strong> <input type="text" name="excess_amount" value="<?php echo $excess_amount; ?>" /><br/>
		<strong>total_bill_amount: *</strong> <input type="text" name="total_bill_amount" value="<?php echo $total_bill_amount; ?>" /><br/>
		<strong>advance: *</strong> <input type="text" name="advance" value="<?php echo $advance; ?>" /><br/>
		<strong>total_payment_amount: *</strong> <input type="text" name="total_payment_amount" value="<?php echo $total_payment_amount; ?>" /><br/>
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

		$date = mysql_real_escape_string(htmlspecialchars($_POST['date']));
		$district = mysql_real_escape_string(htmlspecialchars($_POST['district']));
		$bts_site_name = mysql_real_escape_string(htmlspecialchars($_POST['bts_site_name']));
		$month = mysql_real_escape_string(htmlspecialchars($_POST['month']));
		$monthly_bill = mysql_real_escape_string(htmlspecialchars($_POST['monthly_bill']));
		$other_charge = mysql_real_escape_string(htmlspecialchars($_POST['other_charge']));
		$penalty = mysql_real_escape_string(htmlspecialchars($_POST['penalty']));
		$rebate = mysql_real_escape_string(htmlspecialchars($_POST['rebate']));
		$excess_amount = mysql_real_escape_string(htmlspecialchars($_POST['excess_amount']));
		$total_bill_amount = mysql_real_escape_string(htmlspecialchars($_POST['total_bill_amount']));
		$advance = mysql_real_escape_string(htmlspecialchars($_POST['advance']));
		$total_payment_amount = mysql_real_escape_string(htmlspecialchars($_POST['total_payment_amount']));

		// check to make sure both fields are entered

	if ($date == '' || $district == '' || $bts_site_name == '' || $month == '' || $monthly_bill == '' || $other_charge == '' || $penalty == '' || $rebate == '' || $excess_amount == '' || $total_bill_amount == '' || $advance == '' || $total_payment_amount == '')

		{
		// generate error message

			$error = 'ERROR: Please fill in all required fields!';

		// if either field is blank, display the form again

			renderForm($date, $district, $bts_site_name, $month, $monthly_bill, $other_charge, $penalty, $rebate, $excess_amount, $total_bill_amount, $advance, $total_payment_amount, $error);
		
		}
		else{
			// save the data to the database

			mysql_query("INSERT monthly_charges SET date='$date', district='$district', bts_name='$bts_site_name', month='$month', monthly_bill='$monthly_bill', other_charge='$other_charge', penalty='$penalty', rebate='$rebate', excess_amount='$excess_amount', total_bill_amount='$total_bill_amount', advance='$advance', total_payment_amount='$total_payment_amount'")
			or die(mysql_error());

			// once saved, redirect back to the view page

			header("Location: monthly_charges_form.php");

			}
	}else
			// if the form hasn't been submitted, display the form
			{
			renderForm('','','','','','','','','','','','');
			}
?>



        