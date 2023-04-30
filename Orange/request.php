<?php session_start();?>
<?PHP
header('Content-type: application/json; charset=utf-8');
$data = filter_input( INPUT_GET, 'データ' );

$_SESSION['param'][0] = $data;//合計正解数
$_SESSION['param'][1] = $data / $_SESSION['favorite_count'];//正解平均点

$_POST['param'][0] = $data;//合計正解数
$_POST['param'][1] = $data / $_SESSION['favorite_count'];//正解平均点

echo json_encode( $_POST['param']); //JSON形式に変換してから返す

?>