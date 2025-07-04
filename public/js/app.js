document.addEventListener('DOMContentLoaded', function(){
    //trigger the toast
    var messages = document.querySelector('.toast');
    if (messages)
    {
        var toast = new bootstrap.Toast(messages, {delay: 3000});
        toast.show();
    }
});