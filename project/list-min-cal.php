<?php
require_once 'secure.php';

$size = 30;
if (isset($_GET['page'])) {
$page = Helper::clearInt($_GET['page']);
} else {
$page = 1;
}
$productMap = new ProductMap();
$count = $productMap->count();
$products = $productMap->findMinCal($page*$size-$size, $size);
$header = 'Список блюд';
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
if ($products) {
?>



<?php
foreach ($products as $product) {   
$ccal =$product->ccal;

echo '<tr>';
echo '<h3><p><a href="view-product.php?id='.$product->product_id.'">'.$product->product.': "'.$product->recipe.'"</a></td></h3>';
echo '</tr>';

echo '<p>Калорийность блюда: <strong>'.$ccal.' кКал</strong><hr>';
}

} else {
echo 'Ни одного блюда не найдено';
} ?>
</div>
<div class="box-body">
<?php Helper::paginator($count, $page,$size); ?>
</div>
</div>
</div>
</div>