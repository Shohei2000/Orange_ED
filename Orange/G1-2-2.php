<?php session_start()?>
<?php require '../old/header1.php';?>

<?php
$_SESSION['mail1'] = $_REQUEST['mail1'];
$_SESSION['password1'] = $_REQUEST['password1'];
$_SESSION['name_kanji'] = $_REQUEST['name_kanji1'].$_REQUEST['name_kanji2'];
$_SESSION['nickname'] = $_REQUEST['nickname'];
$_SESSION['birthday'] = $_REQUEST['birth_year'].$_REQUEST['birth_month'].$_REQUEST['birth_day'];
$_SESSION['gender'] = $_REQUEST['gender'];
?>

<div class="main-container">
	<div class="row">
		<div class="col-sm-12">
			<p style="text-align:center; font-size:2vw;">新規登録</p>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<p class="font-size1">下記の項目をご入力の上、確定画面へお進みください。</p>
		</div>
	</div>

	<table border="1">
    			<tr>
    				<td class="td1">メールアドレス<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
        					<?php echo $_REQUEST['mail1'];?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">メールアドレス(確認用)<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
        					<?php echo $_REQUEST['mail2'];?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">パスワード<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
        					<?php echo $_REQUEST['password1'];?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">パスワード(確認用)<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
        					<?php echo $_REQUEST['password2'];?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">お名前<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<?php echo $_REQUEST['name_kanji1'],' ',$_REQUEST['name_kanji2'];?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">ニックネーム<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<?php echo $_REQUEST['nickname'];?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">生年月日<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<?php echo $_REQUEST['birth_year'],'年',$_REQUEST['birth_month'],'月',$_REQUEST['birth_day'],'日';?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">性別</td>
    				<td class="td2">
    					<div class="table_left">
    						<?php echo $_REQUEST['gender'];?>
    					</div>
    				</td>
    			</tr>
	</table>

	<div class="row">
		<div class="col-sm-12" style="text-align:center;">
			<a class="btn btn--orange" style="width:20%;" onclick="history.back()"><span style="color:white;">Back</span></a>
			<a href="G1-2-3.php" class="btn btn--orange" style="width:40%;"><span style="color:white;">Sent</span></a>
		</div>
	</div>
</div>

<style>
span{
    color:red;
}
p{
    font-size:1vw;
}
hr{
    margin:0.5vw 0;
    padding:0;
}
/* ----------------------------- */
.main-container{
    margin:0.5vw 20%;
    padding:2vw 1vw;
    border:1vw solid orange;
    border-radius:1vw;
}
table{
    width:100%;
    margin:0.5vw 0 1vw 0;
}
tr{
    height:4vw;
}
.td1{
    width:25%;
    background-color:lightgray;
    text-align:center;
    font-size:1vw;
}
.td2{
    width:75%;
    font-size:1vw;
}
.table_left{
    margin-left:1vw;
}
.error_message{
    display:none;
}
.font-size1{
    font-size:1vw;
}
/* ----------------------------- */
        .validation{
            display:inline-block;
            position:relative;
            width:auto;
            height:auto;
            margin:0px;
        }
        .absolute{
            bottom:0px;
        }

        .error{
            display:none;
            position:absolute;
            top:-170%;
            font-size:12px;
            background-color:rgba(255,0,0,0.7);
            color:#fff;
            padding:5px;
            text-align:center;
        }

        .error::before{
            content:"";
            position:absolute;
            bottom:-10px;
            left:10px;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 10px 6px 0 6px;
            border-color: rgba(255,0,0,0.7) transparent transparent transparent;
        }
</style>

<?php require '../old/fotter1.php';?>