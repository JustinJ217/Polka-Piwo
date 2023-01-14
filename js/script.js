
function hallo() {
var pass1=document.Formular.passwort.value;
var pass2=document.Formular.passwort2.value;
if (document.Formular.passwort.value != document.Formular.passwort2.value) {
// document.write ("passwörter=" + pass1 + "Pass2=" + pass2);
alert ("Fehler. Bitte überprüfen Sie ihre Passwortangaben");
document.Formular.passwort.focus();
return false;
}}

