<html>
<head>
<title>MPC - Create a New Item</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "stylesheet.css" />
</head>
<body>
<?php
include ("AIPHeader.php");
include ("conn.php");






$sql="select description from ItemTypes";

echo '<br>';
echo '<h6><span>Create a New Item</span></h6>';

echo '<form name="createnewitem" id="createnewitem"
        action="createNewItem.php" method="post">';
echo '<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo "<label for='name'>Item Name &nbsp;&nbsp;</label>";
        echo "<input type='text' name='name' id='name' pattern='[a-zA-Z()\-\/.0-9\[\]~_]' title='Only spaces, alphanumeric and ()- / . [ ] ~ _'><br><br>";
echo '<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<label for='description'>Type &nbsp;&nbsp;</label>";
        echo '<select name="description">';
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
        echo "<input type='text' name='price' id='price' pattern='[0-9]{0-63}(.[0-9]{0-2})?' title='Only the number, nothing other than digits and .'><br>";

        echo '<input type="hidden" name="which" value="createnewitem">';

echo '<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" style="width: 200px;" align="middle" value="Cancel">';
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

                        echo "Item ".$name." added successfully!";
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

