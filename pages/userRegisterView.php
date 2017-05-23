<?php
include '../includes/header.php';
include '../php/userRegisterController.php';

?>
<link rel="stylesheet" href="../css/styleRegister.css"/>
<link href="../css/style.css" rel="stylesheet">
<!-- Formulaire création d'un compte -->
<body>
<?php 
if (isset($_GET['error']) && $_GET['error']==true){
	?><div class="alert alert-danger">
  	<strong>FAILED!</strong> Login already use ! try with your mom's name.
	</div>
	<?php
}
?>
<div class="container">
  <h2>Registration</h2>
  <form action="../php/userRegisterController.php"  method="post" name="registration">

    <label for="login">Login</label>
    <input type="text" name="login" id="login" placeholder="Login"/>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;"/>

    <button type="submit">Register</button>

  </form>
</div>


<script type="text/javascript" src="../jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="../jquery-validation-1.15.0/dist/additional-methods.min.js"></script>
<script>
//Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='registration']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      firstname: "required",
      lastname: "required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: 5
      }
    },
    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>
<?php include '../includes/footer.php';?>
</body>

