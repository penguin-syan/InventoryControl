function audioPlay(){
   //var audio = new Audio("../../audio/01.ogg");
   var dialog_window = document.getElementById("dialog");
   var audio = document.getElementById('koharu');

   audio.play();
   //var sound = new Howl({ src: ['../../audio/01.ogg'] })
   
   //sound.play();
   //audio.play();
   dialog_window.hidden = "true";
}
