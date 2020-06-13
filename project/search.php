<?php
require_once 'template/header.php';
$header='Прайс-лист';
$host='localhost';
$user='root';
$password='root';
$database='product';
$link=mysqli_connect($host, $user, $password, $database) or die("Can't connect!");

$data=$_POST['data'];
$provider=$_POST['provider'];

$query= mysqli_query($link,"SELECT distinct data,price,provider.name as provider, quantity,ingridient.name as ingridient,provider.adress as adress,provider.tel as tel
FROM invoice
INNER JOIN provider on invoice.provider_id=provider.provider_id
INNER JOIN ingridient on invoice.invoice_id=ingridient.invoice_id
WHERE data LIKE '%$data%' 
AND invoice.provider_id LIKE '%$provider%'");

$result= mysqli_num_rows($query);

if ($result == 0)
{
echo '<div class="box-body"><h4>Выбранный поставщик не доставлял товаров на эту дату...</h4></div>';
echo '<div class="box-body">
<a class="btn btn-success" href="price-list-invoice.php">Вернуться</a>
</div>';
exit; 
}

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
</section><br>
    <div class="box-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Товар</th>
<th>Стоимость единицы товара</th>
</tr>
</thead>
<tbody>
<?php
while ($row= mysqli_fetch_array($query))
{
$data= $row["data"];
$provider = $row["provider"];
$adress = $row["adress"];
$tel = $row["tel"];
$ingridient = $row["ingridient"];
$quantity = $row["quantity"];
$price = $row["price"];
$price_for_one=$price/$quantity;

echo '<tr>';
echo '<td>'.$ingridient.'</td>';
echo '<td>'.$price_for_one.'</td>';
echo '</tr>';
  }

?>
    </tbody>
</table> 
    </div>
<br>

    
<div class="box-body">
<table class="table table-bordered table-hover">

    


<tr>
<th>Дата поставки: <?= $data; ?></th>
</tr>

<tr>
<th>Поставщик: <?=$provider;?></th>

</tr>

<tr>
<th>Адрес: <?=$adress;?></th>

</tr>

<tr>
<th>Телефон: <?=$tel;?></th>

</tr>
</table>



</div>
</div>
</div>
</div>

<?php
require_once 'template/footer.php';
?>