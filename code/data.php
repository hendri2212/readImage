<?php
    $myfile = fopen("../data.txt", "r") or die("Unable to open file!");
    // Output one character until end-of-file
    while(!feof($myfile)) {
        echo fgets($myfile) . "<br>";
    }
    fclose($myfile);
?>