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

function fotoIslem(degisken,deger){
	location.href=location.href+"&"+degisken+"="+deger;
}

function acPopUp(theURL) {
  window.open(theURL,'POPUP','status=yes,scrollbars=yes,resizable=yes,width=450,height=500');
}

// belirtilen id ye göre form u submit eder.
function yp_form_submit(form_id){
	document.getElementById(form_id).submit();
}
//sayfa geri
function yp_geri(){
	history.back();
}
//sayfa ileri
function yp_ileri(){
	history.forward();
	}