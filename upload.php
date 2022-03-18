<?php
    $uploadDir = "./uploads";
    $filename = $_FILES['file']['name'];
    $filePath = "{$uploadDir}/{$filename}";

    if(!is_dir($uploadDir)):
        mkdir($uploadDir, 0755, true);

    endif;

    move_uploaded_file($_FILES['file']['tmp_name'], $filePath);