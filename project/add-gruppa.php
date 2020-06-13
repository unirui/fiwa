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
$gruppa = (new GruppaMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' категорию';
require_once 'template/header.php';
?>
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">

<li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

<li><a href="list-gruppa.php">Категории</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">
<form action="save-gruppa.php" method="POST">
<div class="form-group">
<label>Название</label>
<input type="text" class="form-control" name="name" required="required" value="<?=$gruppa->name;?>">
</div>
<div class="form-group">
<button type="submit" name="saveGruppa" class="btn btn-primary">Сохранить</button>
</div>
<input type="hidden" name="gruppa_id"
value="<?=$id;?>"/>
</form>
</div>
<?php
require_once 'template/footer.php';
?>