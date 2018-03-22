<html>
<head>
<title>AIP</title>
</head>
<style>
body { 
    background-image: url('geo.');
	background-repeat: no-repeat;
    background-position: 0px 192px; 
}
</style>


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-animate-left" style="display:none;z-index:5" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
  <a href="aipIndex.php" class="w3-bar-item w3-button">Home</a>
  <a href="createNewCustomer.php" class="w3-bar-item w3-button">Create a New Customer</a>
  <a href="createNewItem.php" class="w3-bar-item w3-button">Create a New Item</a>
  <a href="updateExistingCustomer.php" class="w3-bar-item w3-button">Update a Customer</a>
<a href="createCustomerOrder.php" class="w3-bar-item w3-button">Create Customer Order</a>




<div class="w3-dropdown-hover">
    <button class="w3-button">Generate Report ▼
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
      <a href="#" class="w3-bar-item w3-button">Summary Customer Order</a>
      <a href="#" class="w3-bar-item w3-button">Detail Customer Order</a>
    </div>
  </div> 

    </div>
</div>



<!-- Page Content -->
<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div>
  <button class="w3-button w3-white w3-xxlarge" onclick="w3_open()">&#9776;</button>


<img src="MPC-LOGO.png" alt="AIP Logo" style="width:350px;height:150px;">
<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</br>
</body>
</html>


