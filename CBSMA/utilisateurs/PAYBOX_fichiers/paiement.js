function InfoPaybox(page)
{
var nw = window.open(page,"PAYBOX_INFO","scrollbars=yes,resizable=yes,height=400,width=600");
nw.focus();
return false;
}
function show(object)
{
if (document.layers && document.layers[object])
      {
      document.layers[object].visibility = 'visible';
      }
else if (document.all)
      {
      document.all[object].style.visibility = 'visible';
      document.all[object].style.zIndex = 100;
      }
else if (document.getElementById)
      {
      document.getElementById(object).style.visibility = 'visible';
      }
}
function hide(object)
{
if (document.layers && document.layers[object])
      document.layers[object].visibility = 'hidden';
else if (document.all)
      document.all[object].style.visibility = 'hidden';
else if (document.getElementById)
      {
      document.getElementById(object).style.visibility = 'hidden';
      }
}
var replay=0;
function Action()
{
if (replay > 0)
  {
  alert ("This form has already been submitted.  Thanks!");
  return false;
  }
else
  {
  replay=1;
  //if (navigator.appVersion.indexOf("MSIE")<0) 
  //document.form_pay.submit();
  return true;
  }
}

function isDateValid(chaineDate) {

// Je regarde tout d'abord si la chaîne n'est pas vide, sinon pas la peine d'aller plus loin
   if (chaineDate.length < 10) return false

// J'utilise split pour créer un tableau dans lequel je récupère les jour mois année
// J'attends bien sûr une date formatée en JJ/MM/AAAA
   var ladate = (chaineDate).split("/")

// Si je n'ai pas récupéré trois éléments ou bien s'il ne s'agit pas d'entiers, pas la peine non plus d'aller plus loin
   if ((ladate.length != 3) || isNaN(parseInt(ladate[0])) || isNaN(parseInt(ladate[1])) || isNaN(parseInt(ladate[2]))) return false

// Sinon, c'est maintenant que je crée la date correspondante. Attention, les mois sont étalonnés de 0 à 11
   var unedate = new Date(eval(ladate[2]),eval(ladate[1])-1,eval(ladate[0]))

// Bug de l'an 2000 oblige, lorsque je récupère l'année, je n'ai pas toujours 4 chiffres selon les navigateurs, je rectifie donc ici le tir.
   var annee = unedate.getYear()
   if ((Math.abs(annee)+"").length < 4) annee = annee + 1900

// Il ne reste plus qu'à vérifier si le jour, le mois et l'année obtenus sont les mêmes que ceux saisis par l'utilisateur.
   return ((unedate.getDate() == eval(ladate[0])) && (unedate.getMonth() == eval(ladate[1])-1) && (annee == eval(ladate[2])))
}

function CheckCardNo( CardNo ) {
   if( CardNo.match( /^588656[0-9]{10}$/ ))                  return "Fnac";
   if( CardNo.match( /^588639[0-9]{10}21[0-9]$/ ))           return "Surcouf";
   if( CardNo.match( /^501637[0-9]{10}$/ ))                  return "Printemps";
   if( CardNo.match( /^588639[0-9]{10}01[0-9]$/ ))           return "Kangourou";
   if( CardNo.match( /^588639[0-9]{10}13[0-9]$/ ))           return "Cyrillus";


   if( CardNo.match( /^[4][0-9]{12}([0-9]{3})?$/ ))           return "Visa";
   if( CardNo.match( /^[5]([1-6]|[8])[0-9]{14}$/ ))           return "Eurocard_MasterCard";
   if( CardNo.match( /^[3][47][0-9]{13}$/ ))                  return "Amex";
   if( CardNo.match( /^[3]([0][0-5]|[689])[0-9]{11,12}$/ ))   return "Diners";
   if( CardNo.match( /^(2131|1800)[0-9]{11}$|^3[0-9]{15}$/ )) return "JCB";
   if( CardNo.match( /^6011[0-9]{12}$/ ))                     return "Discover";
   if( CardNo.match( /^[2](014|149)([0-9]{11})$/ ))           return "EnRoute";
   if( CardNo.match( /^(501765|501766)([0-9]{13})$/ ))        return "aurore";
   if( CardNo.match( /^(306005|306012|589343)([0-9]{11})$/ )) return "Cofinoga";
   if( CardNo.match( /^(503203)([0-9]{11})$/ ))               return "Cdgp";
   return "?";
}
