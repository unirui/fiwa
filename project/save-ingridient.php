<?php
require_once 'autoload.php';
if (isset($_POST['ingridient_id'])) {
$ingridient = new Ingridient();
$ingridient->ingridient_id =Helper::clearInt($_POST['ingridient_id']);
$ingridient->name = Helper::clearString($_POST['name']);
$ingridient->calory = Helper::clearString($_POST['calory']);
if ((new IngridientMap())->save($ingridient)) {
header('Location: list-ingridient.php');
} else {
if ($ingridient->ingridient_id) {

header('Location: add-ingridient.php?id='.$ingridient->ingridient_id);

} else {
header('Location: add-ingridient.php');
}
}
}
