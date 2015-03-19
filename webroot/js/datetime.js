function ajaxpage(){
    var visitortime = new Date();
    var key = visitortime.getTimezoneOffset()/-60;
    $.ajax({
        url: 'timezone',
        data: 'time=' + key,
        type: 'get',
        success: function (res) {
           // alert('time sent');
        }
    });
}