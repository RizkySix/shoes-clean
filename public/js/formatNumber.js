$(document).ready(function(){
    $('.for_phone').keyup(function(event) {

        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40) return;
    
        // format number
        $(this).val(function(index, value) {
          return value
          .replace(/\D/g, "")
          .replace(/\B(?=(\d{3})+(?!\d))/g, "-")
          ;
        });
        });
    
        const no_hp =  document.querySelector(".for_phone")
        no_hp.addEventListener("keypress", function (evt) {
        if (evt.which < 48 || evt.which > 57)
        {
            evt.preventDefault();
        }
        });


})

   