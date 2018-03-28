<html>
<head>
<title>MPC - Create a New Item</title>
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






$sql="select description from ItemTypes";

echo "<div class='content'>";
echo '<h6><span>Create a New Item</span></h6>';

echo '<form name="createnewitem" id="createnewitem"
        action="createNewItem.php" method="post">';
echo '<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo "<label for='name'>Item Name &nbsp;&nbsp;</label>";
        echo "<input type='text' name='name' id='name' pattern=[a-zA-Z()\-\/.0-9\[\]~_]+ title='Only spaces, alphanumeric and ()- / . [ ] ~ _' required><br><br>";
echo '<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='description'>Type &nbsp;&nbsp;</label>";
        echo '<select name="description" required="required">';
echo "<option value='' selected disabled>Select item type</option>";

        foreach ($conn->query($sql) as $row)
        {
                echo '<option value="';
                echo $row["description"];
                echo '">';
		echo $row["description"];
                echo '</option>';
        }
        echo '</select>&nbsp;&nbsp;';
	echo '<br><br><br>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
       echo "<label for='price'>Price &nbsp;&nbsp;</label>";
        echo "<input type='text' name='price' id='price' pattern=[0-9]{1,63}(\.[0-9]{0,2})? title='Only the number, nothing other than digits and .' required><br>";

        echo '<input type="hidden" name="which" value="createnewitem">';

echo '<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" style="width: 200px;" align="middle" value="Cancel">';
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<input type="submit" style="width: 200px;" align="middle" value="Create New Item">';
echo "</form>";
echo '</table>';
/************************************************************/
if ($_SERVER['REQUEST_METHOD']=='POST')
{
        if ($_POST['which'] == 'createnewitem')
        {
                $name=$_POST['name'];
                $description=$_POST['description'];
		$price=$_POST['price'];
                $insertSQL="INSERT INTO Items (name,description,price) VALUES(?,?,?)";

                try
                {
                        $stmt=$conn->prepare($insertSQL);
                        $ok=$stmt->execute(array($name,$description,$price));

		echo "<script type='text/javascript'>alert('Item ".$name." added successfully!')</script>";
                }

                catch (PDOException $e)
                {
                        echo "Oops, item could not be added.";
                        echo "error: ".$e->getMessage();
                }
        }
}










?>


</body>
</html>

