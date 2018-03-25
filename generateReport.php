<html>
<head>
<title>Generate Report</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "stylesheet.css" />

</head>
<body>
<?php
session_start();
include ("AIPHeader.php");
include ("conn.php");


$sql="select description from ItemTypes";
$sqll="select customername from Customers";

echo '<br>';
echo '<h6><span>Generate Report</span></h6>';

echo '<form name="generateReport" id="generateReport"
        action="generateReport.php" method="post">';
echo '<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo "<input type='radio' name='reportType' id='reportType' value='summary'>";
	echo "<label for='reportType'>&nbsp;Summary &nbsp;&nbsp;&nbsp;&nbsp;</label>";

        echo "<input type='radio' name='reportType' id='reportType' value='detail'>";
	echo "<label for='reportType'>&nbsp;Detail &nbsp;</label><br>";



echo '<br>';
echo '<h6><span>Select a Customer Order</span></h6>';
echo '<br>';
 echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='customerOrderSelection'>Select an Order &nbsp;&nbsp;</label>";
        echo '<select name="customerOrderSelection">';
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

echo '<h6><span>Select a Sort Order</span></h6><br>';
 echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='sortOrderSelection'>Sort by &nbsp;&nbsp;</label>";
        echo '<select name="sortOrderSelection">';
                echo '<option value="-- Select --">-- Select --</option>';
		echo '<option value="id">Item ID</option>';
		echo '<option value="quantity">Item Quantity</option>';
		echo '<option value="qrice">Item Price</option>';
		echo '<option value="name">Item Name</option>';
		echo '<option value="description">Item Type</option>';
echo '</select>&nbsp;&nbsp;';
echo '<br>';
echo '<br>';

        echo '<input type="hidden" name="which" value="generateReport">';

echo '<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" style="width: 200px;" align="middle" value="Cancel">';
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<input type="submit" style="width: 200px;" align="middle" value="Produce Report">';



$testvar="test";

echo "</form>";
echo '</table>';
/************************************************************/
if ($_SERVER['REQUEST_METHOD']=='POST')
{
        if ($_POST['which'] == 'generateReport')
        {

		$reportType=$_POST['reportType'];
		$sortOrderSelection=$_POST['sortOrderSelection'];

		$customerOrderSelection=$_POST['customerOrderSelection'];

		$_SESSION['reportType']=$reportType;
		$_SESSION['sortOrderSelection']=$sortOrderSelection;


		//CUSTOMER NAME
	//	$getCustomerInfoSQL="select Customers.customername from ?orderstable?, Customers where Customers.customername=?orderstable?.customername";
			//create a session variable


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
