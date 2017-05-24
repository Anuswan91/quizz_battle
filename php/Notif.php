<div class="container-info">
    <div class="div-info-base alert" id="info-base">
        <span class="txt-info"></span>
        <img class="img-info" onclick="closeInfoMsg();" height="15px" src="../img/close.png"/>
    </div>
</div>
<script>
    function closeInfoMsg(){
        $('#info-base').removeClass("div-info-actif");
        $('#info-base').removeClass("alert-info");
        $('#info-base').removeClass("alert-warning");
        $('#info-base').removeClass("alert-success");
        $('#info-base').removeClass("alert-danger");
        $('#info-base').addClass("div-info-base");
    }
    function notif(chaine, type = 1) {
        document.getElementsByClassName('txt-info')[0].innerHTML = chaine;
        $('#info-base').removeClass("div-info-base");
        $('#info-base').addClass("div-info-actif");
        switch (type) {
            case 1:
                $('#info-base').addClass("alert-danger");
                break;
            case 2:
                $('#info-base').addClass("alert-success");
                break;
            case 3:
                $('#info-base').addClass("alert-warning");
                break;
            case 4:
                $('#info-base').addClass("alert-info");
                break;
        }
    }
</script>
