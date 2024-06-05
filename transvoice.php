<html>
<html>
<head>
  <title>Voice-to-Text</title>
  <style>
    body{background:url(back.jpg) no-repeat center center fixed;background-size:cover;}
    p{color:white;}
    .btn{padding-left:47%;}
    .box{background-color:black;opacity:0.7;}
  </style>
</head>
<body>
  <center><h1 style="color:white;">TransVoice</h1></center>
  
  <div class="btn">
    <button id="start-btn">Start</button>
    <button id="stop-btn">Stop</button>
  </div>

  <div class="box">
  <div id="output">
    <p>Transcription:</p>
    <p id="transcription"></p>
  </div>
  </div>

  <script>
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    const recognition = new SpeechRecognition();
    const transcriptionOutput = document.getElementById('transcription');

    recognition.continuous = true; // Enable continuous speech recognition

    recognition.onstart = () => {
      console.log('Voice recognition started...');
    };

    recognition.onerror = (event) => {
      console.error('Speech recognition error detected: ' + event.error);
    };

    recognition.onresult = (event) => {
      const current = event.resultIndex;
      const transcript = event.results[current][0].transcript;
      transcriptionOutput.textContent += transcript;
    };

    document.getElementById('start-btn').addEventListener('click', () => {
      recognition.start();
    });

    document.getElementById('stop-btn').addEventListener('click', () => {
      recognition.stop();
      console.log('Voice recognition stopped.');
    });
  </script>
</body>
</html>