<?php
$codes = array(404 => array('404', 'Запрашиваемая страница не найдена на сервере.'));

if (isset($_SERVER['REDIRECT_STATUS'])){
    $status = $_SERVER['REDIRECT_STATUS'];
    $title = ' '.$codes[$status][0];
    $message = $codes[$status][1];
}

if(!isset($title)){
    $title = $message = '';
}

echo '<h2>Внимание! Обнаружена ошибка'.$title.'</h2>
<h4>'.$message.'</h4>';
