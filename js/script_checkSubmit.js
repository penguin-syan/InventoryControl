function checkSubmit(){
    if(update.key.value == 'updateMenu'){
        return confirm('変更を記録しますか');
    }
    else if(update.key.value == 'deleteMenu'){
        return confirm('メニューを削除しますか');
    }
}