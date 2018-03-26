<html>
<head>
<title>Detail Report</title>
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
$reportType=$_SESSION['reportType'];
$sortOrderSelection=$_SESSION['sortOrderSelection'];
//echo $reportType;
//echo $sortOrderSelection;
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
$contactfirstname=$_SESSION['contactfirstname'];
$contactlastname=$_SESSION['contactlastname'];
$contactemail=$_SESSION['contactemail'];
$contactphonenumber=$_SESSION['contactphonenumber'];

echo "<br>";





echo "<table class='table1' style='width:1000px' align='center'>";
echo "<tr><th>Detail Report of Order: ".$customerOrderSelection."</th><th>Customer Contact Info</th></tr>";
echo "<tr><td>".$customername."</td><td>".$contactfirstname." ".$contactlastname."</td></tr>";
echo "<tr><td>Sort by: Item ".$sortOrderSelection."</td><td>".$contactphonenumber."</td></tr>";
echo "<tr><td> </td><td>".$contactemail."</td></tr>";
echo "</table><br>";

echo "<table class='table1' style='width:1000px' align='center'>";
echo "<tr><th>Customer Billing Address</th><th>Customer Shipping Address</th><tr>";
echo "<tr><td>".$billingstreet."</td><td>".$shippingstreet."</td></tr>";
echo "<tr class='tr2'><td>".$billingcity.", ".$billingstate."</td><td>".$shippingcity.", ".$shippingstate."</td></tr>";
echo "<tr><td>".$billingzip."</td><td>".$shippingzip."</td></tr>";
echo "</table><br>";

$query = "select Items.id, Items.name, Items.description, Items.price, purchases.qty from Items, purchases, allOrders where allOrders.order_id=purchases.order_id and purchases.item_id=Items.id and allOrders.order_id=$customerOrderSelection";
$sumquery = "select sum(purchases.qty*Items.price) from Items, allOrders, purchases where allOrders.order_id=purchases.order_id and Items.id=purchases.item_id and allOrders.order_id=$customerOrderSelection";

echo "<table style='width:1000px' align='center'>";
echo "<tr><th>"."Item ID" ."</th><th>". "Item Name" . "</th>". "<th>" ."Item Type" . "</th><th>" ."Item Price" . "</th><th>" ."Item Quantity". "</th><th>"."Item Total"."</th></tr>";
foreach($conn->query($query) as $row)
{
echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['description']."</td><td>\$".$row['price']."</td><td>".$row['qty']."</td><td>\$".$row['price']*$row['qty']."</td></tr>";
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
echo '<input type="button" value="Cancel" onclick="goToGenerateReport()" />';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<input type="button" value="Print Report" onclick="printPage()" />';
echo "<br><br><br>";
echo "</div>";







?>




</body>
</html>
