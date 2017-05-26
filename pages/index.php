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
        <?php include '../includes/nav_home.php';?>
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