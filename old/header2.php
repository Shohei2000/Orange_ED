<!DOCTYPE html>
<html lang="en">
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Orange_English</title>

            <!-- bootstrap -->
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <!-- fontawesome -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">
            <!-- jquery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

            <script type="text/javascript" src="./../old/footerFixed.js"></script><!-- footer用JavaScript -->

            <script type="text/javascript" src="./../old/ajax.js"></script><!-- Ajax用JavaScript -->

            <!-- CSS -->
            <link rel="stylesheet" href="./../css/table_style2.css">


			<!-- javascript -->
            <script>
            function open_drawer(){
        		var nav_drawer2 = document.getElementById("nav_drawer2");
            	if(nav_drawer2.style.display=="none"){
            		// noneで非表示
            		nav_drawer2.style.display ="block";
            		nav_drawer1.style.display ="none";
            	}
            }

            function close_drawer(){
        		var nav_drawer1 = document.getElementById("nav_drawer1");
            	if(nav_drawer1.style.display=="none"){
            		// noneで非表示
            		nav_drawer1.style.display ="block";
            		nav_drawer2.style.display ="none";
            	}
            }

            function set_selected(id){
            	document.getElementById( "selected_answer" ).value = id ;
            }

            $(function(){
                history.pushState(null, null, null);
                $(window).on("popstate", function(){
                    history.pushState(null, null, null);
                });
            });

			</script>

        <?php
        $pdo = new PDO('mysql:host=localhost; dbname=Orange_ED; charset=utf8','root');
        ?>

        </head>

        <header>
        	<div class="header-container1">
        		<a href="G2-1.php"><img class="logo" src="../image/mikan_logo2.png"></a>
        		<a href="G1-1.php"><i class="fas fa-sign-in-alt" style="margin:0 1vw; color:white;"></i></a>
        	</div>
        </header>

<style>
header{
    width:100%;
    height:4vw;
    background-color:#ff9e1f;
}
.container{
    text-align:center;
    width:100%;
    height:100%;
}
.logo{
    height:4vw;
}
.header-container1{
    width:100%;
    height:100%;
    position:relative;
}
.logo{
    position:absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  margin: auto;
}
p,label{
    margin:0;
    padding:0;
}

/* ログアウトアイコン */
.fa-sign-in-alt{
    font-size:3vw;
    line-height:4vw;
    float:right;
}

/* ボタンオレンジ１ */
.btn--orange,
a.btn--orange {
  color: #fff;
  background-color: #ff9e1f;
}
.btn--orange:hover,
a.btn--orange:hover {
  color: #fff;
  background: #f56500;
}
</style>

    <body>