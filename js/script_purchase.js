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
    var num_up_element = document.getElementById(id);

    //最大数より多く購入することを防止
    if(num_up_element.max > num_up_element.value)
        num_up_element.value = parseInt(num_up_element.value) + 1;
    else
        alert('購入可能な数は' + num_up_element.max + '個までです．');
}

function numDown(id){
    var num_down_element = document.getElementById(id);

    //購入数が0未満になることを防止
    if(num_down_element < 1)
        num_down_element.value = parseInt(num_down_element.value) - 1;
    else
        alert('購入数を0未満には設定できません．');
}