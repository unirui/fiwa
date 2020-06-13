<?php
require_once 'secure.php';
if (!Helper::can('admin')) {
header('Location: 404.php');
exit();
}
$size = 30;
if (isset($_GET['page'])) {
$page = Helper::clearInt($_GET['page']);
} else {
$page = 1;
}
$authorMap = new AuthorMap();
$count = $authorMap->count();
$authors = $authorMap->findAll($page*$size-$size, $size);
$header = 'Список авторов рецептов';
require_once 'template/header.php';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">
<li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">
<?php
if ($authors) {
?>

<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Фамилия автора</th>
<th>Имя автора</th>
<th>Страна проживания</th>
<th>Год добавления рецепта</th>
</tr>
</thead>
<tbody>
<?php
foreach ($authors as $author) {
echo '<tr>';
echo '<td>'.$author->lastname.'</td>';
echo '<td>'.$author->firstname.'</td>';
echo '<td>'.$author->name.'</td>';
echo '<td>'.$author->year.'</td>';
echo '</tr>';
}
?>
</tbody>
</table>
<div class="box-body">

<a class="btn btn-success" href="add-author.php">Добавить нового автора в базу</a>

</div>
<?php } else {
echo 'Ни одного автора не найдено';
} ?>
</div>
<div class="box-body">
<?php Helper::paginator($count, $page,$size); ?>
</div>
</div>
</div>
</div>
<?php
require_once 'template/footer.php';
?>
