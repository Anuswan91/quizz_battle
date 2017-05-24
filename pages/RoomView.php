<<<<<<< HEAD
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
                <div id="time"></div>
                <div id="player"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var time = <?php echo $time['time']; ?> ;

    time = 45 - time;

    var div = document.getElementById("time");
    div.innerHTML = time + "s";

    interval = setInterval(function(){
        time--
        div.innerHTML = time + "sec";
        if(time <= 0){
            clearInterval(interval);
            clearInterval(joueurs);
            window.location = window.location.origin + "/quizz_battle/pages/gameView.php";
        }
    },1000);

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
            console.log(data);
            document.getElementById('player').innerHTML = data;
        }
    }
</script>
<?php
include '../includes/footer.php';
?>
</body>
</html>
