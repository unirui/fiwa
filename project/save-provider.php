<?php
require_once 'autoload.php';
if (isset($_POST['provider_id'])) {
$provider = new Provider();
$provider->provider_id =Helper::clearInt($_POST['provider_id']);
$provider->name = Helper::clearString($_POST['name']);
$provider->adress = Helper::clearString($_POST['adress']);
$provider->tel = Helper::clearString($_POST['tel']);
if ((new ProviderMap())->save($provider)) {
header('Location: list-provider.php');
} else {
if ($provider->provider_id) {

header('Location: add-provider.php?id='.$provider->provider_id);

} else {
header('Location: add-provider.php');
}
}
}