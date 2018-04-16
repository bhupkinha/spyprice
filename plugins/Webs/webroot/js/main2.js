// More links show hide 
// $(".more-links").hide();
$(".more-link").click(function(){
  $(".more-links").toggle();
});



// Activate Post Button While Comment Or Reply
  $("input[type='text']").keyup(function() {
    if ($(this).val() != "") {
        $(this).closest(".comment-input").find("input[type='submit']").removeAttr("disabled", "disabled").addClass("comment-input-activate");
      } else {
        $(this).closest(".comment-input").find("input[type='submit']").attr("disabled", "disabled").removeClass("comment-input-activate");
      }
  });



// Search Bar Inside Navigation
var submitIcon = $('.searchbox-icon');
var inputBox = $('.searchbox-input');
var searchBox = $('.searchbox');
var isOpen = false;
submitIcon.click(function(){
    if(isOpen == false){
        searchBox.addClass('searchbox-open');
        inputBox.focus();
        isOpen = true;
    } else {
        searchBox.removeClass('searchbox-open');
        inputBox.focusout();
        isOpen = false;
    }
});  
 submitIcon.mouseup(function(){
        return false;
    });
searchBox.mouseup(function(){
        return false;
    });
$(document).mouseup(function(){
        if(isOpen == true){
            $('.searchbox-icon').css('display','block');
            submitIcon.click();
        }
    });
function buttonUp(){
var inputVal = $('.searchbox-input').val();
inputVal = $.trim(inputVal).length;
if( inputVal !== 0){
    $('.searchbox-icon').css('display','none');
} else {
    $('.searchbox-input').val('');
    $('.searchbox-icon').css('display','block');
}
}

// caraousal css

$('#s1').multislider({
  duration: 750,
  interval: false
});
$('#s2').multislider({
  duration: 750,
  interval: false
});



// [2] start::JQUERY TAB
    $('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = $(this).attr('href');
 
        // Show/Hide Tabs
        $('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });



// Image uploader
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-img').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });


// fix navigation
  $(window).scroll(function(){
            if ($(window).scrollTop() >= 100) {
               $('.navbar-collapse').addClass('fixed-nav');
            }
            else {
               $('.navbar-collapse').removeClass('fixed-nav');
            }
 });

 $(window).scroll(function(){
            if ($(window).scrollTop() >= 100) {
               $('.use-name').show();
               $('.use-image').show();
               $('.searchbox-w').addClass('searchbox-width');
            }
            else {
               $('.use-name').hide();
               $('.use-image').hide();
               $('.searchbox-w').removeClass('searchbox-width');
            }
 });
$('.use-name').hide();
$('.use-image').hide();


// start::Classid_Field
(function ( $ ) {
    $.fn.classicField = function() {
   $(".classic_input").focus(function(){
    var current = $(this).closest(".classic_field");
    current.find("label").animate({
     top: '-12px',
     left: '0px',
     opacity: '0.5',
     fontSize: '13px'
    }, 200);
    $(this).css({"border-bottom":"2px solid blue", "transition":"0.3s"});
    $(".classic_input").focusout(function(){
     var val = $(this).val();
       console.log(val);
       $(this).removeAttr("style");
     if (val == "") {
      $(this).closest(".classic_field").find("label").removeAttr("style");
     }
      });
   });
    };
}( jQuery ));
// end::Classid_Field
// initSample();



// select2 code
$(".select2").select2();
// $(".classic_field").classicField();
$(".select2").select2({
  // placeholder: "Select Tag"
});
// Datepicker
$('.datepicker').datepicker();




// Edit news page image upload
var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.add-img').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file_up").on('change', function(){
        readURL(this);
    });
    
    $(".up_btn").on('click', function() {
       $(".file_up").click();
    });
// End image upload of edit page


// [1] start::JQUERY SELECT2 CLONER
    $('.select2_Cloner').select2();
    $('.select2_Cloner_Time').timepicker();
    var max_clone       = 10; // Maximum Allowed Fields
    var wrapper         = $(".cloner_wraper"); //Fields wrapper
    var cloneTrigger    = $(".clone_trigger"); //Add Action Trigger Class/ID   
    var clonerContainer = $(".field_cloner"); //Add Class/ID For Clone   
    var x         = 1;
 
    $(cloneTrigger).on('click', function(e){ // Action On Action Trigger
        e.preventDefault();
        var current = $(this).closest('.field_cloner');
        $('.select2_Cloner').select2("destroy"); // Destroy Selected Field(Clone)
        // $('.select2_Cloner_Time').timepicker("destroy");
        var forClone = (current.find('.cloner_wraper .for_clone').first().clone());
        if(x < max_clone){
            x++;
            $(this).closest(clonerContainer).find(wrapper).append(forClone);
        } else {
          alert('Only 10 new field are allowed!');
        }
        $('.select2_Cloner').select2();
        $('.select2_Cloner_Time').timepicker();
    });

// end::JQUERY SELECT2 CLONER