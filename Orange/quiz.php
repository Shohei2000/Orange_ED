<?php
session_start();
$pdo = new PDO('mysql:host=localhost; dbname=Orange_ED; charset=utf8', 'root');

// dictionaryの件数を取得、ランダム変数に活用する。
$sql_count = $pdo->prepare('select count(*) as count from dictionary');
$sql_count->execute();
foreach ($sql_count as $row_count) {
    $count = $row_count['count'];
}
?>

<div class="main">
	<input id="selected_answer" type="hidden" value="">
	<!-- どの問題を選んだかをJavascriptで格納する -->

	<div class="main-container" id="main-container"
		style="min-height: 30vw; height: auto; margin: 3% 15%; padding: 1vw; text-align: left;">

		<div class="row">
			<div class="col-sm-12">
				<input id="buttonBack" type="button" value="Back"
					onclick="location.href='./G4-1.php'">
				<p style="display: inline; float: right;"><?php echo $_SESSION['id'],'/',$_SESSION['favorite_count'],'問中';?></p>
				<div id="result"
					style="text-align: center; font-size: 2vw; font-weight: bold;">
					<!-- Submitボタン投下後、正解or不正解が表示される(Ajax) -->
				</div>
			</div>
		</div>

		<div class="sub-container">
			<div class="row">
				<div class="col-sm-12">
					<p
						style="text-align: center; color: orange; font-size: 2vw; margin: 1vw 0;">Question.<?php echo $_SESSION['id'];?></p>
					<p style="margin: 0 10%; font-size: 1.5vw;"><?php echo $_SESSION['english_words'][$_SESSION['id']];?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12" style="text-align: left;">
            			<?php
            $min = 1;
            $max = 4;
            $rand = rand($min, $max);

            for ($j = 1; $j <= $count; $j ++) { // 1~最大の辞書ID
                $used_number[$j] = true; // 初期値でtrueを格納する
            }

            for ($i = 1; $i < 5; $i ++) { // 4回繰り返す
                if ($i == $rand) {
                    echo '<label id="label_collectAnswer">
                             <input class="choices" type="radio" name="answer" value="', $_SESSION['dictionary_id'][$_SESSION['id']], '" onclick="set_selected(', $_SESSION['dictionary_id'][$_SESSION['id']], ');" style="margin:1vw 1vw 1vw 0";>
                             <p style="width:90%;">', $_SESSION['japanese_words'][$_SESSION['id']], '</p>
                           </label>';
                    echo '<input id="collect_answer" type="hidden" value="', $_SESSION['dictionary_id'][$_SESSION['id']], '">';
                    continue;
                }

                $min2 = 1;
                $max2 = $count;

                // 選択肢被り防止の為の処理
                // あえて最初に、$rand2に該当問題のidを格納する
                $rand2 = $_SESSION['dictionary_id'][$_SESSION['id']];
                $used_number[$_SESSION['dictionary_id'][$_SESSION['id']]] = false; // 該当問題の辞書idにはfalseを入れる
                $flg = true;

                while ($flg == true) {
                    $rand2 = rand($min2, $max2);
                    while ($used_number[$rand2] == false) { // $used_number[$rand2]がfalse -> 既に使用されていたら
                        $rand2 = rand($min2, $max2); // 再度random取得
                    }
                    $used_number[$rand2] = false;
                    $flg = false;
                }

                $sql_radio = $pdo->prepare('select * from dictionary where dictionary_id = ?');
                $sql_radio->execute([
                    $rand2
                ]);
                foreach ($sql_radio as $row_radio) {
                    $dictionary_id = $row_radio['dictionary_id'];
                    $japanese_words = $row_radio['japanese_words'];
                }

                echo '<label><input class="choices" type="radio" name="answer" value="', $dictionary_id, '" style="margin:1vw 1vw 1vw 0"; onclick="set_selected(', $dictionary_id, ');">
                                    <p style="width:90%;">', $japanese_words, '</p>
                                  </label>';
            }
            ?>


            		</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="button_start_div"
						style="height: 3vw; margin: 1vw auto;">
						<input id="ajaxreload_button" type="button" value="Submit"
							onclick="showResult()"> <input id="shownext_button" type="button"
							value="Next" style="display: none;"
							onclick="<?php

if ($_SESSION['id'] < $_SESSION['favorite_count']) {
        echo 'buttonClick()';
    } else {
        echo 'buttonClick2()';
    }
    ;
    ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $_SESSION['id']++; //クイズ番号をプラス１する。?>

<style>
p {
	margin: 0;
	padding: 0;
}

.sub-container {
	text-align: center;
}

label {
	display: flex;
	align-items: center;
	background-color: #ffc;
	margin: 10px;
	padding: 10px;
	text-align: left;
}

label:after {
	content: "";
	clear: both;
	display: block;
}

label input {
	float: left;
}

label p {
	float: left;
	padding-top: 2px;
	width: calc(100% - 24px);
}

#choices {
	display: inline;
}
</style>

