<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // $(":submit").click(function(){
            //     validateForm();
            $(document).on('submit', '#formId', function (e) {
                e.preventDefault();
                let valid = validateForm();
                if (valid) {
                    this.submit();
                }
            });
            function validateForm() {
                //alert(0);
                // let fname = $("#fname").val();
                // let lname = $("#lname").val();
                // let dob = $("#dob").val();
                // let gender = $("input[name=gender]:checked").val();
                // let email = $("#email").val();
                // let phonenumber = $("#phonenumber").val();
                // let role = $("#role").val();
                // let interested = $("input[type=checkbox]:checked").val();
                // let comment = $("#comment").val();


                let isValid = true;
                $('.error').hide();
                let regexName = /^[a-zA-Z]*$/;
                let regexPhone = /^(\+\d{1,3}[- ]?)?\d{10}$/;
                let regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;                
                let genderSelected = false;
                let checkboxCount= $('input[type=checkbox]:checked').length;
                $(".required").each(function () {
                    if ($(this).attr('id') === 'fname') {
                        if ($(this).val() === "") {
                            $("#fnameError").text("This is a required field").show();
                            isValid = false;
                        }
                        else if (!regexName.test($(this).val())) {
                            $("#fnameError").text("Please enter a valid name").show();
                            isValid = false;
                        }
                    }
                    if ($(this).attr('id') === 'lname') {
                        if ($(this).val() === "") {
                            $("#lnameError").text("This is a required field").show();
                            isValid = false;
                        }
                        else if (!regexName.test($(this).val())) {
                            $("#lnameError").text("Please enter a valid name").show();
                            isValid = false;
                        }
                    }
                    if ($(this).attr('id') === 'dob') {
                        if ($(this).val() === "") {
                            $("#dobError").text("This is a required field").show();
                            isValid = false;
                        }
                    }
                    // alert(!$(this).is(':checked'));
                    if ($(this).attr('name') === 'gender') {
                       
                        if (!$(this).is(':checked') && !genderSelected) {
                            $("#genderError").text("This is a required field").show();
                            isValid = false;
                        }
                        else {
                            $("#genderError").text("This is a required field").hide();
                            isValid = true;
                            genderSelected = true;
                        }
                    }

                    if ($(this).attr('id') === 'email') {
                        if ($(this).val() === "") {
                            $("#emailError").text("This is a required field").show();
                            isValid = false;
                        }
                        else if (!regexEmail.test($(this).val())) {
                            $("#emailError").text("Please enter a valid email").show();
                            isValid = false;
                        }
                    }

                    if ($(this).attr('id') === 'phonenumber'){
                        if ($(this).val() === "") {
                            $("#phonenumberError").text("This is a required field").show();
                            isValid = false;
                        }
                        else if (!regexPhone.test($(this).val())) {
                            $("#phonenumberError").text("Please enter a valid phonenumber").show();
                            isValid = false;
                        }
                    }
                    
                    if($(this).attr('id') === 'role'){
                        if ($(this).val() === "") {
                            $("#roleError").text("This is a required field").show();
                            isValid = false;
                        }
                    }
                });

                if(checkboxCount<2){
                    $("#interestedError").text("Minimum 2 checkbox should be checked").show();
                        isValid = false;
                }
                return isValid;
            }
        });

    </script>
</head>

<body>
    <h1 style="text-align:center">Registration Form</h1>
    <div>
        <form id="formId">
            <label for="fname">First name:</label><span>*</span><br>
            <input type="text" name="fname" id="fname" value="" class="required"><br>
            <span id="fnameError" class="error"></span><br>

            <label for="lname">Last name:</label><span>*</span><br>
            <input type="text" name="lname" id="lname" value="" class="required"><br>
            <span id="lnameError" class="error"></span><br>

            <label for="birthday">Birthday:</label><span>*</span>
            <input type="date" name="dob" id="dob" value="" class="required" max="<?php echo date('Y-m-d')?>">
            <span class="tab"></span>

            <label for="gender">Gender: </label><span>*</span>
            <input type="radio" name="gender" id="male" value="Male" class="required">
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="Female" class="required">
            <label for="female">Female</label>
            <br>
            <span id="dobError" class="error"></span>
            <span id="genderError" class="error" style="display:inline-block; margin-left:180px"></span>
            <br>
            <br>

            <label for="email">Email:</label><span>*</span><br>
            <input type="text" name="email" id="email" value="" class="required">
            <br><span id="emailError" class="error"></span><br>

            <label for="phonenumber">Phone Number:</label><span>*</span><br>
            <input type="text" name="phonenumber" id="phonenumber" value="" class="required"><br>
            <span id="phonenumberError" class="error"></span><br>

            <label for="Role">Role:</label><span>*</span>
            <select name="role" id="role" class="required">
                <option value="">select</option>
                <option value="Java">Java</option>
                <option value="PHP">PHP</option>
                <option value="Javascript">Javascript</option>
            </select><br>
            <span id="roleError" class="error"></span><br>

            <label for="Interested">Interested in:</label><span>*</span>
            <input type="checkbox" id="jquery" name="jquery" value="jquery" class="required">
            <label for="jquery">Jquery</label>
            <input type="checkbox" id="php" name="php" value="php" class="required">
            <label for="php">php</label>
            <input type="checkbox" id="laravel" name="laravel" value="laravel" class="required">
            <label for="laravel">laravel</label>
            <input type="checkbox" id="react" name="react" value="react" class="required">
            <label for="react">react</label>
            <input type="checkbox" id="angular" name="angular" value="angular" class="required">
            <label for="angular">angular</label><br>
            <span id="interestedError" class="error"></span><br>

            <textarea name="comment" id="comment" rows="3" placeholder="Comments if any"></textarea><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>