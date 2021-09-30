function audioPlay(){
   var dialog_window = document.getElementById("dialog");
   var dialog_back = document.getElementById("dialog-bg");
   var audio = document.getElementById('koharu');

   dialog_window.hidden = true;
   dialog_back.hidden = true;
   audio.play();
}
