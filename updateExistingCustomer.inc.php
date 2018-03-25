<?php

		//Connect to database
		include_once 'conn.php';
		
		//Get all Customers
		$all_customers_query = "SELECT id, customername FROM Customers;";
		$all_customers_query_result = mysqli_query($harisConn, $all_Customers_query);

		//Get all states
		$all_states_query = "SELECT * FROM States;";
		$all_states_query_result = mysqli_query($harisConn, $all_states_query);

		//Customer editing variables

			//Selected customer
			$selected_customer = "";

			//Selected state
			$selected_state = "";

			//Customer name
			$customer_name = "";

			//Billing street
			$billing_street = "";

			//Billing city
			$billing_city = "";

			//Edited customer name
			$edited_customer_name = "";

			//Edited billing street
			$edited_billing_street = "";

			//Edited billing city
			$edited_billing_city = "";

			//Edited billing state
			$edited_billing_state = "";

		//Customer error checking variables

			//Item number variables
			$customer_name_message = "";

			//Item number variables
			$billing_street_message = "";

			//Item number variables
			$billing_city_message = "";

			//Error counter
			$error_counter = 0;

			//Success message
			$customer_message = "";

		//If user pressed "Edit" button, display all item attributes
		if (isset($_POST['edit_customer_button']) && !empty($_POST['selected_customer']))
		{

			//Selected customer
			$selected_customer = $_POST['selected_customer'];

			//Fetch customer name from database
			$customer_name_query = "SELECT customername FROM Customers WHERE id = '".$selected_customer."' LIMIT 1;";
			$customer_name_query_result = mysqli_query($harisConn, $customer_name_query);

			//Store customer name
			while($row_customer_name = mysqli_fetch_array($customer_name_query_result)):
					$edited_customer_name = $row_customer_name[0];
			endwhile;

			//Fetch billing street from database
			$billing_street_query = "SELECT billingstreet FROM Customers WHERE id = '".$selected_customer."' LIMIT 1;";
			$billing_street_query_result = mysqli_query($harisConn, $billing_street_query);

			//Store billing street
			while($row_billing_street = mysqli_fetch_array($billing_street_query_result)):
					$edited_billing_street = $row_billing_street[0];
			endwhile;

			//Fetch billing city from database
			$billing_city_query = "SELECT billingcity FROM Customers WHERE id = '".$selected_customer."' LIMIT 1;";
			$billing_city_query_result = mysqli_query($harisConn, $billing_city_query);

			//Store billing city
			while($row_billing_city = mysqli_fetch_array($billing_city_query_result)):
					$edited_billing_city = $row_billing_city[0];
			endwhile;

			//Fetch billing state from database
			$billing_state_query = "SELECT billingstate FROM Customers WHERE id = '".$selected_customer."' LIMIT 1;";
			$billing_state_query_result = mysqli_query($harisConn, $billing_state_query);

			//Store billing state
			while($row_billing_state = mysqli_fetch_array($billing_state_query_result)):
					$edited_billing_state = $row_billing_state[0];
			endwhile;

		}//endif

		//Check if user pressed 'UPDATE ITEM' buton
		if ((isset($_POST['update_customer_button']) && !empty($_POST['selected_customer'])) && !empty($_POST['selected_state']))
 		{

 			//Selected customer
			$selected_customer = $_POST['selected_customer'];

			//Fetch customer name
			$edited_customer_name = $_POST['customer_name_edited'];

			//Fetch updated billing street
    		$edited_billing_street = $_POST['billing_street_edited'];

    		//Fetch updated billing city
    		$edited_billing_city = $_POST['billing_city_edited'];

    		//Fetch updated billing state
    		$edited_billing_state = $_POST['selected_state'];

 			//Check if customer name field is empty
			if (empty($edited_customer_name))
			{
				$customer_name_message = "Customer name field is empty!";
				$error_counter = $error_counter + 1;
			}//endif

			if (!preg_match("/^[A-Za-z]*$/", $edited_customer_name))
			{
				$customer_name_message = "Customer name must only contain letters!";
				$error_counter = $error_counter + 1;
			}//endif

			//Check if billing street field is empty
			if (empty($edited_billing_street))
			{
				$billing_street_message = "Billing street field is empty!";
				$error_counter = $error_counter + 1;
			}//endif

			if (!preg_match('/^[a-z0-9- ]+$/i', $edited_billing_street)) {
				$billing_street_message = "Invalid format!";
				$error_counter = $error_counter + 1;
			}

			//Check if billing city field is empty
			if (empty($edited_billing_city))
			{
				$billing_city_message = "Billing city field is empty!";
				$error_counter = $error_counter + 1;
			}//endif

			//If there are no errors, insert new item into the database
			if ($error_counter == 0)
			{

				//Update customer
				$update_customer_query = "UPDATE Customers SET customername = '$edited_customer_name', billingstreet = '$edited_billing_street', billing_city = '$edited_billing_city', billingstate = '$edited_billing_state' WHERE id = '".$selected_customer."';";
				mysqli_query($harisConn, $update_customer_query);

				//Set customer update success message
				$customer_message = "Customer was successfully updated!";
			}//endif
 		
 		}//endif
		
?>