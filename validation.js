$(function(){

    var error = [];

    $('#btn_confirm').on('click',function(){
        if($('#name').val() === '' || $('#name').val().length > 10){
            error.push('氏名は必須入力です。10文字以内でご入力ください。');
        }

        if($('#kana').val() === '' || $('#kana').val().length > 10){
            error.push('フリガナは必須入力です。10文字以内でご入力ください。');
        }

        if($('#tel').val() != '' && !$('#tel').val().match(/^[0-9]+$/)){
            error.push('電話番号は0-9の数字のみでご入力ください。');
        }

        if($('#email').val() === '' || !$('#email').val().match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$/)){
            error.push('メールアドレスは正しくご入力ください。');
        }

        if($('#body').val() === ''){
            error.push('お問い合わせ内容は必須入力です。');
        }

        if(error.length != 0){
            alert(error.join('\n'));
        }

    });

    $('#delete').click(function(){
        if(!confirm('削除してもよろしいですか?')){
            return false;
        }else{
            
        }
    });
});