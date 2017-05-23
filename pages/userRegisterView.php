<?php
include '../includes/header.php';
include '../php/userRegisterController.php';
?>
<link rel="stylesheet" href="../css/styleRegister.css"/>
<link href="../css/style.css" rel="stylesheet">
<!-- Formulaire création d'un compte -->
<body>
<?php
include '../php/Notif.php';
?>
<div class="site-wrapper">
  <div class="site-wrapper-inner">
    <div class="cover-container">
      <div class="masthead clearfix">
        <div class="inner">
          <img class="nav-logo" src="../ressources/logo_quiz.png"/>
        </div>
      </div>
      <div class="inner cover">
          <h2>Inscription</h2>
          <form action="../php/userRegisterController.php"  method="post" name="registration">

              <label for="login">Pseudo</label>
              <input type="text" name="login" id="login" placeholder="Pseudo"/>

              <label for="password">Mot de passe</label>
              <input type="password" name="password" id="password" placeholder="Mot de passe"/>

              <button type="submit" class="btn-home">S'inscrire</button>

          </form>
      </div>
    </div>
  </div>
</div>
<?php
include '../includes/footer.php';
if (isset($_GET['error']) && $_GET['error']==true){
    ?><script>notif("ERREUR ! Ce nom d''utilisateur existe déja.", 1);</script>
    <?php
};
?>
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
</body>
</html>

