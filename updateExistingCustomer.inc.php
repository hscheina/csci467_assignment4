<?php

	/********** CONNECT TO DATABASE **********/
		include_once 'conn.php';
		
		//Get all Customers
		$all_customers_query = "SELECT id, customername FROM Customers;";
		$all_customers_query_result = mysqli_query($harisConn, $all_customers_query);

		//Get all states for billing
		$all_states_billing_query = "SELECT * FROM States;";
		$all_states_billing_query_result = mysqli_query($harisConn, $all_states_billing_query);

		//Get all states for billing
		$all_states_shipping_query = "SELECT * FROM States;";
		$all_states_shipping_query_result = mysqli_query($harisConn, $all_states_shipping_query);

		/********** USER INPUT **********/

			//Selected customer
			$selected_customer = "";

			//Selected billing state
			$selected_billing_state = "";

			//Selected shipping state
			$selected_shipping_state = "";

			//Edited customer name
			$edited_customer_name = "";

			/* BILLING ADDRESS */

				//Edited billing street
				$edited_billing_street = "";

				//Edited billing city
				$edited_billing_city = "";

				//Edited billing state
				$edited_billing_state = "";

				//Edited billing zip code
				$edited_billing_zip_code = "";

			/* SHIPPING ADDRESS */

				//Edited shipping street
				$edited_shipping_street = "";

				//Edited shipping city
				$edited_shipping_city = "";

				//Edited shipping state
				$edited_shipping_state = "";

				//Edited shipping zip code
				$edited_shipping_zip_code = "";

			/* CONTACT INFORMATION */

				//Edited first name
				$edited_first_name = "";

				//Edited last name
				$edited_last_name = "";

				//Edited phone number
				$edited_phone_number = "";

				//Edited email
				$edited_email = "";

		/********** ERROR CHECKING **********/

			//Selected customer
			$selected_customer_message = "";

			//Customer name
			$customer_name_message = "";

			/* BILLING ADDRESS */

				//Billing street
				$billing_street_message = "";

				//Billing city
				$billing_city_message = "";

				//Billing state
				$billing_state_message = "";

				//Billing zip code
				$billing_zip_code_message = "";

			/* SHIPPING ADDRESS */

				//Shipping street
				$shipping_street_message = "";

				//Shipping city
				$shipping_city_message = "";

				//Shipping state
				$shipping_state_message = "";

				//Shipping zip code
				$shipping_zip_code_message = "";

			/* CONTACT INFORMATION */

				//First name
				$first_name_message = "";

				//Last name
				$last_name_message = "";

				//Phone number
				$phone_number_message = "";

				//Email
				$email_message = "";

			//Error counter
			$error_counter = 0;

			//Success message
			$success_message = "";

			//Error message
			$error_message = "";

		/********** CHECK IF USER PRESSED THE EDIT BUTTON **********/
		if (isset($_POST['edit_customer_button']))
		{

			//Check if user selected a customer
			if (!empty($_POST['selected_customer']))
			{
				//Fetch selected customer
				$selected_customer = $_POST['selected_customer'];
			}

			//Check if no user was selected
			if (empty($selected_customer))
			{
				$selected_customer_message = "No customer was selected!";
			}
			else
			{

				/* FETCH BILLING ADDRESS */

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

					//Fetch billing zip code from database
					$billing_zip_code_query = "SELECT billingzip FROM Customers WHERE id = '".$selected_customer."' LIMIT 1;";
					$billing_zip_code_query_result = mysqli_query($harisConn, $billing_zip_code_query);

					//Store billing zip code
					while($row_billing_zip_code = mysqli_fetch_array($billing_zip_code_query_result)):
							$edited_billing_zip_code = $row_billing_zip_code[0];
					endwhile;

				/* FETCH SHIPPING ADDRESS */

					//Fetch shipping street from database
					$shipping_street_query = "SELECT shippingstreet FROM Customers WHERE id = '".$selected_customer."' LIMIT 1;";
					$shipping_street_query_result = mysqli_query($harisConn, $shipping_street_query);

					//Store shipping street
					while($row_shipping_street = mysqli_fetch_array($shipping_street_query_result)):
							$edited_shipping_street = $row_shipping_street[0];
					endwhile;

					//Fetch shipping city from database
					$shipping_city_query = "SELECT shippingcity FROM Customers WHERE id = '".$selected_customer."' LIMIT 1;";
					$shipping_city_query_result = mysqli_query($harisConn, $shipping_city_query);

					//Store shipping city
					while($row_shipping_city = mysqli_fetch_array($shipping_city_query_result)):
							$edited_shipping_city = $row_shipping_city[0];
					endwhile;

					//Fetch shipping state from database
					$shipping_state_query = "SELECT shippingstate FROM Customers WHERE id = '".$selected_customer."' LIMIT 1;";
					$shipping_state_query_result = mysqli_query($harisConn, $shipping_state_query);

					//Store shipping state
					while($row_shipping_state = mysqli_fetch_array($shipping_state_query_result)):
							$edited_shipping_state = $row_shipping_state[0];
					endwhile;

					//Fetch shipping zip code from database
					$shipping_zip_code_query = "SELECT shippingzip FROM Customers WHERE id = '".$selected_customer."' LIMIT 1;";
					$shipping_zip_code_query_result = mysqli_query($harisConn, $shipping_zip_code_query);

					//Store shipping zip code
					while($row_shipping_zip_code = mysqli_fetch_array($shipping_zip_code_query_result)):
							$edited_shipping_zip_code = $row_shipping_zip_code[0];
					endwhile;

				/* FETCH CONTACT INFORMATION */

					//Fetch first name from database
					$first_name_query = "SELECT contactfirstname FROM Customers WHERE id = '".$selected_customer."' LIMIT 1;";
					$first_name_query_result = mysqli_query($harisConn, $first_name_query);

					//Store first name
					while($row_first_name = mysqli_fetch_array($first_name_query_result)):
							$edited_first_name = $row_first_name[0];
					endwhile;

					//Fetch last name from database
					$last_name_query = "SELECT contactlastname FROM Customers WHERE id = '".$selected_customer."' LIMIT 1;";
					$last_name_query_result = mysqli_query($harisConn, $last_name_query);

					//Store last name
					while($row_last_name = mysqli_fetch_array($last_name_query_result)):
							$edited_last_name = $row_last_name[0];
					endwhile;

					//Fetch phone number from database
					$phone_number_query = "SELECT contactphonenumber FROM Customers WHERE id = '".$selected_customer."' LIMIT 1;";
					$phone_number_query_result = mysqli_query($harisConn, $phone_number_query);

					//Store phone number
					while($row_phone_number = mysqli_fetch_array($phone_number_query_result)):
							$edited_phone_number = $row_phone_number[0];
					endwhile;

					//Fetch email from database
					$email_query = "SELECT contactemail FROM Customers WHERE id = '".$selected_customer."' LIMIT 1;";
					$email_query_result = mysqli_query($harisConn, $email_query);

					//Store email
					while($row_email = mysqli_fetch_array($email_query_result)):
							$edited_email = $row_email[0];
					endwhile;

			}//end else			

		}//endif edit button

		/********** CHECK IF USER PRESSED THE UPDATE BUTTON **********/
		if (isset($_POST['update_customer_button']))
 		{

 			/* FETCH UPDATED CUSTOMER NAME */

	 			//Check if user selected a customer
	 			if (!empty($_POST['selected_customer']))
	 			{
	 				//Fetch selected customer
					$selected_customer = $_POST['selected_customer'];
	 			}

	 			//Fetch customer name
				$edited_customer_name = $_POST['customer_name_edited'];

 			/* FETCH UPDATED BILLING ADDRESS */

				//Fetch updated billing street
	    		$edited_billing_street = $_POST['billing_street_edited'];

	    		//Fetch updated billing city
	    		$edited_billing_city = $_POST['billing_city_edited'];

	    		//Fetch updated billing state
	    		if (!empty($_POST['selected_billing_state']))
				{
					//Fetch updated billing state
	    			$edited_billing_state = $_POST['selected_billing_state'];	
				}

	    		//Fetch updated billing zip code
	    		$edited_billing_zip_code = $_POST['billing_zip_code_edited'];

	    	/* FETCH UPDATED SHIPPING ADDRESS */

	    		//Fetch updated shipping street
	    		$edited_shipping_street = $_POST['shipping_street_edited'];

	    		//Fetch updated shipping city
	    		$edited_shipping_city = $_POST['shipping_city_edited'];

	    		//Fetch updated shipping state
				if (!empty($_POST['selected_shipping_state']))
				{
					//Fetch updated shipping state
	    			$edited_shipping_state = $_POST['selected_shipping_state'];	
				}

	    		//Fetch updated shipping zip code
	    		$edited_shipping_zip_code = $_POST['shipping_zip_code_edited'];

	    	/* FETCH UPDATED CONTACT INFORMATION */

	    		//Fetch first name
	    		$edited_first_name = $_POST['first_name_edited'];

	    		//Fetch last name
	    		$edited_last_name = $_POST['last_name_edited'];

	    		//Fetch phone number
	    		$edited_phone_number = $_POST['phone_number_edited'];

	    		//Fetch email
	    		$edited_email = $_POST['email_edited'];


	    	/* CUSTOMER NAME ERROR CHECKING */

				//Check if no user was selected
				if (empty($selected_customer)) {
					$selected_customer_message = "No customer was selected!";
					$error_counter = $error_counter + 1;
				}

	 			//Check if customer name field is empty
				if (empty($edited_customer_name))
				{
					$customer_name_message = "Customer Name field is empty!";
					$error_counter = $error_counter + 1;
				}//endif

				//Check if customer name is valid
				if (!preg_match("/^[A-Za-z ]*$/", $edited_customer_name))
				{
					$customer_name_message = "Customer Name must contain letters only!";
					$error_counter = $error_counter + 1;
				}//endif

			/* BILLING ADDRESS ERROR CHECKING */

				//Check if billing street field is empty
				if (empty($edited_billing_street))
				{
					$billing_street_message = "Billing Street field is empty!";
					$error_counter = $error_counter + 1;
				}//endif

				//Check if billing street is valid
				if (!preg_match("/^[A-Za-z0-9 ]*$/", $edited_billing_street))
				{
					$billing_street_message = "Invalid format!";
					$error_counter = $error_counter + 1;
				}

				//Check if billing city field is empty
				if (empty($edited_billing_city))
				{
					$billing_city_message = "Billing City field is empty!";
					$error_counter = $error_counter + 1;
				}//endif

				//Check if billing state is empty
				if (empty($edited_billing_state))
				{
					$billing_state_message = "No state was selected!";
					$error_counter = $error_counter + 1;
				}

				//Check if billing zip code is empty
				if (empty($edited_billing_zip_code))
				{
					$billing_zip_code_message = "Zip Code field is empty!";
					$error_counter = $error_counter + 1;
				}

				//Check if billing zip code is valid
				if ((!preg_match("/^[0-9]*$/", $edited_billing_zip_code) || strlen($edited_billing_zip_code) > 6))
				{
					$billing_zip_code_message = "Zip code must be a 6-digit number!";
					$error_counter = $error_counter + 1;
				}

			/* SHIPPING ADDRESS ERROR CHECKING */

				//Check if shipping street field is empty
				if (empty($edited_shipping_street))
				{
					$shipping_street_message = "Shipping Street field is empty!";
					$error_counter = $error_counter + 1;
				}//endif

				//Check if shipping street is valid
				if (!preg_match("/^[A-Za-z0-9 ]*$/", $edited_shipping_street))
				{
					$shipping_street_message = "Street is invalid!";
					$error_counter = $error_counter + 1;
				}

				//Check if shipping city field is empty
				if (empty($edited_shipping_city))
				{
					$shipping_city_message = "Shipping City field is empty!";
					$error_counter = $error_counter + 1;
				}//endif

				//Check if shipping state is empty
				if (empty($edited_shipping_state))
				{
					$shipping_state_message = "No state was selected!";
					$error_counter = $error_counter + 1;
				}

				//Check if shipping zip code is empty
				if (empty($edited_shipping_zip_code))
				{
					$shipping_zip_code_message = "Zip Code field is empty!";
					$error_counter = $error_counter + 1;
				}

				//Check if shipping zip code is valid
				if (!preg_match("/^[0-9]*$/", $edited_shipping_zip_code))
				{
					$shipping_zip_code_message = "Zip code must be a 6-digit number!";
					$error_counter = $error_counter + 1;
				}

			/* CONTACT INFORMATION ERROR CHECKING */

				//Check if first name is empty
				if (empty($edited_first_name))
				{
					$first_name_message = "First Name field is empty!";
					$error_counter = $error_counter + 1;
				}

				//Check if first name contains only letters
				if (!preg_match("/^[A-Za-z]*$/", $edited_first_name))
				{
					$first_name_message = "First Name field must contain letters only!";
					$error_counter = $error_counter + 1;
				}

				//Check if last name is empty
				if (empty($edited_last_name))
				{
					$last_name_message = "Last Name field is empty!";
					$error_counter = $error_counter + 1;
				}

				//Check if last name contains only letters
				if (!preg_match("/^[A-Za-z]*$/", $edited_last_name))
				{
					$last_name_message = "Last Name field must contain letters only!";
					$error_counter = $error_counter + 1;
				}

				//Check if phone number is empty
				if (empty($edited_phone_number))
				{
					$phone_number_message = "Phone Number field is empty!";
					$error_counter = $error_counter + 1;
				}

				//Check if phone number is valid
				if (!preg_match("/^[0-9]*$/", $edited_phone_number))
				{
					$phone_number_message = "Phone Number must be a 10-digit number!";
					$error_counter = $error_counter + 1;
				}

				//Check if email is valid
				if (!filter_var($edited_email, FILTER_VALIDATE_EMAIL))
				{
					$email_message = "Email cannot be empty or invalid!";
					$error_counter = $error_counter + 1;
				}

				if ($error_counter != 0)
				{
					$error_message = "One or more fields are incorrect!";
				}

			
			/* UDPDATE CUSTOMER IF ALL FIELDS ARE VALID*/

			if ($error_counter == 0)
			{

				//Update customer
				$update_customer_query = "UPDATE Customers SET customername = '$edited_customer_name', billingstreet = '$edited_billing_street', billingcity = '$edited_billing_city', billingstate = '$edited_billing_state', billingzip = '$edited_billing_zip_code', shippingstreet = '$edited_shipping_street', shippingcity = '$edited_shipping_city', shippingstate = '$edited_shipping_state', shippingzip = '$edited_shipping_zip_code', contactfirstname = '$edited_first_name', contactlastname = '$edited_last_name', contactphonenumber = '$edited_phone_number', contactemail = '$edited_email' WHERE id = '".$selected_customer."';";

				//Insert updated customer into database
				mysqli_query($harisConn, $update_customer_query);

				//Display success message
				$success_message = "Customer was successfully updated!";
			}//endif

 		
 		}//endif update button
		
?>