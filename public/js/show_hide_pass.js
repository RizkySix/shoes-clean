$(document).ready(function(){
    var pw = document.querySelectorAll(".thePW");
    $('.hide-eye').click(function(){
        
        for (let i = 0; i < pw.length; i++) {
            pw[i].type = "text";
          }
      
        $('.hide-eye').css('display' , 'none');
        $('.show-eye').css('display' , 'block');
    })

    $('.show-eye').click(function(){

        for (let i = 0; i < pw.length; i++) {
            pw[i].type = "password";
          }

        $('.hide-eye').css('display' , 'block');
        $('.show-eye').css('display' , 'none');
    })
})