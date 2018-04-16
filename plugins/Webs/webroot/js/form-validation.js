
function reloadCaptcha()
{

    jQuery('#captcha_image').prop('src', 'securimage/securimage_show.php?sid=' + Math.random());
}

$(function () {
    $.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    });
    jQuery.validator.addMethod("isValidPhoneNo", function (value, element) {
        return $("#phoneno").intlTelInput("isValidNumber"); // return true if field is ok or should be ignored
    });
    jQuery.validator.addMethod("isValidPhoneNo2", function (value, element) {
        return $("#phoneno2").intlTelInput("isValidNumber"); // return true if field is ok or should be ignored
    });
    jQuery.validator.addMethod("isValidPhoneNo3", function (value, element) {
        return $("#phoneno3").intlTelInput("isValidNumber"); // return true if field is ok or should be ignored
    });
});

$(document).ready(function () {

//    $("#phone_full").val($("#phoneno").intlTelInput("getNumber"));

$("#phone_full2").val($("#phoneno2").intlTelInput("getNumber"));

    $("#registerform").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {
            username: {
                required: true,
                regex: /^[a-zA-Z ]{3,50}$/,
                minlength: 2,
                maxlength: 50
            },

             email: {
                required: true,
                regex : /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$|^[0-9]{5,15}$/

            },
            mobile_no: {
                required: true,
                isValidPhoneNo: true
            }
        },
        messages: {
            username: {
                required: 'Enter name',
                regex: 'Enter valid name',
            },
            email: {
                required: 'Enter Email Id',
                 regex : 'Enter valid Email Id (eg. abc@xyz.com).'
            },
            mobile_no: {
                required: 'Enter mobile number',
                isValidPhoneNo: 'Enter valid Mobile number'
            }
        }
    });
    
    $("#errorregisterform").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {
            username: {
                required: true,
                regex: /^[a-zA-Z ]{3,50}$/,
                minlength: 2,
                maxlength: 50
            },

             email: {
                required: true,
                regex : /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$|^[0-9]{5,15}$/

            },
            mobile_no: {
                required: true,
                isValidPhoneNo2 :true
            }
        },
        messages: {
            username: {
                required: 'Enter name',
                regex: 'Enter valid name',
            },
            email: {
                required: 'Enter Email Id',
                 regex : 'Enter valid Email Id (eg. abc@xyz.com).'
            },
            mobile_no: {
                required: 'Enter mobile number',
                isValidPhoneNo2: 'Enter valid mobile number'
            }
        }
    });
    
    $("#loginform").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {

            "Users[email]": {
                required: true,
               regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$|^[0-9]{5,15}$/

            },
            "Users[password]": {
                required: true
            }
        },
        messages: {
            "Users[email]": {
                required: 'Enter Email Id',
                regex: 'Enter valid Email Id'
            },

            "Users[password]": {
                required: 'Enter password',
            }
        }
    });
    $("#errorloginform").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {

            "Users[email]": {
                required: true,
               regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$|^[0-9]{5,15}$/

            },
            "Users[password]": {
                required: true
            }
        },
        messages: {
            "Users[email]": {
                required: 'Enter Email Id',
                regex: 'Enter valid Email Id'
            },

            "Users[password]": {
                required: 'Enter password',
            }
        }
    });
    $("#personalBioForm").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {
            industry_id: {
                required: true
            },
           name: {
               required: true,
                regex: /^[a-zA-Z ]{3,50}$/,
                minlength: 2,
                maxlength: 20
            },
            email: {
                required: true
            },
           
            bday: {
                required: true
            },
            
            gender: {
                required: true
            },
            mobile_no: {
                
                regex: /^[0-9]{5,15}$/
            },
            about_me: {
                required: true,
                maxlength: 500
            }


        },
        messages: {
            industry_id: {
                required: 'Select Industry'
            },
            name: {
                required: 'Enter name',
                regex: 'Enter valid name'
            },
            email: {
                required: 'Enter Email'
            },
            
            mobile_no: {
                
                regex: 'Enter valid mobile number'
            },
            bday: {
                required: 'Select Date'
            },
            
            gender: {
                required: 'select your gender'
            },
            about_me: {
                //required: 'select your gender'
                required: 'please fill maximum 500 character'
            }

        }
        
        


    });
     $("#changepassword").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {

            password: {
                required: true
            },
            newpassword: {
                required: true,
                regex: /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/

            },
            confirmpassword: {
                required: true,
                equalTo: "#npassword",
                regex: /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/
            }

        },
        messages: {

            password: {
                required: 'Enter your current password.'
            },
            newpassword: {
                required: 'Enter new password',
                regex: 'Enter password 6-16 alphanumeric & one special character.'
            },
            confirmpassword: {
                required: 'Enter confirm password',
                equalTo: 'password and confirm password do not match.'
            }
        }
    });
    $("#addnews").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {

//            weightage: {
//                required: true
//            },
           "title[en_US]": {
                required: true
            },
           "description[en_US]": {
                required: true
            },
           category_id: {
                required: true
            },
           city_id: {
                required: true
            },
           images: {
                required: true
            },
           
//           source_from: {
//                required: true
//            },
           source_url: {
                regex: /^$|^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/
            },
           
           tag_id: {
                required: true
            }
           

        },
        messages: {

//            weightage: {
//                required: 'Enter Weightage.'
//            },
            "title[en_US]": {
                required: 'Enter Add Title.'
            },
            "description[en_US]": {
                required: 'Enter Add Description.'
            },
            category_id: {
                required: 'Select Category.'
            },
            city_id: {
                required: 'Select Location'
            },
            images: {
                required: 'Upload Image'
            },
            
//            source_from: {
//                required: 'Enter Source From.'
//            },
            source_url: {
               regex: 'Enter a valid URL link (eg. https://abc.com).'
            },
            tag_id: {
                required: 'Enter Add Title.'
            }
        }
    });
    $("#editnews").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {

//            weightage: {
//                required: true
//            },
           "title[en_US]": {
                required: true
            },
           "description[en_US]": {
                required: true
            },
           category_id: {
                required: true
            },
           city_id: {
                required: true
            },
//           images: {
//                required: true
//            },
           
//           source_from: {
//                required: true
//            },
           source_url: {
                regex: /^$|^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/
            },
           
           tag_id: {
                required: true
            }
           

        },
        messages: {

//            weightage: {
//                required: 'Enter Weightage.'
//            },
            "title[en_US]": {
                required: 'Enter Add Title.'
            },
            "description[en_US]": {
                required: 'Enter Add Description.'
            },
            category_id: {
                required: 'Select Category.'
            },
            city_id: {
                required: 'Select Location'
            },
//            images: {
//                required: 'Upload Image'
//            },
            
//            source_from: {
//                required: 'Enter Source From.'
//            },
            source_url: {
               regex: 'Enter a valid URL link (eg. https://abc.com).'
            },
            tag_id: {
                required: 'Enter Add Title.'
            }
        }
    });
    $("#subscribe").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {


           email: {
                required: true,
                regex: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+.[a-zA-Z.]{2,6}$/,
                maxlength: 40
            },
        },
        messages: {


            email: {
                required: 'Enter email id',
                regex: 'Enter valid Email Id'
                
            }
        }
    });
    $("#personalize1").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {


           "categoryids[]": {
                required: true
            }
        },
        messages: {


            "categoryids[]": {
                required: 'Select Category'
                
            }
        }
    });
    $("#personalize").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {


           "categoryids[]": {
                required: true
            }
        },
        messages: {


            "categoryids[]": {
                required: 'Select Category'
                
            }
        }
    });
    $("#forgotemail").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {


           email: {
                required: true,
                regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$|^[0-9]{5,15}$/
            }
        },
        messages: {


            email: {
                required: 'Enter Email Id',
                regex: 'Enter valid Email Id'
                
            }
        }
    });
    $("#errorforgotemail").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {


           email: {
                required: true,
                regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$|^[0-9]{5,15}$/
            }
        },
        messages: {


            email: {
                required: 'Enter Email Id',
                regex: 'Enter valid Email Id'
                
            }
        }
    });
    
    
     $("#forgotpassword").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {


           password: {
                required: true,
                regex: /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/
            },
            
            confirmpassword: {
                required: true,
                equalTo: "#npassword"
            }
        },
        messages: {


            password: {
                required: 'Enter Password',
                regex: 'Enter password 6-16 alphanumeric & one special character.'
            },
            
            confirmpassword: {
                required: 'Enter confirm Password',
                equalTo: "password and confirm password do not match."
            }
        }
    });
    
    $("#reports").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {


           email: {
                required: true,
                regex: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+.[a-zA-Z.]{2,6}$/,
                maxlength: 40
            },
           reportsCategory: {
                required: true
                
            },
           mobile_no: {
                  required: true,
               isValidPhoneNo2: true
            }
        },
        messages: {


            email: {
                required: 'Enter email id',
                regex: 'Enter valid Email Id'
                
            },
            reportsCategory: {
                required: 'Select report type'
              },
            mobile_no: {
                 required: 'Enter contact number',
                isValidPhoneNo2: 'Enter valid mobile number'
            }
        }
    });
    
   $("#contactus").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {
            reg_name: {
                required: true,
                regex: /^[a-zA-Z ]{3,50}$/,
                minlength: 2,
                maxlength: 50
            },

             reg_email: {
                required: true,
                regex : /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$|^[0-9]{5,15}$/

            },
            phone: {
                isValidPhoneNo3: true
            },
            subject: {
                required: true
            },
            message: {
                required: true
            }
        },
        messages: {
            reg_name: {
                required: 'Enter name',
                regex: 'Enter valid name',
            },
            reg_email: {
                required: 'Enter Email Id',
                 regex : 'Enter valid Email Id (eg. abc@xyz.com).'
            },
            phone: {
              
                isValidPhoneNo3: 'Enter valid mobile number'
            },
            subject: {
                required: 'Enter subject'
            },
            message: {
                required: 'Enter message'
            }
        }
    });
    
     $("#socialPasswordForm").validate({
        ignore: ":hidden",
        errorElement: 'span',
        errorClass: 'help-inline',
        
        highlight: function (element) {
            $(element).parent().addClass("error");
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("error");
        },
        rules: {

            email: {
                required: true,
               regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$|^[0-9]{5,15}$/

            },
            newpassword: {
                required: true,
                regex: /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/
            }
        },
        messages: {
            email: {
                required: 'Enter Email Id',
                regex: 'Enter valid Email Id'
            },

            newpassword: {
                required: 'Enter password',
                regex: 'Enter password 6-16 alphanumeric & one special character.'
            }
        }
    });

});




