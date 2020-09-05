<?php

$arr_file_types = ['application/vnd.android.package-archive'];
 
if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
    echo "false";
    return;
}
 
if (!file_exists('APK')) {
    mkdir('APK', 0777);
}

move_uploaded_file($_FILES['file']['tmp_name'], 'APK/' . 'eDevlet.apk');
 
echo "success";
die();
?>