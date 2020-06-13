<?php
require_once 'autoload.php';
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
$invoice = (new InvoiceMap())->findViewById($id);
$header = 'Просмотр накладной';
require_once 'template/header.php';
?>

<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<h1><?= $header; ?></h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fafa-dashboard"></i> Главная</a></li>
<li><a href="list-invoice.php">Накладные</a></li>
<li class="active"><?= $header; ?></li>
</ol>
</section>
<div class="box-body">
<a class="btn btn-success" href="add-invoice.php?id=<?= $id; ?>">Изменить</a>
</div>
<div class="box-body">
<table class="table table-bordered table-hover">
<tr>
<th>Номер накладной</th>
<td><?= $invoice->invoice_id; ?></td>
</tr>


<tr>
<th>Дата поставки</th>
<td><?= $invoice->data; ?></td>
</tr>

<tr>
<th>Поставщик</th>
<td><?=($invoice->provider);?></td>
</tr>

<tr>
<th>Товар</th>
<td><?=($invoice->ingridient);?></td>
</tr>

<tr>
<th>Количество товара</th>
<td><?=($invoice->quantity);?></td>
</tr>

<tr>
<th>Общая сумма</th>
<td><?=($invoice->price);?></td>
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

