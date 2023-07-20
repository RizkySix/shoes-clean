$(document).ready(function(){
    $('.for_money').keyup(function(event) {

        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40) return;
    
        // format number
        $(this).val(function(index, value) {
          return value
          .replace(/\D/g, "")
          .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
          ;
        });
        });
    
        const uang =  document.querySelector(".for_money")
        uang.addEventListener("keypress", function (evt) {
        if (evt.which < 48 || evt.which > 57)
        {
            evt.preventDefault();
        }
        });
})