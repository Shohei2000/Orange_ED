<?php session_start()?>
<?php require '../old/header2.php';?>

<?php require 'nav_drawer.php';?>

<?php
    $dictionary_id = $_GET['dictionary_id'];

    $sql=$pdo->prepare('select * from dictionary where dictionary_id = ?');
    $sql->execute([$dictionary_id]);
    foreach ($sql as $row){
        $english_words = $row['english_words'];
        $japanese_words = $row['japanese_words'];
        $syllable = $row['syllable'];
    }
    $like = '%'.$english_words.'%';
?>

<div class="main-container">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-6">
					<?php echo '<span style="font-size:2vw;">',$english_words,'</span>','<span style="font-size:1vw;">とは</span><br>';?>
					<?php echo '意味・読み方・使い方';?>
				</div>
				<div class="col-sm-6" style="text-align:end;">
					<div>
							<select id='voiceList' style="width:50%;"></select>
                            <input type="hidden" id='txtInput' value="<?php echo $english_words;?>">
						<ul>
							<li><a id="btnSpeak" class="fas fa-volume-up icon"></a><br><p style="font-size:0.7vw;">発音を聞く</p></li>
							<?php
							$sql2=$pdo->prepare('select count(*) as count from favorite where user_id = ? and dictionary_id = ?');
							$sql2->execute([$_SESSION['customer']['user_id'],$dictionary_id]);
							foreach($sql2 as $row2){
							    $count = $row2['count'];
							}
							if($count==0){
							    echo '<li><a class="far fa-bookmark icon" href="insert_favorite.php?dictionary_id=',$dictionary_id,'"></a><br><p style="font-size:0.7vw;">単語を追加</p></li>';
							}else{
							    echo '<li><a class="fas fa-bookmark icon" href="delete_favorite.php?dictionary_id=',$dictionary_id,'"></a><br><p style="font-size:0.7vw;">単語を削除</p></li>';
							}
							?>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<label class="main_meaning">主な意味</label>
					<?php echo '<label>',$japanese_words,'</label>';?>
				</div>
			</div>
			<div class="row" style="margin-top:1vw;">
				<div class="col-sm-12">
					<label class="syllable">音節</label>
					<?php echo '<label>',$syllable,'</label>';?>
				</div>
			</div>
			<div class="row" style="margin:1vw 0;">
				<div class="col-sm-6">
					<?php echo '<label>「',$english_words,'」を含む例文一覧<label>'; ?>
				</div>
				<div class="col-sm-6" style="text-align:end">
					<?php
					$sql4=$pdo->prepare('select count(*) as count from exsample where exsample.english_sentences like ?');
					$sql4->execute([$like]);
					foreach($sql4 as $row4){
					    $exsample_count = $row4['count'];
					}
					echo '<label>該当件数：',$exsample_count,'件';
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<label class="exsample">例文</label>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<table>
						<?php
						$sql3=$pdo->prepare('select * from exsample where exsample.english_sentences like ? ');
						$sql3->execute([$like]);

						foreach($sql3 as $row3){
						    $english_sentences = $row3['english_sentences'];
						    $japanese_sentences = $row3['japanese_sentences'];
						    echo '<tr>';
						    echo '<td style="width:90%;">',$english_sentences,'<br>',$japanese_sentences,'</td>';
						    echo '<td class="td-center" style="width:10%;"><a id="btnSpeak" class="fas fa-volume-up" onclick="speak2('?><?php echo "'",$english_sentences,"'";?><?php echo ')"></a></td>';
						    echo '</tr>';
						}
						?>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>

<style>
.main-container{
    height:40vw;
    margin:1% 10% 0 10%;
    padding:2vw;
    border:1px solid lightgray;
    border-radius:2vw;
}
.icon{
    font-size:3vw;
}
.icon:hover{
    text-decoration: none;
}
ul {
  list-style: none;
}
li{
  display:inline-block;
  text-align:center;
  margin:0 0.5vw;
}
.main_meaning,.exsample,.syllable{
    color:white;
    padding:0.2vw 1vw;
    border:1px solid lightgray;
    background-color:#ff9e1f;
}
.exsample{
    padding:0 2vw;
    margin-bottom:0.5vw;
    background-color:#ffdb4f;
}
.syllable{
    color:#595857;
    border-radius:0.5vw;
    background-color:#fde8d0;
}

/* table */
table{
    width:100%;
}
tr,td{
    padding:1vw;
    border:1px solid orange;
    border-style: solid none;
    text-align:left;
}
tr{
    border:1px solid orange;
}
.td-center{
    text-align:center;
}
#voiceList{
    display:none;
}
</style>

    <script>
    speechSynthesis.onvoiceschanged = getVoices;
    document.getElementById('btnSpeak').onclick = speak;//As you push the button,the sound will play

    var voices;

    function getVoices() {
      voices = speechSynthesis.getVoices();
    }

    function speak() {
      var text = "<?php echo $english_words;?>";
      var msg = new SpeechSynthesisUtterance();
      msg.text = text;
      msg.voice = voices[50];//Google US English -> 変更したい場合はsample.phpにセレクトボックスで前表示してるから参照
      speechSynthesis.speak(msg);
    }

    function speak2(text) {
        var msg = new SpeechSynthesisUtterance();
        msg.text = text;
        msg.voice = voices[50];//Google US English -> 変更したい場合はsample.phpにセレクトボックスで前表示してるから参照
        speechSynthesis.speak(msg);
      }
    </script>
<?php require '../old/fotter2.php'?>