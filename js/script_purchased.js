function loaded(){
    var dialog = document.querySelector('dialog');

    dialog.show();
}

function audioPlay(){
    var audio = new Audio("../../audio/01.ogg");
    var dialog = document.querySelector('dialog');

    audio.play();
    dialog.close();
}
