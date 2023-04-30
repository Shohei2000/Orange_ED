<?php session_start()?>
<?php require '../old/header3.php';?>

<?php

$_SESSION['quiz_id'] = array();
$_SESSION['english_words'] = array();
$_SESSION['japanese_words'] = array();

$_SESSION['id']=1;

$quiz_sql=$pdo->prepare('select * from favorite inner join dictionary on favorite.dictionary_id = dictionary.dictionary_id where favorite.user_id = ?');
$quiz_sql->execute([$_SESSION['customer']['user_id']]);
foreach ($quiz_sql as $quiz_row){
    $_SESSION['dictionary_id'][$_SESSION['id']] = $quiz_row['dictionary_id'];
    $_SESSION['english_words'][$_SESSION['id']] = $quiz_row['english_words'];
    $_SESSION['japanese_words'][$_SESSION['id']] = $quiz_row['japanese_words'];
    $_SESSION['id']++;

//     $_SESSION['english_words'][] = $quiz_row['english_words'];
//     $_SESSION['japanese_words'][] = $quiz_row['japanese_words'];
//     var_dump($_SESSION['quiz_id']['dictionary_id'],$_SESSION['quiz_id']['english_words'],$_SESSION['quiz_id']['japanese_words'],'<br>');
}

$_SESSION['id']=1;

$favorite_sql=$pdo->prepare('select *,count(*) as count from favorite where user_id = ?');
$favorite_sql->execute([$_SESSION['customer']['user_id']]);
foreach ($favorite_sql as $favorite_row){
    $_SESSION['favorite_count']=$favorite_row['count'];
}

$used_number = array();//$used_number配列の作成
$result = array();
$flg = true;

?>

<?php require '../old/sound.php';?><!-- 効果音ファイル -->

<div id="main">
    <div class="main-container" id="main-container">
    	<div class="row">
    		<div class="col-sm-12">
    			<p style="text-align:center; color:orange; font-size:2vw; margin:1vw 0;">Quiz</p>
    			<p style="margin:0 10%; font-size:1.5vw;">You will see the questions from your dictionary.<br>If you are ready, please push the button to start.</p>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-sm-12">
    			<div class="button_start_div">
    				<input id="ajaxreload_button" type="button" value="Start" onclick="buttonClick()">
    			</div>
    		</div>
    	</div>
    </div>
</div>

<style>
.main-container{
    min-height:30vw;
    height:auto;
    margin:5% 15%;
    padding: 8% 0;
    text-align:center;

    border:1px solid orange;
    border-radius:1vw;
}
.button_start_div{
    width:30%;
    height:3vw;
    margin:5% auto;
}
.button_start{
    color:white;
    line-height:3vw;
}

/* 上だけ角丸ボタン */
.btn-top-radius {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;

  font-weight: bold;
  padding: 8px 10px 5px 10px;
  text-decoration: none;
  color: #FFA000;
  background: #fff1da;
  border-bottom: solid 4px #FFA000;
  border-radius: 15px 15px 0 0;
  transition: .4s;
  width:100%;
  height:3vw;
  font-size:1vw;
}

.btn-top-radius:hover {
  background: #ffc25c;
  color: #FFF;
}
</style>
<?php require '../old/fotter3.php';?>
