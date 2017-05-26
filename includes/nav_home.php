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