<?php
require_once 'secure.php';
$header = 'АИС «Банк данных технологий создания различных продуктов»';
require_once 'template/header.php';
?>

<?php if (!Helper::can('user'))
        {     require_once 'adminId.php';}
else
        {    require_once 'userId.php';}
        ?>
<?php
require_once 'template/footer.php';
?>