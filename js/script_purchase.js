function addItem(id, item_name){
    //購入内容にitemがあるなら数量増加，ないならitemを追加する．
    if(document.getElementById(id + "n") == null){
        $('.right_area').append('<div class="basket-item" id="basket-item-' + id + '"></div>');
        $('#basket-item-' + id).append(
            '<h3>' + item_name + '</h3>',
            '<div class="basket-item-counter" id = "basket-item-counter-' + id + '"></div>');
        $('#basket-item-counter-' + id).append(
            '<input type="button" value="-" onclick="numDown(\'' + id + 'n\');">',
            '<input type="tel" value="1" id="' + id + 'n" class="inputText" readonly></input>',
            //'<input type="number" class="inputText" value="0" id="1n" name="1n" min="0" max="96"></input>',
            '<input type="button" value="+" onclick="numUp(\'' + id + 'n\');">'
        );
    }
    else{
        numUp(id + 'n');
    }
}

function numUp(id){
    document.getElementById(id).value = parseInt(document.getElementById(id).value) + 1;
}

function numDown(id){
    document.getElementById(id).value = parseInt(document.getElementById(id).value) - 1;
}