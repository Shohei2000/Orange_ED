<!DOCTYPE html>
<meta http-equiv="content-type" charset="utf-8">
<html>
<head>
<title>JavaScriptでクイズアプリを作る</title>
</head>
<body>
<!--タイトル-->
<h1>クイズアプリを作ってみよう！！！</h1>
<!--クイズのの表示-->
<h2 id=”_question”>ここに問題が表示されます。</h2>
<!--回答-->
<ul>
<li id="_ans1">回答１</li>
<li id="_ans2">回答２</li>
<li id="_ans3">回答３</li>
</ul>
<button type="button" id="_answer_1" onclick="Answer_Check(1)">回答1</button>
<button type="button" id="_answer_2" onclick="Answer_Check(2)">回答2</button>
<button type="button" id="_answer_3" onclick="Answer_Check(3)">回答3</button>


<script type="text/javascript">
// 初期画面起動時
var Question = [
["JavaScriptで「Hello World」を正しく表示されないのはどれ？",
"1. document.write('Hello World');",
"2. document.write(Hello World);",
"3. document.write('Hello World')",
"1"],
["JavaScriptで【document.write(5 + 4);】を実行したらどうなる？",
"1. 5 + 4);",
"2. エラーになる",
"3. 9",
"3"],
["JavaScriptで余りを求めるのは？",
"1. /",
"2. %",
"3. @",
"2"]
];

// 初期変数定義
// 問題を表示するオブジェクトを取得する
var Q = document.getElementById('_question');
// 問題を表示するオブジェクトを取得する
var A1 = document.getElementById('_ans1');
var A2 = document.getElementById('_ans2');
var A3 = document.getElementById('_ans3');


// 正解数を保持する値
var Correct = 0;

// 現在の問題数
var Qcnt = 0;

// 取得したテーブルに盤面生成
Q_Set();

// 問題を画面に表示する処理
function Q_Set() {
Q.textContent = Question[Qcnt][0];
A1.textContent = Question[Qcnt][1];
A2.textContent = Question[Qcnt][2];
A3.textContent = Question[Qcnt][3];
};

// 回答ボタンを押したときの処理
function Answer_Check(ans) {
if(ans == Question[Qcnt][4]) {
alert("正解");
Correct++;
} else {
alert("不正解");
}
Qcnt++;
if (Qcnt == Question.length) {
Q.textContent = "問題は以上です。正解数は" + Correct + "でした。";
A1.textContent = "";
A2.textContent = "";
A3.textContent = "";
} else {
Q_Set();
}
}

</script>
</body>
</html>