<?php session_start()?>
<?php require '../old/header1.php';?>


	<?php
    	$id=$_REQUEST['id'];
    	$password=$_REQUEST['password'];

	if(!($id=="" || $password=="")){
	    $sql=$pdo->prepare('select * from customer where pass=? and mail_address=?');
	    $sql->execute([$password,$id]);

	    foreach($sql as $row){
	        $_SESSION['customer']=[
                'user_id'=>$row['user_id'],
	            'mail_address'=>$row['mail_address'],
	            'name'=>$row['name'],
	            'nickname'=>$row['nickname'],
	            'gd_class'=>$row['gd_class'],
	            'birthday'=>$row['birthday']
            ];
	    }

	    if(isset($_SESSION['customer'])){
// 	        echo $_SESSION['customer']['user_id'],"<br>";
// 	        echo $_SESSION['customer']['mail_address'],"<br>";
// 	        echo $_SESSION['customer']['name'],"<br>";
// 	        echo $_SESSION['customer']['nickname'],"<br>";
// 	        echo $_SESSION['customer']['gd_class'],"<br>";
// 	        echo $_SESSION['customer']['birthday'],"<br>";

    ?>
            <script>location.href="G2-1.php"</script>

            <?php

	    }else{
	        ?>
            <script>location.href=history.back()</script>
            <?php
	    }

	}else{//ID又はパスワードが未入力だった場合
	    ?>
        <script>location.href=history.back()</script>
        <?php
	}

	?>