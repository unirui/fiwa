<?php
require_once 'secure.php';
if (!Helper::can('admin')) {
header('Location: 404.php');
exit();
}
$size = 10;
if (isset($_GET['page'])) {
$page = Helper::clearInt($_GET['page']);
} else {
$page = 1;
}
$gruppaMap = new GruppaMap();
$count = $gruppaMap->count();
$gruppas = $gruppaMap->findAll($page*$size-$size, $size);
$header = 'Список категорий блюд';
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
if ($gruppas) {
?>

<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Название категории</th>
</tr>
</thead>
<tbody>
<?php
foreach ($gruppas as $gruppa) {
echo '<tr>';
echo '<td>'.$gruppa->name.'</td>';
echo '</tr>';
}
?>
</tbody>
</table>
<div class="box-body">

<a class="btn btn-success" href="add-gruppa.php">Добавить новую категорию</a>

</div>
<?php } else {
echo 'Ни одной категории не найдено';
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
