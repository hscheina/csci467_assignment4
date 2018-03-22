<html>
<head>
<title>Create a New Order</title>
<style>
h6 {
   width: 50%; 
   text-align: left; 
   border-bottom: 1px solid #000; 
   line-height: 0.1em;
   margin: 10px 0 10px; 
} 

div.wrapper {
    text-align: center;
}
div.b {
	font-size: 9px;
	color: #E83F7C;
	text-indent: 100px;
}
h6 span {
	background:#fff;
	padding: 0 40px;
	length:10px;
}
table {
    border-collapse: collapse;
    width: 100%;
	table-layout: fixed;
}

th,td {
text-align: center;
align: center;
    padding: 8px;
}
tr:nth-child(even) {background-color: #f2f2f2;}
tr:hover {background-color: #fad1e0;}
th {
    background-color: #E83F7C;
    color: white;
font-size: 16px;
font-weight: normal;
}
</style>
</head>
<body>
<?php
include ("AIPHeader.php");
include ("conn.php");

$sqll="select customername from Customers";

echo '<br>';
echo '<h6><span>Create Customer Order</span></h6><br>';
echo '<form name="createcustomerorder" id="createcustomerorder"
        action="createCustomerOrder.php" method="post">';
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



$query = "SELECT * FROM Items";
echo '<h6><span>Select Items</span></h6><br>';
echo "<table style='width:1200px' align='center'>";
echo "<tr><th>" . "Select" . "</th>". "<th>" ."Name" . "</th><th>" ."Description" . "</th><th>" ."Price". "</th>" . "<th>" . "Quantity" . "</th></tr>";
foreach ($conn->query($query) as $row)
{
echo "<tr>" . "<td>" . "<input type='checkbox' name='itemSelect'>" . "</td>" . "<td>" . $row['name'] . "</td><td>" . $row['description'] . "</td><td>" . $row['price'] . "</td>" . "<td>" . "<input type='text' name='quantity' size='10'>" . "</td></tr>";
}
echo "</table>";
echo '<div class="wrapper">';
echo '<br><br><input type="reset" style="width: 200px;" align="center" value="Cancel">';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<input type="submit" style="width: 200px;" align="center" value="Place Order">';
echo '</div>';
echo "</form>";

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
                $insertSQL="";

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

create new table for each customer order:<br>
- dropdown menu with customer names<br>
- table with items and their attributes with check boxes and quantity fields next to each item<br>
- button "add"<br>
- user will check the box for each item them want to add to their order<br>
- user will input the quantity for each item they want to add to their order<br>
- when "add" is pressed
&nbsp;* ask "are you sure?"<br>
&nbsp;* create a new table with:<br>
&nbsp;&nbsp; - order id<br>
&nbsp;&nbsp; - customer id<br>
&nbsp;&nbsp; - customer name<br>
&nbsp;&nbsp; - customer billing and shipping addresses<br>
&nbsp;&nbsp; - customer contact<br>
&nbsp;&nbsp; - all customer attributes<br>
&nbsp;&nbsp; - each item id<br>
&nbsp;&nbsp; - each item name<br>
&nbsp;&nbsp; - each item quantity<br>
&nbsp;&nbsp; - each item price<br>
&nbsp;&nbsp; - order total<br>
<br><br>
order id is auto_increment on "add"<br>
https://stackoverflow.com/questions/37316943/how-to-automatically-increment-checkbox-id-in-a-table
</body>
</html>
