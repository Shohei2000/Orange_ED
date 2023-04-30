<?php require '../old/header1.php';?>

<div class="main-container">
	<div class="row">
		<div class="col-sm-12">
			<p style="text-align:center; font-size:2vw;">新規登録</p>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<p>下記の項目をご入力の上、確認画面へお進みください。</p>
		</div>
	</div>

	<form action="G1-2-2.php" method="post" name="form1">
    	<table border="1">
        			<tr>
        				<td class="td1">メールアドレス<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
            					<figure class="validation">
            						<input type="text" name="mail1" id="mail" class="input" size="50" required><label class="hide"></label>
        							<figcaption class="absolute"><label id="error_mail" class="error"><span><?php echo $error_msg?></span></label></figcaption>
        						</figure>
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">メールアドレス(確認用)<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
        						<input type="text" size="50" name="mail2" required>
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">パスワード<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
            					<figure class="validation">
            						<input type="password" name="password1" id="pass" class="input" size="30" style="display: table-cell;" required>
            						<figcaption class="absolute"><label id="error_pass" class="error"><span><?php echo $error_msg?></span></label></figcaption>
        						</figure>
        						<label style="font-size: 0.5vw; color:red; margin:0px; ">半角英小文字大文字数字をそれぞれ1種類以上含み、<br>8文字以上入力してください。※記号使用不可</label>
        						<label class="hide"></label>
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">パスワード(確認用)<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
        						<input type="password" size="30" name="password2" required>
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">お名前<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
        						<label class="name">姓</label>
        						<input type="text" size="10" name="name_kanji1" required>
        						<label class="name">名</label>
        						<input type="text" size="10" name="name_kanji2" required>
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">ニックネーム<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
        						<input type="text" size="30" name="nickname" required>
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">生年月日<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
        						<select name="birth_year" required>
        							<?php
        					         echo	'<option value="" selected>西暦</option>';
        							 $i=1920;
        							 while($i<=2020){
        						     echo    '<option value="', $i ,'">', $i, '</option>';
        							 $i++;
        							 }
        							?>
        						</select>
        						<a>年</a>
        						<select name="birth_month" required>
        							<?php
        							 echo	'<option value="" selected></option>';
        							 $i=1;
        							 while($i<=12){
        							    echo    '<option value="', $i,'">', $i,'</option>';
        							    $i++;
        							 }
        							?>
        						</select>
        						<a>月</a>
        						<select name="birth_day" required>
        							<?php
        							echo	'<option value="" selected></option>';
        							 $i=1;
        							 while($i<=31){
        							    echo    '<option value="', $i,'">', $i,'</option>';
        							    $i++;
        							 }
        							?>
        						</select>
        						<a>日</a>
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">性別</td>
        				<td class="td2">
        					<div class="table_left">
        						<a><input type="radio" name="gender" value="0" checked="checked">未選択</a>
            					<a style="margin:0 1em;"><input type="radio" name="gender" value="1">男性</a>
            					<a><input type="radio" name="gender" value="2">女性</a>
        					</div>
        				</td>
        			</tr>
    	</table>

	<div class="row">
		<div class="col-sm-12" style="text-align:center;">
			<p class="error_message">※メールアドレス又はパスワードの確認用が一致しません。</p>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12" style="text-align:center;">
			<a href="G1-1.php" class="btn btn--orange" style="width:20%;"><span style="color:white;">Back</span></a>
			<input type="submit" class="btn btn--orange" style="width:40%;" value="Confirm">
		</div>
	</div>

	</form>

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