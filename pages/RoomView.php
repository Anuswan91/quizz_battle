<?php
include '../includes/header.php';
include '../php/Notif.php';
include '../php/RoomController.php';
?>
<link href="../css/styleRoom.css" rel="stylesheet">
<body>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container">
            <div class="masthead clearfix">
                <div class="inner">
                    <a href="index.php"><img class="nav-logo" src="../img/logo_quiz.png"/></a>
                </div>
            </div>
            <div class="inner cover">
                <div class="row home-container">
                    <div class="col-sm-6 col-room-left">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                40 sec
                            </div>
                        </div>
                        <h1>Sélectionner votre théme:</h1>
                        <div class="funkyradio">
                            <?php
                            foreach ($themes as $key => $value) {
                                ?>
                                <div class="funkyradio-success">
                                    <input type="radio" name="radio" id="<?php echo $value['thm_id']; ?>" />
                                    <label for="<?php echo $value['thm_id']; ?>" style="background-color: #333;"><?php echo $value['thm_name']; ?></label>
                                </div>
                                <?php }?>
                        </div>
                    </div>
                    <div class="col-sm-6 col-room-right">
                        <h1>Joueurs (<?php echo $listJoueur['0']['nb_player'];?>):</h1>
                        <div class="list-group">
                            <?php
                            foreach ($listJoueur as $key => $value) {
                                ?>
                                <a class="list-group-item"><?php echo $value['plr_pseudo']; ?></a>
                                <?php
                            }
                            ?>
                        </div>
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
