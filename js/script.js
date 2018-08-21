//collapse the navbar during scrolling.
$(window).scroll(function(){
  if ($(".navbar").offset().top > 50) {
    $(".navbar-fixed-top").addClass("top-nav-collapse");
  } else {
    $(".navbar-fixed-top").removeClass("top-nav-collapse");
  }
});

// page scrolling feature.  jquery easing plugin is required.
$(function (){
  $(document).on("click", "a.page-scroll", function(event){
    var $anchor = $(this);
    $("html, body").stop().animate({
      scrollTop: $($anchor.attr("href")).offset().top
    }, 1500, "easeInOutExpo");
    event.preventDefault();
  });
});

$(document).ready(function () {
  toggleFields();
  $("#birthLocation").change(function () {
    toggleFields();
  });
});

function toggleFields() {
  if ($("#birthLocation").val() == "hospital")
      $("#hospitalNameInput").show();
  else
      $("#hospitalNameInput").hide();
}

// form validation

// function validateForm() {
//   var contactForm = document.forms["contact"]["name"]["email"]["phone"]["contactPreference"].value;
//   if (contactForm == "") {
//     alert("Please fillout the appropriate boxes!");
//     return false;
//   } else {
//     alert("Thank You for Submitting!");
//     return true;
//   }
// }

// function validateForm(){
//   var validate = $('name','email','phone','contactPreference').val();
//   if (validate == "") {
//     $('button.btn').confirm({
//       content: "Please fill out the required fields",
//       closeIcon: true
//     });
//   } else {
//     $('button.btn').confirm({
//       content: "Thanks for Submitting!",
//       closeIcon: true
//     });
//   }
// }

// validateForm();


//   $('button.btn').confirm({
//   content: "Thanks for Submitting!",
//   closeIcon: true
// });

// function validate(form){
//       fail = nameValidate(email.fullName.value)
//       fail += emailValidate(email.email.value)
//       fail += phoneValidate(email.phone.value)
//       fail += contactPreferenceValidate(email.contactPreference.value)
//
//       if(fail=="") {
//         alert("Thank YoU!");
//         return true
//       } else {
//         alert(fail);
//         return false
//       }
//     }
//     function nameValidate(field){
//       return (field=="") ? "Please enter your Full Name.\n" : "";
//     }
//     function emailValidate(field){
//       return (field=="") ? "Please enter your E-mail.\n" : "";
//     }
//     function phoneValidate(field){
//       return (field=="") ? "Please enter your Phone Number.\n" : "";
//     }
//     function contactPreferenceValidate(field){
//       return (field=="") ? "Please choose method of contact.\n" : "";
//     }


// jQuery.validator.addMethod('answercheck', function (value, element) {
//         return this.optional(element) || /^\bcat\b$/.test(value);
//     }, "type the correct answer -_-");
//
// // validate contact form
// $(function() {
//     $('#contact').validate({
//         rules: {
//             name: {
//                 required: true,
//                 minlength: 2
//             },
//             email: {
//                 required: true,
//                 email: true
//             },
//             message: {
//                 required: true
//             },
//             answer: {
//                 required: true,
//                 answercheck: true
//             }
//         },
//         messages: {
//             name: {
//                 required: "come on, you have a name don't you?",
//                 minlength: "your name must consist of at least 2 characters"
//             },
//             email: {
//                 required: "no email, no message"
//             },
//             message: {
//                 required: "um...yea, you have to write something to send this form.",
//                 minlength: "thats all? really?"
//             },
//             answer: {
//                 required: "sorry, wrong answer!"
//             }
//         },
//         submitHandler: function(form) {
//             $(form).ajaxSubmit({
//                 type:"POST",
//                 data: $(form).serialize(),
//                 url:"process.php",
//                 success: function() {
//                     $('#contact :input').attr('disabled', 'disabled');
//                     $('#contact').fadeTo( "slow", 0.15, function() {
//                         $(this).find(':input').attr('disabled', 'disabled');
//                         $(this).find('label').css('cursor','default');
//                         $('#success').fadeIn();
//                     });
//                 },
//                 error: function() {
//                     $('#contact').fadeTo( "slow", 0.15, function() {
//                         $('#error').fadeIn();
//                     });
//                 }
//             });
//         }
//     });
// });

// (function($) {
//     // Select the form and form message
//     var form = $('#ajax-contact-form'),
//         form_messages = $('#form-messages');
//
//     // Action at on submit event
//     $(form).on('submit', function(e) {
//         e.preventDefault(); // Stop browser loading
//
//         // Get form data
//         var form_data = $(form).serialize();
//
//         // Send Ajax Request
//         var the_request = $.ajax({
//             type: 'POST', // Request Type POST, GET, etc.
//             url: "contact.php",
//             data: form_data
//         });
//
//         // At success
//         the_request.done(function(data){
//             form_messages.text("Success: "+data);
//
//             // Do other things at success
//         });
//
//         // At error
//         the_request.done(function(){
//             form_messages.text("Error: "+data);
//
//             // Do other things at fails
//         });
//     });
// })(jQuery);

$(document).ready(function() {
		$('form#contact-us').submit(function() {
			$('form#contact-us .error').remove();
			var hasError = false;
			// $('.requiredField').each(function() {
			// 	if($.trim($(this).val()) == '') {
			// 		var labelText = $(this).prev('label').text();
			// 		$(this).parent().append('<span class="error">You forgot to enter your '+labelText+'.</span>');
			// 		$(this).addClass('inputError');
			// 		hasError = true;
			// 	} else if($(this).hasClass('email')) {
			// 		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			// 		if(!emailReg.test($.trim($(this).val()))) {
			// 			var labelText = $(this).prev('label').text();
			// 			$(this).parent().append('<span class="error">Sorry! You\'ve entered an invalid '+labelText+'.</span>');
			// 			$(this).addClass('inputError');
			// 			hasError = true;
			// 		}
			// 	}
			// });
			if(!hasError) {
				var formInput = $(this).serialize();
				$.post($(this).attr('action'),formInput, function(data){
					$('form#contact-us').slideUp("fast", function() {
						$(this).before('<p class="tick"><strong>Thanks!</strong> Your email has been sent. Please check your spam folder if you have not heard from us within 48 hours.</p>');
					});
				});
			}

			return false;
		});
	});
