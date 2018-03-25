<html>
<head>
<title>Detail Report</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "stylesheet.css" />
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








echo "<table class='table1' style='width:1000px' align='center'>";
echo "<tr><th>Detail Report of Order: *ordernum</th><th>Customer Contact Info</th></tr>";
echo "<tr><td>*customername</td><td>*customerfirstname *customerlastname</td></tr>";
echo "<tr><td>*sortorder</td><td>*customerphonenumber</td></tr>";
echo "<tr><td>*barcode</td><td>*customeremail</td></tr>";
echo "</table><br>";

echo "<table class='table1' style='width:1000px' align='center'>";
echo "<tr><th>Customer Billing Address</th><th>Customer Shipping Address</th><tr>";
echo "<tr><td>2321 S Billing</td><td>2321 S Shipping</td></tr>";
echo "<tr class='tr2'><td>Springfield, *state</td><td>Springfield, *state</td></tr>";
echo "<tr><td>*billingzip</td><td>*shippingzip</td></tr>";
echo "</table><br>";

$query = "SELECT * FROM Items";
echo "<table style='width:1000px' align='center'>";
echo "<tr><th>"."Item ID" ."</th><th>". "Item Name" . "</th>". "<th>" ."Item Type" . "</th><th>" ."Item Price" . "</th><th>" ."Item Quantity". "</th><th>"."Item Total"."</th></tr>";
foreach($conn->query($query) as $row)
{
echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['description']."</td><td>".$row['price']."</td><td>qty</td><td>itemtotal</td></tr>";
}
echo "</table>";

echo '<div class="wrapper">';
echo '<br><br><input type="reset" style="width: 200px;" align="center" value="Cancel">';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<input type="submit" style="width: 200px;" align="center" value="Print Report">';
echo "<br><br><br>";
echo "</div>";





?>




</body>
</html>
