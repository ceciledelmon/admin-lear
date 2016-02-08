<?php

    $target_dir = "./img/";
    $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);

    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


        $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
   
        if($check != false) {
            echo "Le lien est une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } 
        else {
            echo "Le lien n'est pas une image";
            $uploadOk = 0;
        }
    
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "L'image existe déjà";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["imgUpload"]["size"] > 6000000) {
            echo "L'image est trop lourde";
            $uploadOk = 0;
        }
        // Bloquer les formats autorisés
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "svg" ) {
            echo "Seulement les formats JPG, JPEG, PNG & SVG sont autorisés";
            $uploadOk = 0;
        }

        // Vérifier qu'il n'y a pas eu d'erreur 
        if ($uploadOk == 0) {
            echo "Le fichier n'a pas pu être téléchargé";
        // Si toute les conditions sont bonnes, uploader l'image
        } 
        else {
            if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["imgUpload"]["name"]). " a été uploader";
            } 
            else {
                echo "Problème de chargement de l'image";
            }
        }
?>