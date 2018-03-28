<html>
<head>
<title>MPC - Summary Report</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "stylesheet.css" />

<script>
function printPage() {
    window.print();
}
function goToGenerateReport() {
    window.location.href="generateReport.php";
}
</script>

</head>
<body>
<?php
//include ("conn.php");
include ("ReportHeader.php");
include ("conn.php");
ob_start();
include ("generateReport.php");
ob_end_clean();
$customerOrderSelection=$_SESSION['customerOrderSelection'];
$reportType=$_SESSION['reportType'];
$sortOrderSelection=$_SESSION['sortOrderSelection'];
$customername=$_SESSION['customername'];
$billingstreet=$_SESSION['customerbillingstreet'];
$billingcity=$_SESSION['customerbillingcity'];
$billingstate=$_SESSION['customerbillingstate'];
$billingzip=$_SESSION['customerbillingzip'];
$shippingstreet=$_SESSION['customershippingstreet'];
$shippingcity=$_SESSION['customershippingcity'];
$shippingstate=$_SESSION['customershippingstate'];
$shippingzip=$_SESSION['customershippingzip'];
echo "<br>";
echo "<table class='table1' style='width:1000px' align='center'>";
echo "<tr><th>Summary Report of Order #".$customerOrderSelection."</th></tr>";
echo "<tr><td>".$customername."</td></tr>";
echo "<tr><td>Sort by: Item ".$sortOrderSelection."</td></tr>";
echo "</table><br>";

echo "<table class='table1' style='width:1000px' align='center'>";
echo "<tr><th>Customer Billing Address</th><th>Customer Shipping Address</th><tr>";
echo "<tr><td>".$billingstreet."</td><td>".$shippingstreet."</td></tr>";
echo "<tr class='tr2'><td>".$billingcity.", ".$billingstate."</td><td>".$shippingcity.", ".$shippingstate."</td></tr>";
echo "<tr><td>".$billingzip."</td><td>".$shippingzip."</td></tr>";
echo "</table><br>";
if ($sortOrderSelection=="quantity")
	{
		$query = "select Items.name, Items.description, Items.price, purchases.qty from Items, purchases, allOrders where allOrders.order_id=purchases.order_id and purchases.item_id=Items.id and allOrders.order_id=$customerOrderSelection order by purchases.qty";
	}
else
{
if ($sortOrderSelection=="type")
	{
		$query = "select Items.name, Items.description, Items.price, purchases.qty from Items, purchases, allOrders where allOrders.order_id=purchases.order_id and purchases.item_id=Items.id and allOrders.order_id=$customerOrderSelection order by Items.description";
	}
else
	{
		$query = "select Items.name, Items.description, Items.price, purchases.qty from Items, purchases, allOrders where allOrders.order_id=purchases.order_id and purchases.item_id=Items.id and allOrders.order_id=$customerOrderSelection order by Items.$sortOrderSelection";
	}
}
$sumquery = "select sum(purchases.qty*Items.price) from Items, allOrders, purchases where allOrders.order_id=purchases.order_id and Items.id=purchases.item_id and allOrders.order_id=$customerOrderSelection";
echo "<table style='width:1000px' align='center'>";
echo "<tr><th>" . "Item Name" . "</th>". "<th>" ."Item Type" . "</th><th>" ."Item Price" . "</th><th>" ."Item Quantity". "</th></tr>";
foreach($conn->query($query) as $row)
{
echo "<tr><td>".$row['name']."</td><td>".$row['description']."</td><td>\$".$row['price']."</td><td>".$row['qty']."</td>";
}
echo "</table><br>";
echo "<table style='width:1000px' align='center'>";
	echo"<tr><td>Order Total</td><td>";
			//ORDER TOTAL
			$stmt666=$conn->prepare($sumquery);
                        $stmt666->execute(array($customerOrderSelection));
                        $sumqueryresult=$stmt666->fetchAll();
                        echo "\$".$sumqueryresult[0][0];
	echo "</td></td>";
echo "</table><br>";
echo '<div class="wrapper">';
echo '<input type="button" style="width: 200px;" value="Cancel" onclick="goToGenerateReport()" />';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<input type="button" style="width: 200px;" value="Print Report" onclick="printPage()" />';
echo "<br><br><br>";
echo "</div>";


//print customer name
//print customer contact information
//fill table with items in customer order
	//name of item
	//description of item
	//price of item
	//qty of item
//print order total
//close button
//print button
?>




</body>
</html>

