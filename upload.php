<?php
    $uploadDir = "./uploads";
    $filename = (new DateTime('now'))->getTimestamp() . '_' . $_FILES['file']['name'];
    $filePath = "{$uploadDir}/{$filename}";

    if(!is_dir($uploadDir)):
        mkdir($uploadDir, 0755, true);

    endif;

    move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
