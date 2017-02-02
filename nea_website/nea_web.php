<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <title>Safeway NEA bill details</title>
	</head>
  	<body>
		<style>

            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
           
		</style>
		</div>
		
		<div class="container">
		<header>
		   <h1><center>SafeWay NEA details</h1>
		</header>
		<br>
		<nav>
		  <ul>
		    <li><a href="bts_site_form.php">Add new BTS site</a></li>
		    <br>
		    <li><a href="identification_number_form.php">Add computer id of BTS site</a></li>
		    <br>
		    <li><a href="monthly_charges_form.php">Enter paid bills</a></li>
		  </ul>
		</nav>
		</div>
		<br>
			<table>
			  <tr>
			    <th>id</th>
			    <th>District</th>
			    <th>Pending bills</th>
			  </tr> 

				<?php
		    	    $query = "SELECT * FROM monthly_charges";
			        $result = mysql_query($query);

			        
			    ?>      
			</table>
	</body>
</html> 				  