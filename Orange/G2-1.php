<?php session_start()?>
<?php require '../old/header2.php';?>
<?php require 'nav_drawer.php';?>

<div class="main-container">
	<div class="row row1">
		<div class="col-sm-6">
			<p><?php echo $_SESSION['customer']['nickname']; ?>'s Dictionary</p>
		</div>
		<div class="col-sm-6">
			<?php
			$sql=$pdo->prepare('select count(*) as row_count from favorite where user_id = ?');
			$sql->execute([$_SESSION['customer']['user_id']]);
			foreach ($sql as $row){
			    $row_count = $row['row_count'];
			}
			?>
			<p style="text-align:end;"><?php echo $row_count?>Words</p>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<table>
				<tr>
					<th class="th1">No.</th>
					<th class="th2">English</th>
					<th class="th3">Japanese</th>
					<th class="th4">Exsample</th>
					<th class="th5">Pro</th>
					<th class="th6">Remove</th>
				</tr>
				<?php
				    $sql=$pdo->prepare('select * from dictionary inner join favorite on dictionary.dictionary_id = favorite.dictionary_id where favorite.user_id = ?');
				    $sql->execute([$_SESSION['customer']['user_id']]);
				    $favorite_count = 1;


                    echo '<tr>';
                    foreach ($sql as $row){
                        $dictionary_id = $row['dictionary_id'];
                        $english_words = $row['english_words'];
                        $japanese_words = $row['japanese_words'];

                        $like = '%'.$english_words.'%';

                        $sql2=$pdo->prepare('select exsample_id,english_sentences,count(*) as count from exsample where exsample.english_sentences like ? limit 1');
                        $sql2->execute([$like]);
                        foreach ($sql2 as $row2){
                            if($row2['count']==0){
                                $english_sentences='';
                            }else{
                                $english_sentences = $row2['english_sentences'];
                            }
                        }

                        echo '<td >'.$favorite_count.'</td>';
                        echo '<td ><a href="G3-1.php?dictionary_id=',$dictionary_id,'">'.$english_words.'</a></td>';
                        echo '<td >'.$japanese_words.'</td>';
                        echo '<td >'.$english_sentences.'</td>';
                        echo '<td ><a id="btnSpeak" class="fas fa-volume-up" onclick="speak('?><?php echo "'",$english_words,"'";?><?php echo ')"></a></td>';
                        echo '<td ><a class="far fa-trash-alt" href="delete_favorite.php?dictionary_id=',$dictionary_id,'"></a></td>';
                        echo '</tr>';

                        $favorite_count = $favorite_count + 1;
                    }
				?>
			</table>
		</div>
	</div>
</div>

<style>
    .main-container{
        margin:0 5%;
    }
/*     row1 */
    .row1{
        margin:1vw 0;
        font-size:2vw;
        font-family:cursive;
    }
</style>

    <script>
    speechSynthesis.onvoiceschanged = getVoices;
//     document.getElementById('btnSpeak').onclick = speak;//As you push the button,the sound will play

    var voices;

    function getVoices() {
      voices = speechSynthesis.getVoices();
    }

    function speak(text) {
      var msg = new SpeechSynthesisUtterance();
      msg.text = text;
      msg.voice = voices[50];//Google US English -> 変更したい場合はsample.phpにセレクトボックスで前表示してるから参照
      speechSynthesis.speak(msg);
    }
    </script>

<?php require '../old/fotter2.php';?>