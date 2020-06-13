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
$invoiceMap = new InvoiceMap();
$count = $invoiceMap->count();
$invoices = $invoiceMap->findAll($page*$size-$size, $size);
$header = 'Накладные по заказам';
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
if ($invoices) {
?>

<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Дата поставки</th>
<th>Поставщик</th>
<th>Сумма</th>
<th>Количество</th>
<th>Товар</th>
</tr>
</thead>
<tbody>
<?php
foreach ($invoices as $invoice) {
echo '<tr>';
echo '<td>'.$invoice->data.'</td>';
echo '<td>'.$invoice->provider.'</td>';
echo '<td>'.$invoice->price.'</td>';
echo '<td>'.$invoice->quantity.'</td>';
echo '<td>'.$invoice->ingridient.'</td>';
echo '</tr>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Ни одной накладной не найдено';
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
