<?php
require_once 'secure.php';
if (!Helper::can('admin')) {
header('Location: 404.php');
exit();
}
$id = 0;
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
}
$provider = (new ProviderMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' нового поставщика';
require_once 'template/header.php';
?>
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">

<li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

<li><a href="list-provider.php">Поставщики</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">
<form action="save-provider.php" method="POST">
<div class="form-group">
<label>Название компании</label>
<input type="text" class="form-control" name="name" required="required" value="<?=$provider->name;?>">
</div>
    
<div class="form-group">
<label>Адрес</label>
<input type="text" class="form-control" name="adress" required="required" value="<?=$provider->adress;?>">
</div>

 <div class="form-group">
<label>Телефон</label>
<input type="text" class="form-control" name="tel" required="required" value="<?=$provider->tel;?>">
</div>
    
<div class="form-group">
<button type="submit" name="saveProvider" class="btn btn-primary">Сохранить</button>
</div>
<input type="hidden" name="provider_id"
value="<?=$id;?>"/>
</form>
</div>
<?php
require_once 'template/footer.php';
?>

