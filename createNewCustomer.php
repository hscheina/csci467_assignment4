<html>
<head>
<title>Create a New Customer</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "stylesheet.css" />

</head>
<body>
<?php
include ("AIPHeader.php");
include ("conn.php");






$sql="select abbr from States";

echo '<br>';
echo '<h6><span>Create a New Customer</span></h6>';

echo '<form name="createnewcustomer" id="createnewcustomer"
        action="createNewCustomer.php" method="post">';
echo '<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo "<label for='customerName'>Customer Name &nbsp;</label>";
        echo "<input type='text' name='customerName' id='customerName'><br>";
echo '<br>';
	echo '<h6><span>Billing Address</span></h6>';
	echo '<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo "<label for='customerBillingStreet'>Street &nbsp;</label>";
        echo "<input type='text' name='customerBillingStreet' id='customerBillingStreet'><br>";
	echo '<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
       echo "<label for='customerBillingCity'>City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>";
        echo "<input type='text' name='customerBillingCity' id='customerBillingCity'><br><br>";
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='customerBillingState'>State &nbsp;&nbsp;</label>";
        echo '<select name="customerBillingState">';
        foreach ($conn->query($sql) as $row)
        {
                echo '<option value="';
                echo $row["abbr"];
                echo '">';
		echo $row["abbr"];
                echo '</option>';
        }
        echo '</select>&nbsp;&nbsp;';

       echo "<label for='customerBillingZip'> Zip Code &nbsp;&nbsp;</label>";
        echo "<input type='text' name='customerBillingZip' id='customerBillingZip'><br>";

echo '<br>';
echo '<h6><span>Shipping Address</span></h6>';
echo '<br>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='customerShippingStreet'>Street &nbsp;</label>";
        echo "<input type='text' name='customerShippingStreet' id='customerShippingStreet'><br><br>";
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
       echo "<label for='customerShippingCity'>City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>";
        echo "<input type='text' name='customerShippingCity' id='customerShippingCity'><br><br>";
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo "<label for='customerShippingState'>State &nbsp;&nbsp;</label>";
        echo '<select name="customerShippingState">';
        foreach ($conn->query($sql) as $row)
        {
                echo '<option value="';
                echo $row["abbr"];
                echo '">';
		echo $row["abbr"];
                echo '</option>';
        }
        echo '</select>&nbsp;&nbsp;';

echo "<label for='customerShippingZip'> Zip Code &nbsp;&nbsp;</label>";
        echo "<input type='text' name='customerShippingZip' id='customerShippingZip'><br>";


echo '<br>';
echo '<h6><span>Contact Information</span></h6>';
echo '<br>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='contactFirstName'>First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>";
        echo "<input type='text' name='contactFirstName' id='contactFirstName'><br><br>";
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='contactLastName'>Last Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>";
        echo "<input type='text' name='contactLastName' id='contactLastName'><br><br>";
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='contactPhoneNumber'>Phone Number  &nbsp;</label>";
        echo "<input type='text' name='contactPhoneNumber' id='contactPhoneNumber'><br><br>";
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='contactEmail'>Email Address </label>";
echo '&nbsp;&nbsp;';
        echo "<input type='text' name='contactEmail' id='contactEmail'><br><br>";
	echo '<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" style="width: 200px;" align="middle" value="Cancel">';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<input type="submit" style="width: 200px;" align="middle" value="Create New Customer">';

        echo '<input type="hidden" name="which" value="createnewcustomer">';
echo "</form>";
echo '</table>';
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

                        echo "Customer ".$customername." added successfully!";
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







