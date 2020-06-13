<?php
$header = 'АИС «Банк данных технологий создания различных продуктов»';
require_once 'template/header.php';?>

<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="box-body">
    <h3 class="text-center"><?=$header;?></h3>

</section>
 
<div class="box-body">
    
</div>
</div>
</div>
</div>


<div class="row ">
<div class="col-xs-12">
<div class="panel">
    <section class="panel-body " >
        <h4 class="text-center" ><a href="list-min-cal.php">Список блюд, имеющих минимальную калорийность </a></h4>
    

</section>
 

</div>
</div>
</div>

<div class="row " >
<div class="col-xs-12">
<div class="panel center-block">
    <section class="panel-body" >
        <h4 class="text-center" ><a href="list-product.php">Список блюд и названия рецептов для каждого блюда</a></h4>
    

</section>
 

</div>
</div>
</div>


<?php
require_once 'template/footer.php';
?>