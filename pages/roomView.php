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
            <?php include '../includes/nav_game.php';?>
            <div class="inner cover">
                <div class="row home-container">
                    <div class="col-sm-6 col-room-left">
                        <h1>Sélectionnez votre thème :</h1>
                        <div class="funkyradio">
                            <?php
                            foreach ($themes as $key => $value) {
                                ?>
                                <div class="funkyradio-success">
                                    <input type="radio" name="radio" id="<?php echo $value['thm_id']; ?>" checked />
                                    <label for="<?php echo $value['thm_id']; ?>" style="background-color: <?php echo $value['thm_color']; ?>; opacity:0.7;"><?php echo $value['thm_name']; ?></label>
                                </div>
                                <?php }?>
                        </div>
                    </div>
                    <div class="col-sm-6 col-room-right" id="player">
                        <h1>Joueurs (<?php echo $query->rowCount();?>):</h1>
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
                <div class="row home-container">
                    <a href="../php/leaveRoomController.php" class="btn-home btn-leave">QUITTER</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../includes/footer.php';
?>
<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
	
    var time = <?php echo $time['time']; ?>;

    time = 45 - time;
    var timePercent = time * 100 / 45;
    var $divTime = $('#time-bar');
    if ($divTime){
        $divTime.attr('aria-valuenow', timePercent);
        $divTime.css('width', timePercent + '%');
    }

    interval = setInterval(function(){
        time-=1/10;
        timePercent = time * 100 / 45;
        if ($divTime){
            $divTime.attr('aria-valuenow', timePercent);
            $divTime.css('width', timePercent + '%');
        }
        if(time <= 0){
            clearInterval(interval);
            clearInterval(joueurs);
            window.location = window.location.origin + "/quizz_battle/pages/gameView.php";

            var arrayFromPHP = <?php echo json_encode($themes) ?>;

           window.location = "../php/gameInitController.php?idTheme=" + $( "input:checked" ).attr("id");
        }
    },100);

    //Objet AJax
    function getXMLHttpRequest() {
        var xhr = null;

        if (window.XMLHttpRequest || window.ActiveXObject) {
            if (window.ActiveXObject) {
                try {
                    xhr = new ActiveXObject("Msxml2.XMLHTTP");
                } catch(e) {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }
            } else {
                xhr = new XMLHttpRequest();
            }
        } else {
            alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
            return null;
        }
        return xhr;
    }


    var joueurs = setInterval('requestListeJoueur(affichageListeJoueur)',1500);
    //Affiche la liste des joueurs
    function requestListeJoueur(callback) {
        var xhr = getXMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                callback(xhr.responseText);
            }
        };
        //var msg = encodeURIComponent(document.getElementById("barre-msg").value);
        xhr.open("GET", "../php/listeJoueurRoom.php", true);
        xhr.send(null);
    }

    //Permet d'afficher la liste des joueur dynamiquement
    function affichageListeJoueur(data){
        if(data.length > 0){
            document.getElementById('player').innerHTML = data;
        }
    }
    
</script>
</body>
</html>
