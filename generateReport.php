<html>
<head>
<title>MPC - Generate Report</title>
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
session_start();
include ("AIPHeader.php");
include ("conn.php");


$sql="select description from ItemTypes";
$sqll="select allOrders.order_id, Customers.customername from allOrders, Customers where allOrders.cust_id=Customers.id";

echo "<div class='content'>";
echo '<h6><span>Generate Report</span></h6>';

echo '<form name="generateReport" id="generateReport"
        action="generateReport.php" method="post">';
echo '<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo "<input type='radio' name='reportType' id='reportType' value='detail' checked='checked'>";
	echo "<label for='reportType'>&nbsp;Detail &nbsp;&nbsp;&nbsp;&nbsp;</label>";

        echo "<input type='radio' name='reportType' id='reportType' value='summary'>";
	echo "<label for='reportType'>&nbsp;Summary &nbsp;</label><br><br>";



echo '<h6><span>Select a Customer Order</span></h6>';
echo '<br>';
 echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='customerOrderSelection'>Select an Order &nbsp;&nbsp;</label>";
        echo '<select name="customerOrderSelection" required="required">';
echo "<option value='' selected disabled>Select an order</option>";
        foreach ($conn->query($sqll) as $row)
        {
                echo '<option value="';
                echo $row["order_id"];
                echo '">';
                echo "#".$row["order_id"]." ".$row["customername"];
                echo '</option>';
        }
echo '</select>&nbsp;&nbsp;';
echo '<br><br>';

echo '<h6><span>Select a Sort Order</span></h6><br>';
 echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='sortOrderSelection'>Sort by &nbsp;&nbsp;</label>";

        echo '<select name="sortOrderSelection" required="required">';
		echo "<option value='' selected disabled>Select a sort order</option>";
		 echo '<option value="price">Item price</option>';
		echo '<option value="quantity">Item quantity</option>';
		echo '<option value="name">Item name</option>';
		echo '<option value="description">Item type</option>';
echo '</select>&nbsp;&nbsp;';
echo '<br>';

        echo '<input type="hidden" name="which" value="generateReport">';

echo '<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" style="width: 200px;" align="middle" value="Cancel">';
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<input type="submit" style="width: 200px;" align="middle" value="Produce Report">';



$testvar="test";

echo "</form>";
echo '</table>';
echo "</div>";
/************************************************************/
if ($_SERVER['REQUEST_METHOD']=='POST')
{
        if ($_POST['which'] == 'generateReport')
        {
		$customerOrderSelection=$_POST['customerOrderSelection'];
		$reportType=$_POST['reportType'];
		if ($_POST['sortOrderSelection']=="description")
		{
			$sortOrderSelection="type";
		}
		else {
			$sortOrderSelection=$_POST['sortOrderSelection'];
		}
		//CUSTOMER NAME
		$customernameSQL="select Customers.customername from Customers, allOrders where Customers.id=allOrders.cust_id and order_id=?";
			$stmt=$conn->prepare($customernameSQL);
                	$stmt->execute(array($customerOrderSelection));
                	$nameresult=$stmt->fetchAll();
			$_SESSION['customername']=$nameresult[0][0];

		//BILLING ADDRESS
		$customerbillingstreetSQL="select Customers.billingstreet from Customers, allOrders where Customers.id=allOrders.cust_id and order_id=?";
			$stmt2=$conn->prepare($customerbillingstreetSQL);
			$stmt2->execute(array($customerOrderSelection));
			$billingstreetresult=$stmt2->fetchAll();
			$_SESSION['customerbillingstreet']=$billingstreetresult[0][0];
		$customerbillingcitySQL="select Customers.billingcity from Customers, allOrders where Customers.id=allOrders.cust_id and order_id=?";
			$stmt3=$conn->prepare($customerbillingcitySQL);
                        $stmt3->execute(array($customerOrderSelection));
                        $billingcityresult=$stmt3->fetchAll();
                        $_SESSION['customerbillingcity']=$billingcityresult[0][0];
		$customerbillingstateSQL="select Customers.billingstate from Customers, allOrders where Customers.id=allOrders.cust_id and order_id=?";
                        $stmt4=$conn->prepare($customerbillingstateSQL);
                        $stmt4->execute(array($customerOrderSelection));
                        $billingstateresult=$stmt4->fetchAll();
                        $_SESSION['customerbillingstate']=$billingstateresult[0][0];
		$customerbillingzipSQL="select Customers.billingzip from Customers, allOrders where Customers.id=allOrders.cust_id and order_id=?";
                        $stmt5=$conn->prepare($customerbillingzipSQL);
                        $stmt5->execute(array($customerOrderSelection));
                        $billingzipresult=$stmt5->fetchAll();
                        $_SESSION['customerbillingzip']=$billingzipresult[0][0];

		//SHIPPING ADDRESS
		$customershippingstreetSQL="select Customers.shippingstreet from Customers, allOrders where Customers.id=allOrders.cust_id and order_id=?";
                        $stmt6=$conn->prepare($customershippingstreetSQL);
                        $stmt6->execute(array($customerOrderSelection));
                        $shippingstreetresult=$stmt6->fetchAll();
                        $_SESSION['customershippingstreet']=$shippingstreetresult[0][0];
                $customershippingcitySQL="select Customers.shippingcity from Customers, allOrders where Customers.id=allOrders.cust_id and order_id=?";
                        $stmt7=$conn->prepare($customershippingcitySQL);
                        $stmt7->execute(array($customerOrderSelection));
                        $shippingcityresult=$stmt7->fetchAll();
                        $_SESSION['customershippingcity']=$shippingcityresult[0][0];
                $customershippingstateSQL="select Customers.shippingstate from Customers, allOrders where Customers.id=allOrders.cust_id and order_id=?";
                        $stmt8=$conn->prepare($customershippingstateSQL);
                        $stmt8->execute(array($customerOrderSelection));
                        $shippingstateresult=$stmt8->fetchAll();
                        $_SESSION['customershippingstate']=$shippingstateresult[0][0];
                $customershippingzipSQL="select Customers.shippingzip from Customers, allOrders where Customers.id=allOrders.cust_id and order_id=?";
                        $stmt9=$conn->prepare($customershippingzipSQL);
                        $stmt9->execute(array($customerOrderSelection));
                        $shippingzipresult=$stmt9->fetchAll();
                        $_SESSION['customershippingzip']=$shippingzipresult[0][0];

		//CONTACT INFO
		$contactfirstnameSQL="select Customers.contactfirstname from Customers, allOrders where Customers.id=allOrders.cust_id and order_id=?";
                        $stmt10=$conn->prepare($contactfirstnameSQL);
                        $stmt10->execute(array($customerOrderSelection));
                        $contactfirstnameresult=$stmt10->fetchAll();
                        $_SESSION['contactfirstname']=$contactfirstnameresult[0][0];
                $contactlastnameSQL="select Customers.contactlastname from Customers, allOrders where Customers.id=allOrders.cust_id and order_id=?";
                        $stmt11=$conn->prepare($contactlastnameSQL);
                        $stmt11->execute(array($customerOrderSelection));
                        $contactlastnameresult=$stmt11->fetchAll();
                        $_SESSION['contactlastname']=$contactlastnameresult[0][0];
                $contactemailSQL="select Customers.contactemail from Customers, allOrders where Customers.id=allOrders.cust_id and order_id=?";
                        $stmt12=$conn->prepare($contactemailSQL);
                        $stmt12->execute(array($customerOrderSelection));
                        $contactemailresult=$stmt12->fetchAll();
                        $_SESSION['contactemail']=$contactemailresult[0][0];
                $contactphonenumberSQL="select Customers.contactphonenumber from Customers, allOrders where Customers.id=allOrders.cust_id and order_id=?";
                        $stmt13=$conn->prepare($contactphonenumberSQL);
                        $stmt13->execute(array($customerOrderSelection));
                        $contactphonenumberresult=$stmt13->fetchAll();
                        $_SESSION['contactphonenumber']=$contactphonenumberresult[0][0];

		$_SESSION['customerOrderSelection']=$customerOrderSelection;
		$_SESSION['reportType']=$reportType;
		$_SESSION['sortOrderSelection']=$sortOrderSelection;



		if ($reportType=="summary") {
		echo '<script type="text/javascript">
           window.location = "summaryReport.php"
      </script>';
		}

		if ($reportType=="detail") {
		echo '<script type="text/javascript">
           window.location = "detailReport.php"
      </script>';
		}
       }
}









?>


















</body>
</html>
