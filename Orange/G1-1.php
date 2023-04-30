<?php session_start()?>
<?php require '../old/header1.php';?>

<?php
unset($_SESSION['customer']);
session_destroy();
?>

	<div class="main-container">
		<div class="row">
			<div class="col-sm-12 container1">
				<p class="login_text">Login</p>
				<p class="error_message">※Your password is wrong</p>

				<form action="login-function.php" name="form1" method="post">
					<div class="div_container1">
    					<div style="margin:0 10%; text-align:left;">
    						<p class="print_text1">UserID</p>
    					</div>
    					<input class="textbox1" name="id" type="text">
    				</div>

    				<div class="div_container1">
    					<div style="margin:0 10%; text-align:left;">
    						<p class="print_text1">Password</p>
    					</div>
    					<input class="textbox1" name="password" type="password">
    				</div>

					<a href="javascript:form1.submit()" class="btn btn--orange" style="width:80%;"><span>Login</span></a>
				</form>

				<hr>

				<a href="G1-2-1.php" class="" style="font-size:1vw;">Create your account →</a>

			</div>
		</div>
	</div>

<style>
.main-container{
    margin:5% 37%;
    text-align: center;
}
.container1{
    padding:1vw;
    border:1vw solid orange;
    border-radius:1vw;
    text-align:center;
}
.login_text{
    font-size:2.5vw;
    margin:1vw 0;
}
.error_message{
    display:none;
    font-size:1vw;
    background-color:#ffa8a8;
    border-radius:0.2em;
    margin:1vw 10%;
}
.print_text1{
    font-size:1vw;
}
.textbox1{
    width:80%;
    height:2vw;
}
.div_container1{
    margin:1.5vw 0;
}

/* ------------------------ */
p,lable{
    margin:0;
}
hr{
    margin:1vw 0;
}
a,a:hover,a:active{
    color:black;
}
</style>


<?php require '../old/fotter1.php';?>