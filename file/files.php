<?php
    $a = readfile("myfile.txt");
    // echo $a;
    // r ->read
    // w ->write

    $fpn = fopen("myfile.txt", "r");
    echo var_dump($fpn);


    if(!$fpn) {
        die ("Unable to open enter valid file");
    }

    $content = fread($fpn, filesize("myfile.txt"));
    fclose($fpn);
?>