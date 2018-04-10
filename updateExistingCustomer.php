
<!DOCTYPE html>
<html>
<head>
    <title>MPC - Update Customer</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>
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
<?php
    include 'AIPHeader.php';
    include 'conn.php';
    include 'updateExistingCustomer.inc.php';
?>

<body>
<div class="content">    
    <!-- Customer drop down list -->
    <form method="POST" action="updateExistingCustomer.php" id="update_customer_form">













        
        <h6><span>Update a Customer</span></h6><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <label for="search-customer-label">Select a Customer&nbsp;&nbsp;</label>

        <select name="selected_customer" id="selected_customer">

            <option value="" selected disabled>Select a customer</option>

                <?php while($customer_row = mysqli_fetch_array($all_customers_query_result)):;?>

                <option value="<?php echo $customer_row[0];?>"><?php echo $customer_row[1];?></option>

                <script type="text/javascript">
                
                    document.getElementById('selected_customer').value = "<?php echo "$selected_customer"; ?>";
                    
                </script>

            <?php endwhile;?>

        </select>&nbsp;&nbsp;&nbsp;

        <button onclick="edit_customer_button_clicked()" type="submit" name="edit_customer_button" id="edit_customer_button">EDIT</button><br><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- CUSTOMER NAME -->

            <!-- Customer name label -->
            <label for="customer_name_label">Customer Name&nbsp;&nbsp;</label>

            <!-- Customer name textbox --> 
            <input type="text" name="customer_name_edited" id="customer_name_textbox" value="<?php echo "$edited_customer_name"; ?>" pattern='[A-Za-z0-9]+[ A-Za-z0-9-.-]*' title='Only letters, numbers, spaces, and .'><br><br>

        <h6><span>Billing Address</span></h6><br>

        <!-- BILLING ADDRESS -->

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
            <!-- Street label-->
            <label for="billing_street_label">Street&nbsp;&nbsp;</label>

            <!-- Street textbox -->
            <input type="text" name="billing_street_edited" id="billing_street_textbox" value="<?php echo "$edited_billing_street"; ?>" pattern='[A-Za-z0-9.]+[ .A-Za-z0-9]*' title='Only letters, numbers, spaces, and .'><br><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <!-- City label -->
            <label for="billing_city_label">City&nbsp;&nbsp;</label>

            <!-- City textbox -->
            <input type="text" name="billing_city_edited" id="billing_city_textbox" value="<?php echo "$edited_billing_city"; ?>" pattern='[A-Za-z]+[ A-Za-z.\-]*' title='Only letters, spaces, and . -'><br><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <!-- State label -->
            <label for="billing_state_label">State&nbsp;&nbsp;</label>

                <!-- State dropdown -->
                <select name="selected_billing_state" id="selected_billing_state">

                    <option value="" selected disabled>Select a state</option>

                    <?php while($billing_state_row = mysqli_fetch_array($all_states_billing_query_result)):;?>

                        <option value="<?php echo $billing_state_row[0];?>"><?php echo $billing_state_row[0];?></option>

                        <script type="text/javascript">
                            document.getElementById('selected_billing_state').value = "<?php echo "$edited_billing_state"; ?>";
                        </script>

                    <?php endwhile;?>
                
                </select><br><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  

        <!-- Zip Code label-->
        <label for="billing_zip_code_label">Zip Code&nbsp;&nbsp;</label>

        <!-- Zip Code textbox -->
        <input type="text" name="billing_zip_code_edited" id="billing_zip_code_textbox" value="<?php echo "$edited_billing_zip_code"; ?>" pattern='[0-9]{5,5}' title='Only numbers, 5 long'><br><br>

        <h6><span>Shipping Address</span></h6><br>

        <!-- SHIPPING ADDRESS -->

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
            <!-- Street label-->
            <label for="shipping_street_label">Street&nbsp;&nbsp;</label>

            <!-- Street textbox -->
            <input type="text" name="shipping_street_edited" id="shipping_street_textbox" value="<?php echo "$edited_shipping_street"; ?>" pattern='[A-Za-z0-9.]+[ .A-Za-z0-9]*' title='Only letters, numbers, spaces, and .'><br><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <!-- City label -->
            <label for="shipping_city_label">City&nbsp;&nbsp;</label>

            <!-- City textbox -->
            <input type="text" name="shipping_city_edited" id="shipping_city_textbox" value="<?php echo "$edited_shipping_city"; ?>" pattern='[A-Za-z]+[ A-Za-z.\-]*' title='Only letters, numbers, spaces, and . -'><br><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <!-- State label -->
            <label for="shipping_state_label">State&nbsp;&nbsp;</label>

                <!-- State dropdown -->
                <select name="selected_shipping_state" id="selected_shipping_state">

                    <option value="" selected disabled>Select a state</option>

                    <?php while($shipping_state_row = mysqli_fetch_array($all_states_shipping_query_result)):;?>

                        <option value="<?php echo $shipping_state_row[0];?>"><?php echo $shipping_state_row[0];?></option>

                        <script type="text/javascript">
                            document.getElementById('selected_shipping_state').value = "<?php echo "$edited_shipping_state"; ?>";
                        </script>

                    <?php endwhile;?>
                
                </select><br><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  

        <!-- Zip Code label-->
        <label for="shipping_zip_code_label">Zip Code&nbsp;&nbsp;</label>

        <!-- Zip Code textbox -->
        <input type="text" name="shipping_zip_code_edited" id="shipping_zip_code_textbox" value="<?php echo "$edited_shipping_zip_code"; ?>" pattern='[0-9]{5,5}' title='Only 5 numbers'><br><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <h6><span>Contact Information</span></h6><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- First name label-->
            <label for="first_name_label">First Name&nbsp;&nbsp;</label>

            <!-- First name textbox -->
            <input type="text" name="first_name_edited" id="first_name_textbox" value="<?php echo "$edited_first_name"; ?>" pattern='[A-Za-z]+[ A-Za-z.\-]*' title='Only letters, spaces, and . -'><br><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- Last name label-->
            <label for="last_name_label">Last Name&nbsp;&nbsp;</label>

            <!-- Last name textbox -->
            <input type="text" name="last_name_edited" id="last_name_textbox" value="<?php echo "$edited_last_name"; ?>" pattern='[A-Za-z]+[ A-Za-z.\-]*' title='Only letters, spaces, and . -'><br><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- Phone number label-->
            <label for="phone_number_label">Phone Number&nbsp;&nbsp;</label>

            <!-- Phone number textbox -->
            <input type="text" name="phone_number_edited" id="phone_number_textbox" value="<?php echo "$edited_phone_number"; ?>" pattern='[0-9]{10,10}' title='10 digit number please'><br><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- Email label-->
            <label for="email_label">Email Address&nbsp;&nbsp;</label>

            <!-- Email textbox -->
            <input type="text" name="email_edited" id="email_textbox" value="<?php echo "$edited_email"; ?>" pattern='([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})'  title='Valid email please'><br><br><br>

        <!-- CANCEL AND UPDATE BUTTON-->

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!-- Cancel customer button -->
        <button type="submit" name="cancel_customer_button" id="cancel_customer_button" onclick="reset_fields(); cancel_customer_button_clicked();" style="width: 200px;">Cancel</button>

        <script type="text/javascript">
            reset_fields()
            {
                document.getElementById("update_customer_form").reset();
            }
        </script>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- Update customer button -->
        <button onclick="update_customer_button_clicked()" type="submit" name="update_customer_button" id="update_customer_button" style="width: 200px;">Update</button>


<!-- SUCCESS MESSAGE -->
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label class="success"><?php echo $success_message;?></label><label class="error"><?php echo "$error_message";?></label>
    </form> 
<br>
    <script>

        /* Enable or disable error checking when edit button is clicked*/
        function edit_customer_button_clicked()
        {

            //Get selected customer
            var get_selected_customer = document.getElementById("selected_customer").value;

            //If no customer was selected, display error message
            if (get_selected_customer == "")
            {
                //Selected customer
                document.getElementById("selected_customer").required = true;
            }
            //If a user was selected, enable error checking for the rest of the fields
            else
            {
                //Selected customer
                document.getElementById("selected_customer").required = false;

                //Customer name
                document.getElementById("customer_name_textbox").required = false;

                //Billing Address
                document.getElementById("billing_street_textbox").required = false;
                document.getElementById("billing_city_textbox").required = false;
                document.getElementById("billing_zip_code_textbox").required = false;

                //Shipping Address
                document.getElementById("shipping_street_textbox").required = false;
                document.getElementById("shipping_city_textbox").required = false;
                document.getElementById("shipping_zip_code_textbox").required = false;

                //Contact Information
                document.getElementById("first_name_textbox").required = false;
                document.getElementById("last_name_textbox").required = false;
                document.getElementById("phone_number_textbox").required = false;
                document.getElementById("email_textbox").required = false;
            }//end else

        }//endif

        /* Disable error checking if cancel button is clicked */
        function cancel_customer_button_clicked()
        {

            //Selected customer
            document.getElementById("selected_customer").required = false;

            //Customer name
            document.getElementById("customer_name_textbox").required = false;

            //Billing Address
            document.getElementById("billing_street_textbox").required = false;
            document.getElementById("billing_city_textbox").required = false;
            document.getElementById("billing_zip_code_textbox").required = false;

            //Shipping Address
            document.getElementById("shipping_street_textbox").required = false;
            document.getElementById("shipping_city_textbox").required = false;
            document.getElementById("shipping_zip_code_textbox").required = false;

            //Contact Information
            document.getElementById("first_name_textbox").required = false;
            document.getElementById("last_name_textbox").required = false;
            document.getElementById("phone_number_textbox").required = false;
            document.getElementById("email_textbox").required = false;
        }

        //If user clicked the submit button, enable all fields
        function update_customer_button_clicked()
        {

            //Selected customer
            document.getElementById("selected_customer").required = true;

            //Customer name
            document.getElementById("customer_name_textbox").required = true;

            //Billing Address
            document.getElementById("billing_street_textbox").required = true;
            document.getElementById("billing_city_textbox").required = true;
            document.getElementById("billing_zip_code_textbox").required = true;

            //Shipping Address
            document.getElementById("shipping_street_textbox").required = true;
            document.getElementById("shipping_city_textbox").required = true;
            document.getElementById("shipping_zip_code_textbox").required = true;

            //Contact Information
            document.getElementById("first_name_textbox").required = true;
            document.getElementById("last_name_textbox").required = true;
            document.getElementById("phone_number_textbox").required = true;
            document.getElementById("email_textbox").required = true;
            
        }//end update_customer_button_clicked()
    
    </script>
</div>
</body>
</html>





















