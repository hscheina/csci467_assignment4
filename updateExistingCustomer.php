<?php

    include 'AIPHeader.php';
    include 'conn.php';
    include 'updateExistingCustomer.inc.php';

?>

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
<body>
    
<div class="content">          
<h6><span>Update a Customer</span></h6><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;




<!-- Customer drop down list -->
    <form method="POST" action="updateExistingCustomer.php" id="update_customer_form">


        <!-- SUCCESS MESSAGE -->
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label class="success"><?php echo "$customer_message";?></label>	



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

        <button type="submit" name="edit_customer_button" id="edit_customer_button">EDIT</button><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <label class="error"><?php echo "$selected_customer_message";?></label><br><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- CUSTOMER NAME -->

            <!-- Customer name label -->
            <label for="customer_name_label">Customer Name&nbsp;&nbsp;</label>

            <!-- Customer name textbox -->
            <input type="text" name="customer_name_edited" id="customer_name_label" value="<?php echo "$edited_customer_name"; ?>"><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <!-- Customer name error message-->
            <label class="error"><?php echo "$customer_name_message";?></label><br><br>

        <h6><span>Billing Address</span></h6><br>

        <!-- BILLING ADDRESS -->

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
            <!-- Street label-->
            <label for="billing_street_label">Street&nbsp;&nbsp;</label>

            <!-- Street textbox -->
            <input type="text" name="billing_street_edited" id="billing_street_label" value="<?php echo "$edited_billing_street"; ?>"><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <!-- Street error message-->
            <label class="error"><?php echo "$billing_street_message";?></label><br><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <!-- City label -->
            <label for="billing_city_label">City&nbsp;&nbsp;</label>

            <!-- City textbox -->
            <input type="text" name="billing_city_edited" id="billing_city_label" value="<?php echo "$edited_billing_city"; ?>"><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <!-- City error message -->
            <label class="error"><?php echo "$billing_city_message";?></label><br><br>

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
                
                </select><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- State error message -->
        <label class="error"><?php echo "$billing_state_message";?></label><br><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  

        <!-- Zip Code label-->
        <label for="billing_zip_code_label">Zip Code&nbsp;&nbsp;</label>

        <!-- Zip Code textbox -->
        <input type="text" name="billing_zip_code_edited" id="billing_zip_code_label" value="<?php echo "$edited_billing_zip_code"; ?>"><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

        <!-- Zip code error message-->
        <label class="error"><?php echo "$billing_zip_code_message";?></label><br><br>

        <h6><span>Shipping Address</span></h6><br>

        <!-- SHIPPING ADDRESS -->

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
            <!-- Street label-->
            <label for="shipping_street_label">Street&nbsp;&nbsp;</label>

            <!-- Street textbox -->
            <input type="text" name="shipping_street_edited" id="shipping_street_label" value="<?php echo "$edited_shipping_street"; ?>"><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <!-- Street error message-->
            <label class="error"><?php echo "$shipping_street_message";?></label><br><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <!-- City label -->
            <label for="shipping_city_label">City&nbsp;&nbsp;</label>

            <!-- City textbox -->
            <input type="text" name="shipping_city_edited" id="shipping_city_label" value="<?php echo "$edited_shipping_city"; ?>"><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <!-- City error message -->
            <label class="error"><?php echo "$shipping_city_message";?></label><br><br>

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
                
                </select><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

        <!-- State error message -->
        <label class="error"><?php echo "$shipping_state_message";?></label><br><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  

        <!-- Zip Code label-->
        <label for="shipping_zip_code_label">Zip Code&nbsp;&nbsp;</label>

        <!-- Zip Code textbox -->
        <input type="text" name="shipping_zip_code_edited" id="shipping_zip_code_label" value="<?php echo "$edited_shipping_zip_code"; ?>"><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- Zip code error message-->
        <label class="error"><?php echo "$shipping_zip_code_message";?></label><br><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <h6><span>Contact Information</span></h6><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- First name label-->
            <label for="first_name_label">First Name&nbsp;&nbsp;</label>

            <!-- First name textbox -->
            <input type="text" name="first_name_edited" id="first_name_label" value="<?php echo "$edited_first_name"; ?>"><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <!-- First name error message-->
            <label class="error"><?php echo "$first_name_message";?></label><br><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- Last name label-->
            <label for="last_name_label">Last Name&nbsp;&nbsp;</label>

            <!-- Last name textbox -->
            <input type="text" name="last_name_edited" id="last_name_label" value="<?php echo "$edited_last_name"; ?>"><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <!-- Last name error message-->
            <label class="error"><?php echo "$last_name_message";?></label><br><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- Phone number label-->
            <label for="phone_number_label">Phone Number&nbsp;&nbsp;</label>

            <!-- Phone number textbox -->
            <input type="text" name="phone_number_edited" id="phone_number_label" value="<?php echo "$edited_phone_number"; ?>"><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <!-- Phone number error message-->
            <label class="error"><?php echo "$phone_number_message";?></label><br><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- Email label-->
            <label for="email_label">Email Address&nbsp;&nbsp;</label>

            <!-- Email textbox -->
            <input type="text" name="email_edited" id="email_label" value="<?php echo "$edited_email"; ?>"><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <!-- Email error message-->
            <label class="error"><?php echo "$email_message";?></label><br><br><br>

        <!-- CANCEL AND UPDATE BUTTON-->

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   

        <!-- Cancel customer button -->
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="cancel_customer_button" id="cancel_customer_button" onclick="reset_fields()" style="width: 200px;">Cancel</button>

        <script type="text/javascript">
            reset_fields()
            {
                document.getElementById("update_customer_form").reset();
            }
        </script>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- Update customer button -->
        <button type="submit" name="update_customer_button" id="update_customer_button" style="width: 200px;">Update</button><br><br>

    </form> 
</div>
</body>
</html>





















