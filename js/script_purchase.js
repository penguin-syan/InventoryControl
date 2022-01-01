function addItem(id, item_name, max_item_num){
    //購入内容にitemがあるなら数量増加，ないならitemを追加する．
    if(document.getElementById(id + "n") == null){
        $('form').append('<div class="basket-item" id="basket-item-' + id + '"></div>');
        $('#basket-item-' + id).append(
            '<h3>' + item_name + '</h3>',
            '<div class="basket-item-counter" id = "basket-item-counter-' + id + '"></div>');
        $('#basket-item-counter-' + id).append(
            '<input type="button" value="-" onclick="numDown(\'' + id + 'n\');">',
            '<input type="number" class="inputText" value="1" id="' + id + 'n" name="' + id + 'n" min="0" max="' + max_item_num + '"></input>',
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