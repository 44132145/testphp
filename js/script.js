function ShowPopup(info)
{
    $('.msgWindow').removeClass('hide');
    data = info.split('\n\r');
    //console.log(data);
    $('#msg_price').text('Price :'+data[1]);
    $('#msg_name').text('Name :'+data[0]);
    $('#msg_info').text('Description :'+data[2]);
}