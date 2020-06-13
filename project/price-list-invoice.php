<?php
require_once 'secure.php';
if (!Helper::can('admin')) {
header('Location: 404.php');
exit();
}
$header = 'Прайс-лист';
require_once 'template/header.php';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<h1><?=$header;?></h1>
<h5>Вы можете создать прайс-лист, выбрав дату и поставщика</h5>
<ol class="breadcrumb">
<li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">

    <form action="search.php" method="POST">

<!--
<div class="form-group" >
<label>Дата</label>
<select class="form-control datepicker-days" name="data"  >
    <?= Helper::printSelectOptions($invoice->data, (new InvoiceMap())->arrInvoices());?>
</select>
</div>
 -->
<div class="form-group " >
<label>Дата</label>
<input class="form-control" type="date" name="data">
</div>
        
 <div class="form-group">
<label>Поставщик</label>
<select class="form-control" name="provider">
    <?= Helper::printSelectOptions($invoice->provider, (new ProviderMap())->arrProviders());?>
</select>
</div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-success fa fa-search" name="submit" > Создать</button>
    </div>
</form>
    
    
</div>
</div>
</div>
</div>

    
<?php
require_once 'template/footer.php';
?>
