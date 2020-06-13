<?php
require_once 'autoload.php';
if (isset($_POST['author_id'])) {
$author = new Author();
$author->author_id =Helper::clearInt($_POST['author_id']);
$author->lastname =Helper::clearString($_POST['lastname']);
$author->firstname = Helper::clearString($_POST['firstname']);
$author->country_id = Helper::clearInt($_POST['country_id']);
$author->year = Helper::clearInt($_POST['year']);
if ((new AuthorMap())->save($author)) {
header('Location: list-author.php');
} //else {
//if ($author->author_id) {

//header('Location: add-author.php?id='.$author->author_id);

//} else {
//header('Location: add-author.php');
//}
//}
}
