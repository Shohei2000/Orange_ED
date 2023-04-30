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