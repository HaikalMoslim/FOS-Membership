$(document).ready(function(){

    // Function to perform common validation
    function validateForm() {
        var fname = $('.firstname').val(); 
        var lname = $('.lastname').val(); 
        var email = $('.email').val(); 
        var phone = $('.phone').val(); 
        var address1 = $('.address1').val(); 
        var address2 = $('.address2').val(); 
        var city = $('.city').val(); 
        var state = $('.state').val(); 
        var country = $('.country').val();
        var postalcode = $('.postalcode').val();

        var errors = [];

        if(!fname) {
            errors.push("First Name is required");
        }
        if(!lname) {
            errors.push("Last Name is required");
        }
        if(!email) {
            errors.push("Email is required");
        }
        if(!phone) {
            errors.push("Phone Number is required");
        }
        if(!address1) {
            errors.push("Address 1 is required");
        }
        if(!address2) {
            errors.push("Address 2 is required");
        }
        if(!city) {
            errors.push("City is required");
        }
        if(!state) {
            errors.push("State is required");
        }
        if(!country) {
            errors.push("Country is required");
        }
        if(!postalcode) {
            errors.push("Postal Code is required");
        }

        return errors;
    }

    // Razorpay and COD button click events
    $('.razorpay_btn, .cod_btn').click(function (e){
        e.preventDefault();

        var validationErrors = validateForm();

        if (validationErrors.length > 0) {
            // Display errors collectively
            alert(validationErrors.join('\n'));
        } else {
            // Proceed with Razorpay or COD logic based on button class
            if ($(this).hasClass('razorpay_btn')) {
                // Razorpay logic
                // ...
            } else {
                // COD logic
                // Submit the form or trigger any other action
                $(this).closest('form').submit();
            }
        }
    });
});
