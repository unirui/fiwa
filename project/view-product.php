<?php
require_once 'autoload.php';
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
$productMap = new ProductMap();
$products = $productMap->findView($id);
$header = 'Информация о блюде';
require_once 'template/header.php';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
    <h1 class="text-center"><?=$header;?></h1>
<ol class="breadcrumb">
<li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">
    
    
<?php
if ($products) {
?>

<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Ингридиенты</th>

<th>Количество ингридиента</th>

<th>Подготовка </th>
</tr>
</thead>
<tbody>
<?php
foreach ($products as $product) {
$bludo=$product->bludo;    
$gruppa= $product->gruppa;
$recipe=$product->recipe;
$description=$product->description;
$author=$product->author;  
$method=$product->method;  
$ccal+=$product->calory*$product->quantity;
  


echo '<tr>';
echo '<td>'.$product->ingridient.'</td>';
echo '<td>'.$product->quantity.' гр.</td>';
echo '<td>'.$method.'</td>';
echo '</tr>';
}
echo '<h3>'.$bludo.'</h3>';
echo '<p><h4>'.$recipe.'</h4><hr>';
echo '<p><h5>Категория: '.$gruppa.'</h5><br>';



?>
</tbody>

</table>
    
    
    <?php 
    
    echo '<h3><p>Описание рецепта</h3><blockquote><p>'.$description.'</blockquote>';
echo '<p>Калорийность блюда: <strong>'.$ccal.' кКал</strong><hr>';
echo '<h4>Автор рецепта: '.$author.' </h4>';
    ?>

</div>
<div class="box-body">
<?php } else {
echo 'Ни одной накладной не найдено';
} ?>
</div>
</div>
</div>
</div>
<?php

}
require_once 'template/footer.php';
?>
