<?php
require_once 'autoload.php';
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
$ingridient = (new IngridientMap())->findViewById($id);
$header = 'Просмотр информации об ингридиенте';
require_once 'template/header.php';
?>

<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<h1><?= $header; ?></h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fafa-dashboard"></i> Главная</a></li>
<li><a href="list-ingridient.php">Ингридиенты</a></li>
<li class="active"><?= $header; ?></li>
</ol>
</section>
<div class="box-body">
<table class="table table-bordered table-hover">
<tr>
<th>Название ингридиента</th>
<td><?= $ingridient->name; ?></td>
</tr>


<tr>
<th>Количество килокалорий на 1 грамм</th>
<td><?= $ingridient->calory; ?></td>
</tr>

<tr>
<th>Поставщик</th>
<td><?=($ingridient->provider);?></td>
</tr>

<tr>
<th>Дата поставки</th>
<td><?=($ingridient->data);?></td>
</tr>

<tr>
<th>Цена за единицу товара</th>
<?php $price_for_one=($ingridient->price)/($ingridient->quantity)?>
<td><?=$price_for_one;?></td>
</tr>
</table>
</div>
</div>
</div>
</div>
<?php
}
require_once 'template/footer.php';
?>


