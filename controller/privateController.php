<?php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

if (isset($_GET['pg']) && $_GET['pg'] === 'admin') {

    $localisations = selectAllLocalisation($db);

    require_once "../view/private/admin.php";

}elseif (isset($_GET['pg']) && $_GET['pg'] === 'creation') {

    $displaySuccess = "d-none";
    $displayForm = "";

    if (isset($_POST['nom'], $_POST['ville'])) {


        $insert = insertLocalisation($db, $_POST);

        if ($insert) {
            $displayForm = "d-none";
            $displaySuccess = "";
            $alertsuccess = "alert alert-success";
            $jsDirect = "<script>
                            setTimeout(() => {
                        window.location.href = './?pg=admin';
                        }, 3000); // Redirects after 3 seconds
                        </script>";
                        
        } else {
            $errorCreate="Les champs du formulaire ne sont pas valides ou ne sont pas remplis";
        }
    }

    require_once "../view/private/creation.php";

}elseif(isset($_GET['pg']) && $_GET['pg'] === "disconnect") {

    if (disconnectUser()) {
        header("Location: ./");
        exit();
    }
}elseif(isset($_GET['pg']) && $_GET['pg'] === "delete" && isset($_GET['idLocalisation']) && ctype_digit($_GET['idLocalisation'])) {
    $idLocalisation = (int)$_GET['idLocalisation'];
   
    if (deleteLocalisation($db, $idLocalisation)) {
        header("Location: ./?pg=admin");
        exit();
    }

}elseif(isset($_GET['pg']) && $_GET['pg'] === "update" && isset($_GET['idLocalisation']) && ctype_digit($_GET['idLocalisation'])) {
        $idLocalisation = (int)$_GET['idLocalisation'];

            $displaySuccess = "d-none";
            $displayForm = "";

        if(isset(
            $_POST['nom'],
            $_POST['ville'],
            $_POST['adresse']
        )){

            $update = updateLocalisationById($db,$_POST,$_GET['idLocalisation']);
            if($update){
                $displayForm = "d-none";
                $displaySuccess = "";
                $alertsuccess = "alert alert-success";
                $jsDirect = "<script>
                                setTimeout(() => {
                            window.location.href = './?pg=admin';
                            }, 3000); // Redirects after 3 seconds
                            </script>";
            }else{
                $errorUpdate ="Les champs du formulaire ne sont pas valides ou ne sont pas remplis";
            }
        }

        $OneLocal = selectOneLocalisatoinById($db,$idLocalisation);
        require_once "../view/private/update.php";
    }
