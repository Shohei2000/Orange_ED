<?php session_start()?>
<?php require '../old/header2.php';?>
<?php
    $dictionary_id = $_GET['dictionary_id'];
    $user_id = $_SESSION['customer']['user_id'];

    $sql=$pdo->prepare('insert into favorite values (?,?)');
    $sql->execute([$user_id,$dictionary_id]);
?>

<!-- G2-1ページに遷移 -->
<script>
	history.back();
</script>