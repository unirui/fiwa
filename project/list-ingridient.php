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
$ingridientMap = new IngridientMap();
$count = $ingridientMap->count();
$ingridients = $ingridientMap->findAll($page*$size-$size, $size);
$header = 'Список существующих ингридиентов';
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
if ($ingridients) {
?>

<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Название ингридиента</th>
<th>Количество килокаллорий на 1 грамм</th>
</tr>
</thead>
<tbody>
<?php
foreach ($ingridients as $ingridient) {
echo '<tr>';
echo '<td><a href="view-ingridient.php?id='.$ingridient->ingridient_id.'">'.$ingridient->name.'</a></td>';
echo '<td>'.$ingridient->calory.'</td>';
echo '</tr>';
}
?>
</tbody>
</table>
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
