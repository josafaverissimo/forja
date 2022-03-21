<?php
    $uploadDirectory = './uploads';
    $csvFiles = array_slice(scandir($uploadDirectory), 2);
    $csvFilesContentByFilename = [];

    foreach($csvFiles as $file):
        $filename = explode('.', $file)[0];
        $filepath = "{$uploadDirectory}/$file";

        $handle = fopen($filepath, 'r');
        $content = [];

        while(!feof($handle)):
            $line = str_replace(["\n", "\r"], "", fgets($handle));

            if($line === "") continue;
            
            $content[] = $line;

        endwhile;
        
        $csvFilesContentByFilename[$filename] = $content;
    endforeach;
    
    header('Content-Type: application/json');
    echo json_encode(array_reverse($csvFilesContentByFilename));
