var inputNome = document.querySelector("#nome");

inputNome.addEventListener("keypress", function(e) {
    var keyCode = (e.keyCode ? e.keyCode : e.which);
  
    if (keyCode > 47 && keyCode < 58) {
        e.preventDefault();
    }
});

function somenteNumeros(e) {
    var charCode = e.charCode ? e.charCode : e.keyCode;
    // charCode 8 = backspace   
    // charCode 9 = tab
    if (charCode != 8 && charCode != 9) {
        // charCode 48 = 0  
        // charCode 57 = 9
        if (charCode < 48 || charCode > 57) {
            return false;
        }
    }
}
