<?php
    session_start();
    $pdo = new PDO('mysql:host=localhost; dbname=Orange_ED; charset=utf8','root');
?>

<div class="main">
    <div class="main-container" id="main-container" style="height:auto; padding:1vw; text-align:left;">

    		<div class="row">
            	<div class="col-sm-12">
            		<input id="buttonBack" type="button" value="Back" onclick="location.href='./G4-1.php'">
            		<?php
            		    echo '<div style="text-align: center; font-size:2vw; font-weight:bold;">';
            		    echo '<p class="result">正解</p>';
            		    echo '</div>';
            		?>
            	</div>
            </div>

            <div class="sub-container">
            	<div class="row">
            		<div class="col-sm-12">
            			<p style="text-align:center; color:orange; font-size:2vw; margin:1vw 0;">Answer.<?php echo $_SESSION['id'];?></p>
            			<p style="margin:0 10%; font-size:1.5vw;"><?php echo $_SESSION['quiz_english'][$_SESSION['id']];?></p>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-sm-12" style="text-align:left;">
            			<?php
            			for($i = 1; $i<5; $i++){//4回繰り返す

                            $sql_p=$pdo->prepare('select * from dictionary where dictionary_id = ?');
                            $sql_p->execute([$_SESSION['save_questions'][$i-1]]);

                            foreach ($sql_p as $row_p){
                                $dictionary_id=$row_p['dictionary_id'];
                                $japanese_words=$row_p['japanese_words'];
                            }

                            if($dictionary_id==$_SESSION['quiz_id'][$_SESSION['id']]){
                                echo '<label style="background-color:#f2a0a1;">
                                    <p style="width:90%;">',$japanese_words,'</p>
                                  </label>';
                            }else{
                                echo '<label>
                                    <p style="width:90%;">',$japanese_words,'</p>
                                  </label>';
                            }

            			}//for文
            			?>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-sm-12">
            			<div class="button_start_div" style="height:3vw; margin:1vw auto;">
            				<input id="ajaxreload_button" type="button" value="Submit" onclick="<?php if($_SESSION['id']<$_SESSION['favorite_count']){
            				                                                                            echo 'buttonClick()';
            				                                                                           }else{
            				                                                                            echo 'buttonClick2()';
            				                                                                           };
            				                                                                    ?>">
            			</div>
            		</div>
            	</div>
            </div>
    </div>
</div>

<?php $_SESSION['id']++; //クイズ番号をプラス１する。?>


<style>
p{
    margin:0;
    padding:0;
}
.sub-container{
    text-align:center;
}
label {
	display: block;
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
	label input { float: left; }
	label p {
		float: left;
		padding-top: 2px;
		width: calc(100% - 24px);
	}
</style>

