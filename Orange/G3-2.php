<?php session_start()?>
<?php require '../old/header2.php';?>

<?php require 'nav_drawer.php';?>

<?php
    $search_word = $_GET['sw'];
?>

<div class="main-container">
	<div class="row">
		<div class="col-sm-12">
			<p style="font-size:2vw; ">Sorry... We can't find the「<?php echo $search_word;?>」</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<a href="G2-1.php">Back to main page</a>
		</div>
	</div>
</div>

<style>
    .main-container{
        margin:2% 10%;
    }
</style>
<?php require '../old/fotter2.php'?>