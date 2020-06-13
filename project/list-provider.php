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
$providerMap = new ProviderMap();
$count = $providerMap->count();
$providers = $providerMap->findAll($page*$size-$size, $size);
$header = 'Список поставщиков';
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
if ($providers) {
?>

<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Поставщик</th>
<th>Адрес</th>
<th>Телефон</th>
</tr>
</thead>
<tbody>
<?php
foreach ($providers as $provider) {
echo '<tr>';
echo '<td>'.$provider->name.'</td>';
echo '<td>'.$provider->adress.'</td>';
echo '<td>'.$provider->tel.'</td>';
echo '</tr>';
}
?>
</tbody>
</table>
<div class="box-body">

<a class="btn btn-success" href="add-provider.php">Добавить нового поставщика в базу</a>

</div>
<?php } else {
echo 'Ни одного постащика не найдено';
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
