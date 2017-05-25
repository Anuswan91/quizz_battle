<?php
    include '../includes/header.php';
    include '../php/Notif.php';
    
    if(isset($_GET['logout']) && $_GET['logout'] != null)
    {
    	$_SESSION['Auth'] = null;
    }
    
 ?>
<link href="../css/style.css" rel="stylesheet">
<body>
  <div class="site-wrapper">
    <div class="site-wrapper-inner">
      <div class="cover-container">
        <div class="masthead clearfix">
          <div class="inner">
             <a href="index.php"><img class="nav-logo" src="../img/logo_quiz.png"/></a>
           <?php
            if (isset($_SESSION['Auth']) && !empty($_SESSION['Auth']))
            {?>
            <div class="nav-login">
                <span class="username"><?= $_SESSION['Auth']['plr_pseudo']?></span>
                <a href="adminView.php" class="btn-go">ADMIN</a>
                <a href="?logout=true" class="btn-go" onclick="notif('Déconnecté', 1);">LOGOUT</a>
            </div><?php
            }else{?>
            <form class="nav-login" action="../php/userLoginController.php"  method="post" name="login">
                <input type="text" placeholder="Pseudo" name="pseudo" class="login-text"/>
                <input type="password" placeholder="Mot de passe" name="password" class="login-text"/>
                <input type="submit" class="btn-go" value="Go"/>
            </form>
            <?php }?>
          </div>
        </div>
        <div class="inner cover">
            <div class="row home-container">
                <div class="col-sm-6 col-home-left">
                    <h1>Tester vos connaissances !</h1>
                    <a href="../php/joinRoom.php" title="Jouer" class="btn-home">Jouer en ligne</a><br/>
                    <a href="#" title="Amis" class="btn-home btn-disabled">Jouer avec des amis</a><br/><br/>
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
                    <img class="img-home" src="../img/think.png" />
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