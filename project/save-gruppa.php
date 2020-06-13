<?php
require_once 'autoload.php';
if (isset($_POST['gruppa_id'])) {
$gruppa = new Gruppa();
$gruppa->gruppa_id =Helper::clearInt($_POST['gruppa_id']);
$gruppa->name = Helper::clearString($_POST['name']);
if ((new GruppaMap())->save($gruppa)) {
header('Location: list-gruppa.php');
} else {
if ($gruppa->gruppa_id) {

header('Location: add-gruppa.php?id='.$gruppa->gruppa_id);

} else {
header('Location: add-gruppa.php');
}
}
}

