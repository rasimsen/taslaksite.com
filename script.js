/**
 * email adresini kontrol eder
 * @param {Object} elem
 */
function checkEmail(elem) {
    
    var str = elem.value;
    var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
    if (!str.match(re)) {
        //alert("Verify the e-mail address format.");
        //setTimeout("focusElement('" + elem.form.name + "', '" + elem.name + "')", 0);
        return false;
    } else {
        return true;
    }
}	

function acPopUp(theURL) {
  window.open(theURL,'POPUP','status=yes,scrollbars=yes,resizable=yes,width=450,height=500');
}