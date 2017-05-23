<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../../favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Battle</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

 <body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  <div class="site-wrapper">
    <div class="site-wrapper-inner">
      <div class="cover-container">
        <div class="masthead clearfix">
          <div class="inner">
            <img class="nav-logo" src="ressources/logo_quiz.png"/>
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
                    <img class="img-home" src="ressources/think.png" />
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<script src="bootstrap/js/jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>