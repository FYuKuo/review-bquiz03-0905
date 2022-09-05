<?php
include('./base.php');
$DB = new DB($_POST['table']);
$now = $DB->find($_POST['id']);
$change = $DB->find($_POST['chId']);

$tmp = $now['rank'];
$now['rank'] = $change['rank'];
$change['rank'] = $tmp;


$DB->save($now);
$DB->save($change);
?>