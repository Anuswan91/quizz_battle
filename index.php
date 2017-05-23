<?php 

include 'includes/header.php'
?>
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
            <form class="nav-login">
                <input type="text" placeholder="Pseudo" name="username" class="login-text"/>
                <input type="password" placeholder="Mot de passe" name="pseudo" class="login-text"/>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="../../dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>