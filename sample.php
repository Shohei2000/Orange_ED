<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
</head>
<body>

    Select Voice: <select id='voiceList'></select> <br><br>

    <input type="hidden" id='txtInput' value="This is an apple" /> <br><br>
    <button id='btnSpeak'>Speak!</button>

    <script>
    	var text1 = 'This is an apple';
        var txtInput = document.querySelector('#txtInput');
        var voiceList = document.querySelector('#voiceList');
        var btnSpeak = document.querySelector('#btnSpeak');
        var synth = window.speechSynthesis;
        var voices = [];

        PopulateVoices();
        if(speechSynthesis !== undefined){
            speechSynthesis.onvoiceschanged = PopulateVoices;
        }

        btnSpeak.addEventListener('click', ()=> {
            var toSpeak = new SpeechSynthesisUtterance(txtInput.value);
            var selectedVoiceName = voiceList.selectedOptions[0].getAttribute('data-name');
            voices.forEach((voice)=>{
                if(voice.name === selectedVoiceName){
                    toSpeak.voice = voice;
                }
            });
            synth.speak(toSpeak);
        });

        function PopulateVoices(){
            voices = synth.getVoices();
            var selectedIndex = voiceList.selectedIndex < 0 ? 0 : voiceList.selectedIndex;
            var count = 1;
            voiceList.innerHTML = '';
            voices.forEach((voice)=>{
                var listItem = document.createElement('option');
                listItem.textContent = voice.name+count;
                listItem.setAttribute('data-lang', voice.lang);
                listItem.setAttribute('data-name', voice.name);
                voiceList.appendChild(listItem);
                count++;
            });

            voiceList.selectedIndex = selectedIndex;
        }
    </script>

</body>
</html>