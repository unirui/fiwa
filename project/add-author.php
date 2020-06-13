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
$author = (new AuthorMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' нового автора';
require_once 'template/header.php';
?>
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">

<li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

<li><a href="list-author.php">Авторы</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">
<form action="save-author.php" method="POST">
<div class="form-group">
<label>Фамилия</label>
<input type="text" class="form-control" name="lastname" required="required" value="<?=$author->lastname;?>">
</div>
    
<div class="form-group">
<label>Имя</label>
<input type="text" class="form-control" name="firstname" required="required" value="<?=$author->firstname;?>">
</div>

 <div class="form-group">
<label>Страна</label>
<select class="form-control" name="country_id">
    <?= Helper::printSelectOptions($author->country_id, (new AuthorMap())->arrCountries());?>
</select></div>
    
<div class="form-group">
<label>Год</label>
<input type="text" class="form-control" name="year" required="required" value="<?=$author->year;?>">
</div>
    
<div class="form-group">
<button type="submit" name="saveAuthor" class="btn btn-primary">Сохранить</button>
</div>
<input type="hidden" name="author_id" value="<?=$id;?>"/>
</form>
</div>
<?php
require_once 'template/footer.php';
?>
