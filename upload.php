<?php
    $uploadDir = "./uploads";
    $filename = $_FILES['file']['name'];
    $filePath = "{$uploadDir}/{$filename}";

    if(!is_dir($uploadDir)):
        mkdir($uploadDir, 0755, true);

    endif;

    /*Check file type*/
    if($uploadDir[sizeof($uploadDir)-1] != 'csv'){
        echo 'Arquivo não suportado';
    }
    else{
        echo 'Upload feito com sucesso';
        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
    }
?>