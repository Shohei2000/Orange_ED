<?php session_start()?>
<?php require 'old/header1.php';?>
<?php require 'old/array.php';?>

	<?php
	if(isset($_POST['check'])){
	    check('G2-1-4.php',$pdo,false);
	}

	//バリデーションエラーメッセージ
	$error_msg="形式が正しく<br>ありません。";

	//表示しやすい形式に変換S
 	$name_kanji = preg_split("/\s/",$_SESSION['customer']['name']);       //preg_sprit("/\s/",____ )に変更 \sが半角スペース
	$name_kana = preg_split("/\s/",$_SESSION['customer']['furigana']);    //同上
	$birth_year = date('Y',strtotime($_SESSION['customer']['birthday']));
	$birth_month = date('m',strtotime($_SESSION['customer']['birthday']));
	$birth_day = date('d',strtotime($_SESSION['customer']['birthday']));
	$zip_code = preg_split("/-/",$_SESSION['customer']['zip_code']);
	$tell = preg_split("/-/",$_SESSION['customer']['tell']);
	?>

	<div class="container1">
		<p style="font-size:2em; text-align:center;">会員情報編集</p>
	</div>

	<form action="G2-1-3.php" method="post" name="form">
    	<div class="container2">
    		<table border="1">
    			<tr>
    				<td class="td1">メールアドレス<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
        					<figure class="validation">
        						<input type="text" name="mail1" value="<?php echo escape($_SESSION['customer']['mail_address']);?>" id="mail" class="input" size="50"><label class="hide">完成後削除　/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/　styleタグに隠すためのCSSあります</style></label>
    							<figcaption class="absolute"><label id="error_mail" class="error"><span><?php echo $error_msg?></span></label></figcaption>
    						</figure>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">メールアドレス(確認用)<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="text" size="50" name="mail2" value="<?php echo escape($_SESSION['customer']['mail_address']);?>">
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">パスワード<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
        					<figure class="validation">
        						<input type="password" name="password1"  value="<?php echo escape($_SESSION['customer']['pass']);?>" id="pass" class="input" size="30" style="display: table-cell;">
        						<figcaption class="absolute"><label id="error_pass" class="error"><span><?php echo $error_msg?></span></label></figcaption>
    						</figure>
    						<label style="font-size: 0.5rem; color:red; margin:0px; ">半角英小文字大文字数字をそれぞれ1種類以上含み、<br>8文字以上入力してください。※記号使用不可</label>
    						<label class="hide">完成後削除　/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}$/</label>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">パスワード(確認用)<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="password" size="30" name="password2" value="<?php echo escape($_SESSION['customer']['pass']);?>">
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">お名前<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<lable class="name">姓</lable>
    						<input type="text" size="10" name="name_kanji1" value="<?php echo escape($name_kanji[0]);?>">
    						<lable class="name">名</lable>
    						<input type="text" size="10" name="name_kanji2" value="<?php echo escape($name_kanji[1]);?>">
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">フリガナ<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<lable class="name">姓</lable>
    						<input type="text" size="10" name="name_kana1" value="<?php echo escape($name_kana[0]);?>">
    						<lable class="name">名</lable>
    						<input type="text" size="10" name="name_kana2" value="<?php echo escape($name_kana[1]);?>">
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">生年月日<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<select name="birth_year">
    							<?php
    					         echo	'<option value='.$birth_year.' selected>'.$birth_year.'</option>';
    							 $i=1920;
    							 while($i<=2020){
    						     echo    '<option value="', $i ,'">', $i, '</option>';
    							 $i++;
    							 }
    							?>
    						</select>
    						<a>年</a>
    						<select name="birth_month">
    							<?php
    							 echo	'<option value='.$birth_month.' selected>'.$birth_month.'</option>';
    							 $i=1;
    							 while($i<=12){
    							    echo    '<option value="', $i,'">', $i,'</option>';
    							    $i++;
    							 }
    							?>
    						</select>
    						<a>月</a>
    						<select name="birth_day">
    							<?php
    							echo	'<option value='.$birth_day.' selected>'.$birth_day.'</option>';
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
    				<td class="td1">郵便番号<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
        					<figure class="validation">
        						<input type="text" name="postcode1"  value="<?php echo escape($zip_code[0]);?>" id="postcode1" class="input" size="6">
        						<figcaption class="absolute"><label id="error_postcode1" class="error"><span><?php echo $error_msg?></span></label></figcaption>
    						</figure>
    						<label>-</label>
    						<figure class="validation">
    							<input type="text" name="postcode2"  value="<?php echo escape($zip_code[1]);?>" id="postcode2" class="input" size="8">
    							<figcaption class="absolute"><label id="error_postcode2" class="error"><span><?php echo $error_msg?></span></label></figcaption>
							</figure>
							<label>○○○-○○○○</label>
							<label class="hide">完成後削除　/^\d{3}$/　ハイフン　/^\d{4}$/</label>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">都道府県<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<select name="pref_id">
                                <option value="<?php echo $_SESSION['customer']['prefecture_id']?>" selected><?php echo $pref_ary[$_SESSION['customer']['prefecture_id']]?></option>
                                <option value="1">北海道</option>
                                <option value="2">青森県</option>
                                <option value="3">岩手県</option>
                                <option value="4">宮城県</option>
                                <option value="5">秋田県</option>
                                <option value="6">山形県</option>
                                <option value="7">福島県</option>
                                <option value="8">茨城県</option>
                                <option value="9">栃木県</option>
                                <option value="10">群馬県</option>
                                <option value="11">埼玉県</option>
                                <option value="12">千葉県</option>
                                <option value="13">東京都</option>
                                <option value="14">神奈川県</option>
                                <option value="15">新潟県</option>
                                <option value="16">富山県</option>
                                <option value="17">石川県</option>
                                <option value="18">福井県</option>
                                <option value="19">山梨県</option>
                                <option value="20">長野県</option>
                                <option value="21">岐阜県</option>
                                <option value="22">静岡県</option>
                                <option value="23">愛知県</option>
                                <option value="24">三重県</option>
                                <option value="25">滋賀県</option>
                                <option value="26">京都府</option>
                                <option value="27">大阪府</option>
                                <option value="28">兵庫県</option>
                                <option value="29">奈良県</option>
                                <option value="30">和歌山県</option>
                                <option value="31">鳥取県</option>
                                <option value="32">島根県</option>
                                <option value="33">岡山県</option>
                                <option value="34">広島県</option>
                                <option value="35">山口県</option>
                                <option value="36">徳島県</option>
                                <option value="37">香川県</option>
                                <option value="38">愛媛県</option>
                                <option value="39">高知県</option>
                                <option value="40">福岡県</option>
                                <option value="41">佐賀県</option>
                                <option value="42">長崎県</option>
                                <option value="43">熊本県</option>
                                <option value="44">大分県</option>
                                <option value="45">宮崎県</option>
                                <option value="46">鹿児島県</option>
                                <option value="47">沖縄県</option>
							</select>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">市区郡町村<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="text" size="30" name="address1" value="<?php echo escape($_SESSION['customer']['city']);?>">
							<a>○○市○○区</a>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">番地<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="text" size="30" name="address2" value="<?php echo escape($_SESSION['customer']['house_number']);?>">
							<a>○番地○-○</a>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">ビル名</td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="text" size="30" name="address3" value="<?php echo escape($_SESSION['customer']['building']);?>">
							<a>○○ビル</a>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">電話番号<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
        					<figure class="validation">
        						<input type="text" name="phone1" value="<?php echo escape($tell[0]);?>" id="phone1" class="input" size="10">
        						<figcaption class="absolute"><label id="error_phone1" class="error"><span><?php echo $error_msg?></span></label></figcaption>
    						</figure>
    						<label>-</label>
        					<figure class="validation">
        						<input type="text" name="phone2" value="<?php echo escape($tell[1]);?>" id="phone2" class="input" size="10">
        						<figcaption class="absolute"><label id="error_phone2" class="error"><span><?php echo $error_msg?></span></label></figcaption>
        					</figure>
        					<label>-</label>
        					<figure class="validation">
        						<input type="text" name="phone3" value="<?php echo escape($tell[2]);?>" id="phone3" class="input" size="10">
        						<figcaption class="absolute"><label id="error_phone3" class="error"><span><?php echo $error_msg?></span></label></figcaption>
    						</figure>
    						<label class="hide">完成後削除　/^\d{2,4}$/　ハイフン　/^\d{2,4}$/　ハイフン　/^\d{4}$/</label>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">性別</td>
    				<td class="td2">
    					<div class="table_left">
    						<a><input type="radio" name="gender" value="0" <?php echo $_SESSION['customer']['gd_class'] == 0 ? 'checked':'' ?>>未選択</a>
        					<a style="margin:0 1em;"><input type="radio" name="gender" value="1" <?php echo $_SESSION['customer']['gd_class'] == 1 ? 'checked':'' ?>>男性</a>
        					<a><input type="radio" name="gender" value="2" <?php echo $_SESSION['customer']['gd_class'] == 2 ? 'checked':'' ?>>女性</a>
    					</div>
    				</td>
    			</tr>

    		</table>
    	</div>

    	<div class="container3" style="text-align:center;">
			<input type="hidden" name="success_url" value="G2-1-4.php">
			<input type="hidden" name="signup" value=false>
    		<input class="button" id="button"  name="check" type="submit" value="確認" style="background-color:#0075c2;" onclick=""><!-- function.php内の、if(isset($_POST['check']))によりfunction check()起動 -->
    	</div>
	</form>

	<!-- バリデーションのscript -->
	 <script id="rendered-js">

		 //input textのid別正規表現
        const ptn_ary={
            ['mail']:/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/,
            ['pass']:/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}$/,
            ['postcode1']:/^\d{3}$/,
            ['postcode2']:/^\d{4}$/,
            ['phone1']:/^\d{2,4}$/,
            ['phone2']:/^\d{2,4}$/,
            ['phone3']:/^\d{4}$/
        };

 		//各input textに対応したエラーメッセージのid
        const id_ary={
            ['mail']:'#error_mail',
            ['pass']:'#error_pass',
            ['postcode1']:'#error_postcode1',
            ['postcode2']:'#error_postcode2',
            ['phone1']:'#error_phone1',
            ['phone2']:'#error_phone2',
            ['phone3']:'#error_phone3'
        }

        //すべてのバリデーションがtrueになっているか判別する　1=true,0=false
        let flg ={
            ['mail']:1,
            ['pass']:1,
            ['postcode1']:1,
            ['postcode2']:1,
            ['phone1']:1,
            ['phone2']:1,
            ['phone3']:1
        };

        //エラーメッセージの表示
        function showErrMsg(target) {
            target.fadeIn();
            setTimeout(function () {
            	target.fadeOut();
            }, 3000);
        }

		//class="input"の要素がフォーカスを失ったとき実行
        $(".input").on("blur", function () {
            let id = $(this).attr('id');	//フォーカスを失った要素のidを取得
            let ptn = ptn_ary[id];			//取得したidに対応した正規表現を取得
            let error_id = id_ary[id];      //取得したidに対応したエラーメッセージのidを取得
            let input = $(this).val();      //フォーカスを失った要素のValue値を取得
            //value値と正規表現がマッチするか
            if (!ptn.test(input)) {
                //マッチしない
                showErrMsg($(error_id));
                flg[id] = 0; //false
            }else{
                //マッチする
            	flg[id]=1; //true
        	}
		    //flg要素内がすべて「1」か判定
            if(flg['mail']+flg['pass']+flg['postcode1']+flg['postcode2']+flg['phone1']+flg['phone2']+flg['phone3']==7){
                $("#button").prop('disabled',false); //#buttonを無効化
                document.getElementById("button").style.backgroundColor = "#0075c2"; //#buttonの色を変更
            }else{
                $("#button").prop('disabled',true); //#buttonを有効化
                document.getElementById("button").style.backgroundColor = "gray"; //#buttonの色を変更
            }
        });
	</script>


                            <!-- デザイン -->
	<style>
/* 	   正規表現を消す */
 	   .hide{
  	       display:none;
  	   }

	   .container1{
	       color:gray;
	       margin: 1em 10% 0 10%;
	   }

	   .container2{
	       text-align:center;
	       margin:0 10%;
	   }

	   .container3{
	       margin:3em 0 3em 0;
	   }

        table{
            width:100%;
        }

        td{
            height:2.5em;
        }

	   .td1{
	       width:30%;
	       text-align:center;
	       background-color:silver;
	   }

	   .td2{
	       width:70%;
	   }

	   	.button{
    	   width:20%;
    	   padding: 0.5em 0em;
    	   font-size:1em;
    	   background-color:black;
    	   color:white;
    	   border-radius:0.5em;
    	   border:0;
	   }

	   .table_left{
	       text-align:left;
	       margin-left:1em;
	   }

	   .name{
	       margin:0 0.5em;
	   }

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

<?php require 'old/fotter2.php';?>