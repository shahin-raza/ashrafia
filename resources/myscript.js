$(function() {
	// form validation function
  $("form[name='contactform']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      name: "required",
      phone: "required",
      city: "required",
      course: "required",
      message: "required",
      email: {
        required: true,
        email: true
      },
    },
    // Specify validation error messages
    messages: {
      name:   "Please enter your name",
      phone:  "Please enter your phone",
      city:   "Please enter your city",
      course: "Please enter your course",
      message:"Please enter your message",
      email:  "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    submitHandler: function(form) {
      form.submit();
    }
  });
});