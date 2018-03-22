
<html>
<head>
<title>Update a Customer</title>
<style>
h6 {
   width: 50%; 
   text-align: left; 
   border-bottom: 1px solid #000; 
   line-height: 0.1em;
   margin: 10px 0 10px; 
} 
h6 span {
	background:#fff;
	padding: 0 40px;
	length:10px;
}

</style>


</head>
<body>
<?php
include ("AIPHeader.php");
include ("conn.php");






$sql="select abbr from States";
$sqll="select customername from Customers";

echo '<br>';
echo '<h6><span>Update a Customer</span></h6><br>';
echo '<form name="updateacustomer" id="updateacustomer"
        action="updateExistingCustomer.php" method="post">';
 echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='customerSelection'>Select a Customer &nbsp;&nbsp;</label>";
        echo '<select name="customerSelection">';
        foreach ($conn->query($sqll) as $row)
        {
                echo '<option value="';
                echo $row["customername"];
                echo '">';
                echo $row["customername"];
                echo '</option>';
        }
echo '</select>&nbsp;&nbsp;';
echo '<br>';
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
        echo '<input type="submit" style="width: 200px;" align="middle" value="Update Customer">';

        echo '<input type="hidden" name="which" value="updateacustomer">';
echo "</form>";
echo '</table>';
/************************************************************/
if ($_SERVER['REQUEST_METHOD']=='POST')
{
        if ($_POST['which'] == 'updateacustomer')
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
                $insertSQL="UPDATE Customers SET billingstreet=$billingstreet,billingcity=$billingcity,billingstate=$billingstate,billingzip=$billingzip,shippingstreet=$shippingstreet,shippingcity=$shippingcity,shippingstate=$shippingstate,shippingzip=$shippingzip,contactfirstname=$contactfirstname,contactlastname=$contactlastname,contactphonenumber=$contactphonenumber,contactemail=$contactemail) where customername=$customername";

                try
                {
                        $stmt=$conn->prepare($insertSQL);
                        $ok=$stmt->execute(array($customername,$billingstreet,$billingcity,$billingstate,$billingzip,$shippingstreet,$shippingcity,$shippingstate,$shippingzip,$contactfirstname,$contactlastname,$contactphonenumber,$contactemail));

                        echo "Customer ".$customername." updated successfully!";
                }

                catch (PDOException $e)
                {
                        echo "Oops, customer could not be update.";
                        echo "error: ".$e->getMessage();
                }
        }
}










?>
logic:<br><br>
- a dropdown menu with Customer names and IDs<br>
- empty textfields exactly the same as create a customer page<br>
- when select a Customer from dropdown, textfields are filled in with attributes of selected Customer<br>
- user can edit the textfields and press enter<br>
- by pressing enter, an sql "UPDATE" command is triggered with all the values, including the new values<br>

</body>
</html>






















