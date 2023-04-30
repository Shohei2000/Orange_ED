<?php session_start()?>
<?php require '../old/header1.php';?>

<?php

    $sql = $pdo -> prepare('insert into customer values(null,?,?,?,?,?,?)');

    $sql -> execute([$_SESSION['password1'],$_SESSION['mail1'],$_SESSION['name_kanji'],
        $_SESSION['nickname'],$_SESSION['gender'],$_SESSION['birthday']]);

//     echo $_SESSION['password1'];
//     echo $_SESSION['mail1'];
//     echo $_SESSION['name_kanji'];
//     echo $_SESSION['nickname'];
//     echo $_SESSION['gender'];
//     echo $_SESSION['birthday'];

?>

	<div class="main-container">
		<div class="row">
			<div class="col-sm-12">
			<p style="font-size:2vw;">登録完了</p>
				<hr>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<p class="font-size15">登録完了しました。</p>
			</div>
		</div>

		<a class="btn btn--orange" href="G1-1.php" style="width:20%; margin:2vw 0;"><span style="color:white;">Back to LoginPage</span></a>

	</div>

<style>
.main-container{
    margin:0.5vw 20%;
    text-align:center;
    padding:2vw 1vw;
    border:1vw solid orange;
    border-radius:1vw;
}
hr{
    margin:0.5vw 0;
    padding:0;
}
.font-size1{
    font-size:1.5vw;
}
.par1{
    margin:2vw 0;
}


</style>


<?php require '../old/fotter1.php';?>