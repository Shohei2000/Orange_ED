<?php session_start()?>
<?php require '../old/header2.php';?>
<?php
    $dictionary_id = $_GET['dictionary_id'];

    $sql=$pdo->prepare('delete from favorite where dictionary_id = ?');
    $sql->execute([$dictionary_id]);
?>

<!-- G2-1ページに遷移 -->
<script>
	history.back();
</script>