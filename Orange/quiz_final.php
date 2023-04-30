<?php session_start();?>

<script>
	var correct_avg = <?php echo $_POST['correct_avg']; ?>;
	console.log(correct_avg);
</script>

<div id="main">
    <div class="main-container" id="main-container">
    	<div class="row">
    		<div class="col-sm-12">
    			<p style="text-align:center; color:orange; font-size:2vw; margin:1vw 0;">Quiz Result</p>
    			<p style="margin:0 10%; font-size:1.5vw;">YOUR SCORE<br><?php echo '<span id="yourscore">',$_SESSION['param'][0],'</span>/<span>',$_SESSION['favorite_count'],'</span>';?></p>
    		</div>
    	</div>
    </div>
</div>

<style>

</style>