<?php
    include '../includes/header.php';
    include '../php/Notif.php';
?>

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<body>
  <div class="site-wrapper">
    <div class="site-wrapper-inner">
      <div class="cover-container">
        <div class="masthead clearfix">
          <div class="inner">
            <img class="nav-logo" src="../ressources/logo_quiz.png"/>
            <form class="nav-login" action="php/userLoginController.php"  method="post" name="login">
                <input type="text" placeholder="Pseudo" name="pseudo" class="login-text"/>
                <input type="password" placeholder="Mot de passe" name="password" class="login-text"/>
                <input type="submit" class="btn-go" value="Go"/>
            </form>
          </div>
        </div>
        <div class="inner cover">
            <div class="row home-container">
                <div class="col-sm-6 col-home-left">
                    <h1>Tester vos connaissances !</h1>
                    <a href="#" title="Jouer" class="btn-home">Jouer en ligne</a><br/>
                    <a href="#" title="Amis" class="btn-home">Jouer avec des amis</a><br/><br/>
                    <h1>Pas encore membre ?</h1>
                    <a href="#" title="S'inscrire" class="btn-home">S'inscrire</a>
                </div>
                <div class="col-sm-6 col-home-right">
                    <img class="img-home" src="../ressources/think.png" />
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<<<<<<< HEAD:pages/index.php
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <?php
    include '../includes/footer.php';
  ?>
=======
<script src="bootstrap/js/jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
>>>>>>> 9dc5f39f61d8dcf97f3da389aac9dacd85866926:index.php
  </body>
</html>