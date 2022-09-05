<?php
include('./base.php');
// $movie = $Movie->find($_POST['id']);
if($_FILES['img']['error'] == 0 && isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}
if($_FILES['movie']['error'] == 0 && isset($_FILES['movie']['tmp_name'])){
    move_uploaded_file($_FILES['movie']['tmp_name'],'../upload/'.$_FILES['movie']['name']);
    $_POST['movie'] = $_FILES['movie']['name'];
}

$_POST['date'] = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
unset($_POST['year'],$_POST['month'],$_POST['day']);

// dd($_POST);
$Movie->save($_POST);
to('../back.php?do=movie');
?>