<html>
<head>
<title>MPC - Create a New Customer</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "stylesheet.css" />
<style>
h6 {
   width: 90%; 
color: #4d4d4d;
   text-align: left; 
   border-bottom: 1px solid #018DB1; 
   line-height: 0.1em;
   margin: 10px 0 10px; 
}
</style>

</head>
<body>
<?php
include ("AIPHeader.php");
include ("conn.php");






$sql="select abbr from States";

echo "<div class='content'>";
echo '<h6><span>Create a New Customer</span></h6>';

echo '<form name="createnewcustomer" id="createnewcustomer"
        action="createNewCustomer.php" method="post">';
echo '<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo "<label for='customerName'>Customer Name &nbsp;</label>";
        echo "<input type='text' name='customerName' id='customerName' pattern='[A-Za-z0-9]+[ A-Za-z0-9-.-]*' title='Only letters, numbers, spaces, and .' required><br><br>";


	echo '<h6><span>Billing Address</span></h6>';
	echo '<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo "<label for='customerBillingStreet'>Street &nbsp;&nbsp;</label>";
        echo "<input type='text' name='customerBillingStreet' id='customerBillingStreet' pattern='[A-Za-z0-9.]+[ .A-Za-z0-9]*' title='Only letters, numbers, spaces, and .' required><br>";
	echo '<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
       echo "<label for='customerBillingCity'>City &nbsp;&nbsp;</label>";
        echo "<input type='text' name='customerBillingCity' id='customerBillingCity' pattern='[A-Za-z]+[ A-Za-z.\-]*' title='Only letters, spaces, and . -' required><br><br>";
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='customerBillingState'>State &nbsp;&nbsp;</label>";
        echo '<select name="customerBillingState" required="required">';
echo "<option value='' selected disabled>Select a state</option>";

        foreach ($conn->query($sql) as $row)
        {
                echo '<option value="';
                echo $row["abbr"];
                echo '">';
		echo $row["abbr"];
                echo '</option>';
        }
        echo '</select><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

       echo "<label for='customerBillingZip'>Zip Code &nbsp;&nbsp;</label>";
        echo "<input type='text' name='customerBillingZip' id='customerBillingZip' pattern='[0-9]{5,5}' title='Only numbers, 5 long' required><br>";

echo '<br>';
echo '<h6><span>Shipping Address</span></h6>';
echo '<br>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='customerShippingStreet'>Street &nbsp;&nbsp;</label>";
        echo "<input type='text' name='customerShippingStreet' id='customerShippingStreet' pattern='[A-Za-z0-9.]+[ .A-Za-z0-9]*' title='Only letters, numbers, spaces, and .' required><br><br>";
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
       echo "<label for='customerShippingCity'>City &nbsp;&nbsp;</label>";
        echo "<input type='text' name='customerShippingCity' id='customerShippingCity' pattern='[A-Za-z]+[ A-Za-z.\-]*' title='Only letters, spaces, and . -' required><br><br>";
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo "<label for='customerShippingState'>State &nbsp;&nbsp;</label>";
        echo '<select name="customerShippingState" required="required">';
echo "<option value='' selected disabled>Select a state</option>";

        foreach ($conn->query($sql) as $row)
        {
                echo '<option value="';
                echo $row["abbr"];
                echo '">';
		echo $row["abbr"];
                echo '</option>';
        }
        echo '</select><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

echo "<label for='customerShippingZip'>Zip Code &nbsp;&nbsp;</label>";
        echo "<input type='text' name='customerShippingZip' id='customerShippingZip' pattern='[0-9]{5,5}' title='Only 5 numbers' required><br>";


echo '<br>';
echo '<h6><span>Contact Information</span></h6>';
echo '<br>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='contactFirstName'>First Name &nbsp;&nbsp;</label>";
        echo "<input type='text' name='contactFirstName' id='contactFirstName' pattern='[A-Za-z]+[ A-Za-z.\-]*' title='Only letters, spaces, and . -' required><br><br>";
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='contactLastName'>Last Name &nbsp;&nbsp;</label>";
        echo "<input type='text' name='contactLastName' id='contactLastName'pattern='[A-Za-z]+[ A-Za-z.\-]*' title='Only letters, spaces, and . -' required><br><br>";
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='contactPhoneNumber'>Phone Number &nbsp;&nbsp;</label>";
        echo "<input type='text' name='contactPhoneNumber' id='contactPhoneNumber' pattern='[0-9]{10,10}' title='10 digit number please' required><br><br>";
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='contactEmail'>Email Address </label>";
echo '&nbsp;&nbsp;';
        echo "<input type='text' name='contactEmail' id='contactEmail' pattern='([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})'  title='Valid email please' required ><br>";
	echo '<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" style="width: 200px;" align="middle" value="Cancel">';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<input type="submit" style="width: 200px;" align="middle" value="Create New Customer">';

        echo '<input type="hidden" name="which" value="createnewcustomer">';
echo "</form>";
echo '</table>';
echo "</div>";
/************************************************************/
if ($_SERVER['REQUEST_METHOD']=='POST')
{
        if ($_POST['which'] == 'createnewcustomer')
        {
                $customername=$_POST['customerName'];
                $billingstreet=$_POST['customerBillingStreet'];
		$billingcity=$_POST['customerBillingCity'];
		$billingstate=$_POST['customerBillingState'];
		$billingzip=$_POST['customerBillingZip'];
		$shippingstreet=$_POST['customerShippingStreet'];
		$shippingcity=$_POST['customerShippingStreet'];
		$shippingstate=$_POST['customerShippingState'];
		$shippingzip=$_POST['customerShippingZip'];
		$contactfirstname=$_POST['contactFirstName'];
		$contactlastname=$_POST['contactLastName'];
		$contactphonenumber=$_POST['contactPhoneNumber'];
		$contactemail=$_POST['contactEmail'];
                $insertSQL="INSERT INTO Customers (customername,billingstreet,billingcity,billingstate,billingzip,shippingstreet,shippingcity,shippingstate,shippingzip,contactfirstname,contactlastname,contactphonenumber,contactemail) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";

                try
                {
                        $stmt=$conn->prepare($insertSQL);
                        $ok=$stmt->execute(array($customername,$billingstreet,$billingcity,$billingstate,$billingzip,$shippingstreet,$shippingcity,$shippingstate,$shippingzip,$contactfirstname,$contactlastname,$contactphonenumber,$contactemail));

                        echo "<script type='text/javascript'>alert('Customer ".$customername." added successfully!')</script>";
                }

                catch (PDOException $e)
                {
                        echo "Oops, customer could not be added.";
                        echo "error: ".$e->getMessage();
                }
        }
}










?>


</body>
</html>







