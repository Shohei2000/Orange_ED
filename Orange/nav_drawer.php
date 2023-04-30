  <div id="nav_drawer1">
      <i id="nav-open" class="fas fa-angle-double-down" onclick="open_drawer();"></i><!-- 開くアイコン -->
  </div>

  <div id="nav_drawer2" style="display:none;">
  		<div class="row w-100 h-100 no-gutters">
  			<div class="col-sm-5 h-100" style="display:flex; justify-content:center; align-items:center;">
                   <div class="search">
                       <form action="search_dictionary.php" method="post" style="width:100%;" class="search_container">
                          <input class="search_text" type="text" name="search_word" size="25" placeholder="What are you looking for?" list="datalist1"><input type="submit" value="&#xf002">
                          <datalist id="datalist1">
                          	<?php
                          	foreach($pdo->query('select * from dictionary')as $parm){
                          	    echo '<option>';
                          	    echo $parm['english_words'];
                          	    echo '</option>';
                          	}
                          	?>
                          </datalist>
                          <!-- 改行せずにinput同士をつなげると、inputの間が消える -->
                        </form>
                   </div>
             </div>
  			<div class="col-sm-7" style="display:flex; justify-content:flex-end; align-items:center;">
  				<div class="drawer_button">
  					<a href="G2-1.php" class="btn-top-radius">MyDictionary</a>
  				</div>
  				<div class="drawer_button">
  					<a href="G2-2.php" class="btn-top-radius">Show All</a>
  				</div>
  				<div class="drawer_button">
  					<a href="" class="btn-top-radius" onclick="openWin();">Quiz</a>
  				</div>
  				<div id="nav-close" class="icon" onclick="close_drawer();">
					<i class="fas fa-angle-double-up" onclick="close_drawer();" style="margin-right: 3vw;"></i>
  				</div>
  			</div>
  		</div>
  </div>

  <style>
#nav_drawer1,#nav_drawer2{
    background-color:#fad09e;
    border-radius:0 0 20px 20px;
}
#nav_drawer1{
    height:4vw;
    position: relative;
}
#nav_drawer2{
    height:6vw;
}

/*アイコンのスペース*/
#nav-open,#nav-close {
    width:100%;
    font-size:2vw;
    color:white;
}
#nav-open{
    text-align:center;
    bottom:20%;
    position:absolute;
}
#nav-close{
    width:70%;
    text-align:end;
}
left-drawer{
  display: flex;
  justify-content: center;
  align-items: center;
}

.search{
width:100%;
}
.search_container{
  box-sizing: border-box;
  text-align:end;
}
.search_container input[type="text"]{
  background: ghostwhite;
  border: none;
  height: 3vw;
  width:70%;
  padding:1vw;
  font-size:1vw;
}
.search_container input[type="text"]:focus {
  outline: 0;
}
.search_container input[type="submit"]{
  cursor: pointer;
  font-family: FontAwesome;
  border: none;
  background: darkorange;
  color: #fff;
  outline : none;
  width: 3.0em;
  height: 3vw;
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
  font-size:0.8vw;
}

.btn-top-radius:hover {
  background: #ffc25c;
  color: #FFF;
}

/* drawerの中のボタン */
.drawer_button{
width:15%;
margin:0 0 0 1vw;
height:3vw;
display: flex;
align-items: center;
justify-content: center;
}
</style>

<script type="text/javascript">
function openWin() {
	//別窓の左と上の余白を求める
	var w = ( screen.width-640 ) / 2;
	var h = ( screen.height-480 ) / 2;


	//オプションパラメーターleftとtopに余白の値を指定
	window.open("G4-1.php","Quiz","width=640,height=480"
	            + ",left=" + w + ",top=" + h);

// 	window.open(
// 	        "https://programmercollege.jp/",
// 	        "_blank",
// 	        "menubar=0,width=300,height=200,top=100,left=100"
// 	    );
}
</script>