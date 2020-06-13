<?php
require_once 'secure.php';
$id = 0;
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
}
$product = (new ProductMap())->findById($id);
$header = 'Новое блюдо';
require_once 'template/header.php';
?>
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">

<li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

<li><a href="list-product.php">Список блюд</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">
<form action="save-provider.php" method="POST">
<div class="form-group">
<label>Название блюда</label>
<input type="text" class="form-control" name="name" required="required" value="<?=$product->name;?>">
</div>
    
<div class="form-group">
<label>Категория блюда</label>
<select class="form-control" name="gruppa">
    <?= Helper::printSelectOptions($product->gruppa_id, (new ProductMap())->arrGruppas());?>
</select>
</div>
    
<div class="form-group">
<label>Название рецепта</label>
<input type="text" class="form-control" name="name" required="required" value="<?= $recipe->name;?>">
</div>
   
<div class="form-group">
<label>Автор рецепта</label>
<input type="text" class="form-control" name="name" required="required" value="<?= $author->fio;?>">
</div>
    
 <div class="form-group">
<label>Описание рецепта</label>
<textarea class="form-control" name="description" required="required" value="<?=$recipe->description;?>">
</textarea>
</div>
    
<div class="form-group">
<label>Ингридиенты</label>
<select class="form-control" name="ingridient" multiple="multiple">
    <?= Helper::printSelectOptions($ingridient->ingridient_id, (new IngridientMap())->arrIngridients());?>
</select>
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

