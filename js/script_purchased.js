function audioPlay(){
   var dialog_window = document.getElementById("dialog");
   var audio = document.getElementById('koharu');

   audio.play();
   dialog_window.hidden = "true";
}
