var i = 0;

document.getElementById("leftTop").onclick = function(){
    pushButton(1);
}

document.getElementById("leftBottom").onclick = function() {
    pushButton(2);
}

document.getElementById("rightBottom").onclick = function() {
    pushButton(3);
}

function pushButton(num) {
    i *= 10;
    i += num;

    if(i > 100000){
        i = i % 100000;
    }

    if(i === 23221){
        document.getElementById("admin").disabled = "";
        document.getElementById("admin_image").src = "./images/admin.png";
    }

    console.log(i);
}