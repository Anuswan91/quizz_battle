<?php
    include '../includes/header.php';
    include '../php/Notif.php';
 ?>

<link href="../css/style.css" rel="stylesheet">
<body>
  <div class="site-wrapper">
    <div class="site-wrapper-inner">
      <div class="cover-container">
        <div class="masthead clearfix">
          <div class="inner">
           <img class="nav-logo" src="../ressources/logo_quiz.png"/>
           <div class="nav-login">
                <span class="username">Pseudo</span>
                <a href="#" class="btn-go">ADMIN</a>
                <a href="#" class="btn-go" onclick="notif('Déconnecté', 1);">LOGOUT</a>
            </div>
           <!-- <form class="nav-login" action="../php/userLoginController.php"  method="post" name="login">
                <input type="text" placeholder="Pseudo" name="pseudo" class="login-text"/>
                <input type="password" placeholder="Mot de passe" name="password" class="login-text"/>
                <input type="submit" class="btn-go" value="Go"/>
            </form>-->

          </div>
        </div>
        <div class="inner cover">
            <div class="row home-container">
                <div class="col-sm-6 col-home-left">
                    <h1>Tester vos connaissances !</h1>
                    <a href="#" title="Jouer" class="btn-home">Jouer en ligne</a><br/>
                    <a href="#" title="Amis" class="btn-home">Jouer avec des amis</a><br/><br/>
                    <?php
                    	if (!isset($_SESSION['Auth']) || $_SESSION['Auth'] == null)
                    	{
                    		?>
                    		<h1>Pas encore membre ?</h1>
                   			<a href="../pages/userRegisterView.php" title="S'inscrire" class="btn-home">S'inscrire</a>
                    		<?php 
                    	}
                    ?>
                </div>
                <div class="col-sm-6 col-home-right">
                    <img class="img-home" src="../ressources/think.png" />
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    include '../includes/footer.php';
  ?>
  </body>
</html>