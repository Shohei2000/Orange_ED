// ページの一部だけをreloadする方法
// Ajaxを使う方法
// XMLHttpRequestを使ってAjaxで更新
function ajaxUpdate(url, element) {

// urlを加工し、キャッシュされないurlにする。
//    url = url + '?ver=' + new Date().getTime();

    // ajaxオブジェクト生成
    var ajax = new XMLHttpRequest;

    // ajax通信open
    ajax.open('GET', url, true);

    // ajax返信時の処理
    ajax.onload = function () {

        // ajax返信から得たHTMLでDOM要素を更新
        element.innerHTML = ajax.responseText;
    };

    // ajax開始
    ajax.send(null);
}



//var result_array = [];//配列で結果を格納しようとしたけど、なんか違ったからやめて collect_countで代用しました。
var correct_count = 0;

function buttonClick(){
	var url = "./../Orange/quiz.php";
	var div = document.getElementById('main'); // main-containerの属性を引っ張ってくる
	ajaxUpdate(url, div);
}

function buttonClick2(){//quiz_final画面へ遷移する

	$.ajax({
	    type: "GET", //POSTでも可
	    url: "request.php", //送り先
	    data: { 'データ': correct_count }, //渡したいデータ
	    dataType : "json", //データ形式を指定
	    scriptCharset: 'utf-8' //文字コードを指定
	})
	.then(
	    function( param ){ //paramに処理後のデータが入ってる
	        //帰ってきたら実行する処理
	    	console.log(param);
	    	console.log(param[0]);
	    	console.log(param[1]);

	    	if(param[1] < 0.5){
	    		document.getElementById("sound-file-sound1").play();//チーン
	    		console.log('チーン');
	    	}else if(param[1] <=0.75){
	    		document.getElementById("sound-file-weakClappinghands_sound2").play();//拍手弱
	    		console.log('拍手弱');
	    	}else{
	    		document.getElementById("sound-file-strongClappinghands_sound1").play();//拍手強
	    		console.log('拍手強');
	    	}
	    },
	    function( XMLHttpRequest, textStatus, errorThrown ){
	        console.log( errorThrown ); //エラー表示
	});

	var url = "./../Orange/quiz_final.php";
	var div = document.getElementById('main'); // main-containerの属性を引っ張ってくる
	ajaxUpdate(url, div);
	document.getElementById("close_button").style.color = 'black';
}


function showResult(){
	var selected_answer = document.getElementById( "selected_answer" ).value;
	var collect_answer = document.getElementById( "collect_answer" ).value;

	var url1 = "./../Orange/result_collect.php";
	var url2 = "./../Orange/result_wrong.php";
	var url3 = "./../Orange/result_warning.php";

	var div = document.getElementById('result'); // resultの属性を引っ張ってくる 正解/不正解を表示するところ

	if(selected_answer==collect_answer){
		ajaxUpdate(url1, div);
		switch_button();
		document.getElementById("sound-file-correct").play();//正解の音を出す
		document.getElementById("label_collectAnswer").style.backgroundColor = '#a4d5bd';//正しい選択肢の背景を緑に変更
		disable_radio();//選択肢のラジオボタン選択をdisableする
		correct_count = correct_count + 1;
		console.log(correct_count);

	}else if(selected_answer==""){
		document.getElementById("sound-file-warning").play();//エラー音を出す
		ajaxUpdate(url3, div);

	}else{
		ajaxUpdate(url2, div);
		switch_button();
		document.getElementById("sound-file-wrong").play();//不正解の音を出す
		document.getElementById("label_collectAnswer").style.backgroundColor = '#f2a0a1';//正しい選択肢の背景を赤に変更
		disable_radio();
//		result_array = false;//result_arrayを実装しようとしてた名残
	}
}

function disable_radio(){//選択肢をラジオボタン→テキストに変更
	var choice = document.getElementsByClassName('choices');
	for(var i = 0; i < choice.length; i++){
		choice[i].style.display = "none";
	}//for文
}

function switch_button(){//buttonの表示切り替え Submit→Next
	shownext_button.style.display ="inline";//Nextボタンを表示する
	ajaxreload_button.style.display ="none";//Submitボタンを非表示にする
}



