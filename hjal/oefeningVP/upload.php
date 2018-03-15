<?php

header('Content-Type: text/plain; charset=utf-8');

// try catch is een constructie waardoor kje geen internal server errors meer krijgt, deze vng je op in catch
// zie hier
try {

    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if (
        !isset($_FILES['upfile']['error']) ||
        is_array($_FILES['upfile']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['upfile']['error'] value.
    switch ($_FILES['upfile']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }
 // als we hier zijn is er geen andere error dan upload_ok.


    // You should also check filesize here.
    if ($_FILES['upfile']['size'] > 1000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }

    // valideren met GD.. want we verwachten een image..

    $filename_van_de_tmp_file=$_FILES['upfile']["tmp_name"];
    $dirty_file = file_get_contents($filename_van_de_tmp_file);
    $new_image = @imagecreatefromstring($dirty_file);
    if($new_image !== false) {
        imagedestroy($new_image); // maak geheugen vrij.
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    $filename=sha1(time())."png";
    imagepng($new_image, $filename);
  // save met GD.
    // genereer unieke naam bijv


    echo 'File is uploaded successfully.';

} catch (RuntimeException $e) {

    echo $e->getMessage();

}

?>