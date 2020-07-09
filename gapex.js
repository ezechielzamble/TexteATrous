
/***************
** VARIABLES ***
****************/
var z=0;var y=-1;var x=0;var i = 0;var texte = "";var txtlg=0;
var rep = new Array();var ind = new Array();var com = new Array();
var textannexe=0;var chronometre=0;var comment=0;var indice=0;
var montrer_rep=0;var recommencer=0;proposer=0;var js_separe=0;
var titre,titre_page,consigne,auteur,date,fichierjs;
var delai="5:00";
var letexte="";

var fondpage="#FFF";
var fondtitre="#FFF";
var poltitre="Arial";
var coltitre="#000";
var styletitre="Normal";
var poidstitre="Normal";
var tailletitre=16;
var txtaligntitre="Left";
var fondcons="#FFF";
var polcons="Arial";
var colcons="#000";
var stylecons="Normal";
var poidscons="Normal";
var taillecons=12;
var txtaligncons="Left";
var polchro="Arial";
var colchro="#000";
var stylechro="Normal";
var poidschro="Normal";
var taillechro=16;
var txtalignchro="Left";
var fondfrm="#FFF";
var fondtxt="#FFF";
var poltxt="Arial";
var coltxt="#000";
var styletxt="Normal";
var poidstxt="Normal";
var tailletxt=12;
var fondind="#FFF";
var polind="Arial";
var colind="#000";
var styleind="Normal";
var poidsind="Normal";
var tailleind=10;
var txtalignind="Left";
var fondcom="#FFF";
var polcom="Arial";
var colcom="#000";
var stylecom="Normal";
var poidscom="Normal";
var taillecom=10;
var txtaligncom="Left";
var fondscore="#FFF";
var polscore="Arial";
var colscore="#000";
var stylescore="Normal";
var poidsscore="Normal";
var taillescore=12;
var txtalignscore="center";
var fondcmd="#FFF";
var txtaligncmd="center";
var fondinp="#FFF";
var polinp="Arial";
var colinp="#000";

var alignement="Aucun";
var nr = new Array();
var items;

function dater()
{
  var aujourdhui = new Date();
  var datum = aujourdhui.getDate()+"/"+parseInt(aujourdhui.getMonth()+1)+"/"+aujourdhui.getFullYear();
  date=datum;
  document.getElementById("date").value=date;
  }

//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
function txt_lect(){
  if(document.getElementById("textannexe").checked ==true){
    document.getElementById("txt_a_lire").style.display="inline";
    document.getElementById("textalire").style.display="inline";
    textannexe=1;
    }
  else {
    document.getElementById("txt_a_lire").style.display="none";
    document.getElementById("textalire").style.display="none";
    textannexe=0;
    }
}

function fixer_delai(){
  if(document.getElementById("chr").checked ==true){
    document.getElementById("del").style.display="inline";
    chronometre=1;
    afficher_cfg("chro","block");
    }
  else {
    document.getElementById("del").style.display="none";
    chronometre=0;
    afficher_cfg("chro","none");
    }
}

function it_mel(){
  if(document.getElementById("mel").checked ==true){proposer=1;}
  else {proposer=0;}
}

function change_indice(){
  if(document.getElementById("indi").checked ==true){
  indice=1;
  afficher_cfg("indi","block"); //affiche le bloc dans la configuration
  }
  else {
  indice=0;
  afficher_cfg("indi","none"); //affiche le bloc dans la configuration
  }
}

function commentaires(){
  if(document.getElementById("comment").checked ==true){
  comment=1;
  afficher_cfg("comm","block"); //affiche le bloc dans la configuration
  }
  else {
  comment=0;
  afficher_cfg("comm","none"); //affiche le bloc dans la configuration
  }
}

function recom(){
  if(document.getElementById("recommencer").checked ==true){recommencer=1;}
  else {recommencer=0;}
}

function montre_rep(){
  if(document.getElementById("montrer_rep").checked ==true){montrer_rep=1;}
  else {montrer_rep=0;}
}

function js_separ(){
  if(document.getElementById("js_separe").checked ==true){
    document.getElementById("fichierjs").style.display="inline";
    js_separe=1;
    document.getElementById("jssepare").style.visibility="visible";
    document.getElementById("jssepare").style.display="block";
    }
  else {
    document.getElementById("fichierjs").style.display="none";
    js_separe=0;
    document.getElementById("jssepare").style.visibility="hidden";
    document.getElementById("jssepare").style.display="none";
    }
}

function afficher_cfg(classe,voir){
  var ch = document.getElementsByTagName("TABLE");
  for(i=0;i<ch.length;i++){
    if(ch[i].className==classe)    {
      ch[i].style.display=voir;
      return;
    }
  }
}

//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

function entrer_indices(){
 document.getElementById("marq").style.display="none"; 
 document.getElementById("annuler").style.display="none"; 
 document.getElementById("ok").style.display="none"; 

  var di = document.getElementById('div_indices');
  di.style.visibility="visible";
  di.style.display="block";
  di.innerHTML = "<br \/><b><big>Entrez les indices pour chaque trou<\/big><\/b> :<hr \/>";
  for(i=0;i<rep.length;i++){
      var indi=ind[i];
      if(indi==null){indi="";} //pour �viter qu'un "undefined" ne s'affiche
      di.innerHTML+="<div class=\"indice_trou\">Indice pour le trou n°"+(i+1)+" \"<i>"+rep[i]+"<\/i>\"<\/div>";
      di.innerHTML+="<textarea class=\"area_indice\" id='ind"+i+"' rows=\"3\" cols=\"70\">"+indi;
      di.innerHTML+="<\/textarea><br \/><br \/>";
    }
  di.innerHTML+="<hr \/><input type=\"button\" value=\"Fermer\" onclick=\"fermeture_indi();\" \/>";
}


function commenter(){
 document.getElementById("marq").style.display="none"; 
 document.getElementById("annuler").style.display="none"; 
 document.getElementById("ok").style.display="none"; 

  var dc = document.getElementById("div_coms");
  dc.style.visibility="visible";
  dc.style.display="block";
  dc.innerHTML = "<br \/><b><big>Entrez les commentaires pour chaque trou<\/big><\/b> :<hr \/>";
  for(i=0;i<rep.length;i++)    {
      var co=com[i];
      if(co==null){co="";} //pour éviter qu'un "undefined" ne s'affiche
      dc.innerHTML+="<div class=\"com_trou\">Commentaire pour le trou n°"+(i+1)+" \"<i>"+rep[i]+"<\/i>\"<\/div>";
      dc.innerHTML+="<textarea class=\"area_com\" id='com"+i+"' rows=\"3\" cols=\"70\">"+co;
      dc.innerHTML+="<\/textarea><br \/><br \/>";
    }
  dc.innerHTML+="<hr \/><input type=\"button\" value=\"Fermer\" onclick=\"fermeture_com();\" \/>";
}


function fermeture_indi(){
   for(i=0;i<rep.length;i++)    { 
      ind[i] = document.getElementById("ind"+i).value; //collecte des indices
    }
    document.getElementById('div_indices').style.display='none';
    document.getElementById('div_indices').style.visibility='hidden';
}


function fermeture_com(){
   for(i=0;i<rep.length;i++)    { 
      com[i] = document.getElementById("com"+i).value; //collecte des commentaires
    }
    document.getElementById('div_coms').style.display='none';
    document.getElementById('div_coms').style.visibility='hidden';
}


/* code pour l'insertion des accolades
====================================================*/
var isMozilla=(navigator.userAgent.toLowerCase().indexOf('gecko')!=-1)?true:false;
var regexp=new RegExp("[\r]","gi");

function marquer(selec) {
  if(isMozilla){ // Si on est sur Mozilla
    var oField=document.getElementById('texte_lac');
    var objectValue=oField.value;
    var deb=oField.selectionStart;
    var fin=oField.selectionEnd;
    var objectValueDeb=objectValue.substring(0,oField.selectionStart);
    var objectValueFin=objectValue.substring(oField.selectionEnd,oField.textLength);
    var objectSelected=objectValue.substring(oField.selectionStart,oField.selectionEnd);
    if(objectSelected==""){alert("Aucun élément sélectionné !");return;}
 // si la sélection se termine par un espace, enlever l'espace final
    if(objectSelected.charAt(objectSelected.length-1)==" "){
            objectSelected=objectSelected.substr(0,objectSelected.length-1);
            objectValueFin=" "+objectValueFin
            }
 // replacer la sélection entourée de accolades dans le textarea
    oField.value=objectValueDeb+"{"+objectSelected+"}"+objectValueFin;
  }
else{ // Si on est sur IE
    oField=document.forms['frm'].elements['texte_lac'];
    var str=document.selection.createRange().text;
    if(str.length==0){alert("Aucun élément sélectionné !");return;}
    if (str.length>0){
        // si la sélection se termine par un espace, enlever l'espace final
        if(str.charAt(str.length-1)==" ") {str=str.substr(0,str.length-1);var esp=1;}
        // Si on a selectionné du texte
        var sel=document.selection.createRange();
        if(esp==1){sel.text="{"+str+"} ";esp=0;} //ajouter l'espace après la sélection entre accolades
        else {sel.text="{"+str+"}";}
        sel.collapse();
        sel.select();
      }
    else{
        oField.focus(oField.caretPos);
        oField.focus(oField.value.length);
        oField.caretPos=document.selection.createRange().duplicate();
        var bidon="%~%";
        var orig=oField.value;
        oField.caretPos.text=bidon;
        var i=oField.value.search(bidon);
        oField.value=orig.substr(0,i)+"{}"+orig.substr(i,oField.value.length);
        //Gestion des retours chariots sous IE
        var temp=orig.substr(0,i);
        var nbretour=0;
        for (var cpt=0;cpt<temp.length;cpt=cpt+1) {if(temp.charAt(cpt)=="\n") {nbretour=nbretour+1;}}
        //Prise en compte des retours chariot dans le placement du curseur
        pos=i+2+selec.length - nbretour;
        var r=oField.createTextRange();
        r.moveStart('character', pos);
        r.collapse();
        r.select();
      }
  }
}
/* fin du code pour l'insertion des accolades
=============================================*/
 
/* FONCTION ANNULER LE MARQUAGE */
function oter(){
if (isMozilla) // Si on est sur Mozilla
{
  var oField=document.getElementById('texte_lac');
  var objectValue=oField.value;
  var objectValueDeb=objectValue.substring(0,oField.selectionStart-1);
  var objectValueFin=objectValue.substring(oField.selectionEnd+1,oField.textLength);
  var objectSelected=objectValue.substring(oField.selectionStart,oField.selectionEnd);
  if(objectSelected==""){alert("Aucun élément sélectionné !");return;}
  // replacer la sélection SANS accolades dans le textarea
  oField.value=objectValueDeb+objectSelected+objectValueFin;
}
else{ // Si on est sur IE
oField=document.forms['frm'].elements['texte_lac'];
var str=document.selection.createRange().text;
if(str.length==0){alert("Aucun élément sélectionné !");return;}
if (str.length>0) {
  var orig=oField.value;
  var i=oField.value.search(str);
  oField.value=orig.substr(0,i-1)+str+orig.substr(i+str.length+1,oField.value.length);
  var r=oField.createTextRange();
  r.collapse();
  r.select();
  }
}
}
/* FIN DE LA FONCTION ANNULER LE MARQUAGE */


/*************************
** CREER LES QUESTIONS ***
**************************/

function sauver(){
  texte = document.getElementById("texte_lac").value; //recupérer le texte à trou
  if(texte=="") {alert("AUCUN TEXTE !");return;}
  
  if(!confirm("Etes-vous sûr d'avoir terminé de créer TOUS les trous,\ncar vous ne pourrez plus les modifier ?\n\n\toui = [ OK ]\t\tnon = [ Annuler ]")) {return;}
  
  texte = texte.replace(/["]/g,'\"');
    
  if(rep.length>0){rep = new Array();z=0;y=-1;x=0;} //vider le tableau
  var ouvr=0;var ferm=0;
  
  //vérifier si le nombre d'accolades "{" est égal au nombre d'accolades "}"
  for(i=0;i<texte.length;i++){
    if(texte.charAt(i)=="{"){ouvr++;}
    if(texte.charAt(i)=="}"){ferm++;}
  }
  if(ouvr!=ferm){alert("Le nombre d'accolades ouvrantes n'est pas\nidentique à celui des accolades fermantes !\n\nVeuillez vérifier !");return;}

  txtlg = texte.length;

  for(i=0;i<txtlg;i++)//balayage du texte entré
  {
    if(texte.charAt(i)=="{")
      {
        y++;
        rep[y]="";
        z=i+1;
        while (texte.charAt(z)!="}")
        {
          rep[y] = rep[y]+texte.charAt(z);
          z++;i++;
        }
      }
  }
  
  var dim = 0;
  for(i=0;i<rep.length;i++)
    {
      dim = rep[i].length;
      if(indice==0&&comment==0){texte=texte.replace("{"+rep[i]+"}","<input type=\"text\" id=\"t"+i+"\" class=\"inp\" size=\""+dim+"\" \/>");}
      else if(indice==1&&comment==1){
            texte=texte.replace("{"+rep[i]+"}","<input type=\"text\" id=\"t"+i+"\" class=\"inp\" size=\""+dim+"\" \/><span id=\"hp"+i+"\" class=\"aide\" title=\"Indice\" onclick=\"indice("+i+");\">?<\/span><span id=\"cm"+i+"\" class=\"cm\" title=\"Commentaire\" onclick=\"cmt("+i+");\">C</span>");
           }
      else if(indice==1&&comment==0){
            texte=texte.replace("{"+rep[i]+"}","<input type=\"text\" id=\"t"+i+"\" class=\"inp\" size=\""+dim+"\" \/><span id=\"hp"+i+"\" class=\"aide\" title=\"Indice\" onclick=\"indice("+i+");\">?<\/span>");      
           }
      else if(comment==1&&indice==0){
            texte=texte.replace("{"+rep[i]+"}","<input type=\"text\" id=\"t"+i+"\" class=\"inp\" size=\""+dim+"\" \/><span id=\"cm"+i+"\" class=\"cm\" title=\"Commentaire\" onclick=\"cmt("+i+");\">C</span>");      
           }
    }
    
   //remplacer les retours de chariots "\n\r" par "<br />"
    escapeVal();
    
   //bloquer le textarea après le clic sur le bouton "sauver"
    //document.getElementById("texte_lac").disabled="disabled";
    document.getElementById("texte_lac").readOnly=true;
    document.getElementById("texte_lac").style.backgroundColor="#EAEAEA";
    
   //afficher le bouton "indices"   
    if(indice==1){document.getElementById("ind").style.display="inline";}
    else {document.getElementById("ind").style.display="none";}
    
   //afficher le bouton "commentaires"
    if(comment==1){document.getElementById("com").style.display="inline";}
    else {document.getElementById("com").style.display="none";}
}


function escapeVal(){ //fonction de remplacement des retours chariots
  texte = escape(texte);

  for(var i=0; i<texte.length; i++){
      if(texte.indexOf("%0D%0A") > -1){//Windows encodes returns as \r\n hex
      texte=texte.replace("%0D%0A","<br \/>");
      }
      else if(texte.indexOf("%0A") > -1){//Unix encodes returns as \n hex
      texte=texte.replace("%0A","<br \/>");
      }
      else if(texte.indexOf("%0D") > -1){//Macintosh encodes returns as \r hex
      texte=texte.replace("%0D","<br \/>");
      }
  }
  texte=unescape(texte);
}


function sauver_design(){
  fondpage = "#"+document.getElementById("fondpage").value;
  
  fondtitre = "#"+document.getElementById("fondtitre").value;
  poltitre = document.getElementById("poltitre").value;
  coltitre = "#"+document.getElementById("coltitre").value;
  styletitre = document.getElementById("styletitre").value;
  poidstitre = document.getElementById("poidstitre").value;
  tailletitre = document.getElementById("tailletitre").value;
  txtaligntitre = document.getElementById("txtaligntitre").value;

  fondcons = "#"+document.getElementById("fondcons").value;
  polcons = document.getElementById("polcons").value;
  colcons = "#"+document.getElementById("colcons").value;
  stylecons = document.getElementById("stylecons").value;
  poidscons = document.getElementById("poidscons").value;
  taillecons = document.getElementById("taillecons").value;
  txtaligncons = document.getElementById("txtaligncons").value;
  
  polchro = document.getElementById("polchro").value;
  colchro = "#"+document.getElementById("colchro").value;
  stylechro = document.getElementById("stylechro").value;
  poidschro = document.getElementById("poidschro").value;
  taillechro = document.getElementById("taillechro").value;
  txtalignchro = document.getElementById("txtalignchro").value;

  fondfrm = "#"+document.getElementById("fondfrm").value;
  
  fondtxt = "#"+document.getElementById("fondtxt").value;
  poltxt = document.getElementById("poltxt").value;
  coltxt = "#"+document.getElementById("coltxt").value;
  styletxt = document.getElementById("styletxt").value;
  poidstxt = document.getElementById("poidstxt").value;
  tailletxt = document.getElementById("tailletxt").value;

  fondind = "#"+document.getElementById("fondind").value;
  polind = document.getElementById("polind").value;
  colind = "#"+document.getElementById("colind").value;
  styleind = document.getElementById("styleind").value;
  poidsind = document.getElementById("poidsind").value;
  tailleind = document.getElementById("tailleind").value;
  txtalignind = document.getElementById("txtalignind").value;

  fondcom = "#"+document.getElementById("fondcom").value;
  polcom = document.getElementById("polcom").value;
  colcom = "#"+document.getElementById("colcom").value;
  stylecom = document.getElementById("stylecom").value;
  poidscom = document.getElementById("poidscom").value;
  taillecom = document.getElementById("taillecom").value;
  txtaligncom = document.getElementById("txtaligncom").value;

  fondscore = "#"+document.getElementById("fondscore").value;
  polscore = document.getElementById("polscore").value;
  colscore = "#"+document.getElementById("colscore").value;
  stylescore = document.getElementById("stylescore").value;
  poidsscore = document.getElementById("poidsscore").value;
  taillescore = document.getElementById("taillescore").value;
  txtalignscore = document.getElementById("txtalignscore").value;

  fondcmd = "#"+document.getElementById("fondcmd").value;
  txtaligncmd = document.getElementById("txtaligncmd").value;

  fondinp = "#"+document.getElementById("fondinp").value;
  polinp = document.getElementById("polinp").value;
  colinp = "#"+document.getElementById("colinp").value;
  
  delai = document.getElementById("delai").value;
  titre_page = document.getElementById("titre_pg").value;
  titre = document.getElementById("titre_ex").value;
  consigne = document.getElementById("consigne").value;
  fichierjs = document.getElementById("fjs").value;
}


function previsualiser(){
  sauver_design();
  consigne = consigne.replace(/[\n]/gi,"<br \/>");
  consigne = consigne.replace(/[\r]/gi,"");
  consigne = consigne.replace(/[\r\n]/gi,"");
  
  for(i=0;i<rep.length;i++)  {
    if(indice==1) {
      if(ind[i]){
        ind[i]=ind[i].replace(/[\"]/gi,'"');
        ind[i]=ind[i].replace(/[\\]/gi,'');
      }
    }
    if(comment==1) {
      if(com[i]){
        com[i]=com[i].replace(/[\"]/gi,'"');
        com[i]=com[i].replace(/[\\]/gi,'');
      }
    }
  }
  
  var p = window.open("","Prévisualisation","scrollbars=yes,toolbar=yes,resizable=yes");
  
  p.document.write("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\"");
  p.document.write("  \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">"); 
  p.document.write("<html xmlns=\"http://www.w3.org/1999/xhtml\"><head>");
  
  p.document.write("<title>"+titre_page+"</title>");
  p.document.write("<meta http-equiv=\"content-type\" content=\"text/html; charset=iso-8859-1\" />");
  
  p.document.write("<style type=\"text/css\">");
  p.document.write("\/*<![CDATA[*\/");
  p.document.write("body{background:"+fondpage+";}");
  p.document.write("#titre {width:80%;margin-left:auto;margin-right:auto;font:"+poidstitre+" "+tailletitre+"pt "+poltitre+";color: "+coltitre+";background:"+fondtitre+";font-style:"+styletitre+";text-align:"+txtaligntitre+";padding:10px 20px;overflow:auto;}");
  p.document.write("#auteur_date {font:normal 8pt arial;color:gray;}");
  p.document.write("#consigne {width:80%;margin-left:auto;margin-right:auto;margin-top:3px;font:"+poidscons+" "+taillecons+"pt "+polcons+";color:"+colcons+";background:"+fondcons+";font-style:"+stylecons+";text-align:"+txtaligncons+";padding:10px 20px;overflow:auto;}");
  if(chronometre==1) p.document.write("#chrono {width:80%;margin-left:auto;margin-right:auto;font:"+poidschro+" "+taillechro+"pt "+polchro+";color:"+colchro+";font-style:"+stylechro+";text-align:"+txtalignchro+";padding:0px 20px;}");
  p.document.write("#frm {width:80%;height:400px;overflow:auto;margin-left:auto;margin-right:auto;margin-top:3px;line-height:2.5;background:"+fondfrm+";padding:20px;}");
  p.document.write("#txt {width:90%;margin-left:auto;margin-right:auto;font:"+poidstxt+" "+tailletxt+"pt "+poltxt+";color:"+coltxt+";line-height:2.5;background:"+fondtxt+";font-style:"+styletxt+";padding:10px;overflow:auto;}");
  p.document.write("input.inp {background:"+fondinp+";font:normal 12pt "+polinp+";color:"+colinp+";text-align:center;}");
  p.document.write("span.aide {font-size:80%;font-family:verdana;font-weight:bold;background:#ffff99;color:gray;vertical-align:super;cursor:pointer;border:1px solid gray;padding:0px 2px;}");
  p.document.write("span.aide:hover {background:orange;color:white;}");
  p.document.write("span.cm {font-size:80%;font-family:verdana;font-weight:bold;background:red;color:white;vertical-align:super;cursor:pointer;border:1px solid gray;padding:0px 2px;display:none;}");
  p.document.write("span.cm:hover {background:white;color:red;}");
  p.document.write("#indice {position:absolute;visibility:hidden;display:none;width:400px;height:100px;overflow:auto;font:"+poidsind+" "+tailleind+"pt "+polind+";color:"+colind+";font-style:"+styleind+";background:"+fondind+";border:dotted 2px gray;padding:10px 20px;text-align:"+txtalignind+";}");
  p.document.write("#comment {position:absolute;visibility:hidden;display:none;width:400px;height:100px;overflow:auto;font:"+poidscom+" "+taillecom+"pt "+polcom+";color:"+colcom+";border:dotted 2px gray;font-style:"+stylecom+";background:"+fondcom+";padding:10px 20px;text-align:"+txtaligncom+";}");
  p.document.write("#score {position:absolute;visibility:hidden;display:none;width:400px;height:130px;overflow:auto;text-align:"+txtalignscore+";font:"+poidsscore+" "+taillescore+"pt "+polscore+";color:"+colscore+";font-style:"+stylescore+";background:"+fondscore+";padding:10px 20px;border:solid 2px gray;}");
  p.document.write(".ok_btn {font:bold 9pt arial;color:gray;cursor:pointer;background:#cacaca;border:1px outset white;padding:2px;}");
  p.document.write(".ok_btn:hover {background:#707070;border:2px inset white;color:white;}");
  p.document.write("#commandes {width:80%;margin-left:auto;margin-right:auto;margin-top:3px;background:"+fondcmd+";padding:10px 20px;text-align:"+txtaligncmd+";}");
  p.document.write("#creation {width:80%;margin-left:auto;margin-right:auto;margin-top:3px;font:normal 8pt arial;color:gray;text-align:center;background:transparent;padding:3px 20px;}");
  p.document.write("a:link {color:gray;text-decoration:underline;font-weight:bold;}");
  p.document.write("span.bnrep {font:bold 12pt arial;background:#AAFFD5;}");
  p.document.write("\/*]]>*\/");
  p.document.write("<\/style>");
  
  p.document.write("<\/head><body onclick=\"window.close();\">");

  p.document.write("<div id=\"titre\">"+titre+"<br \/>");
  if(auteur!=""||date!=""){
    p.document.write("<span id=\"auteur_date\">");
    if(auteur) {p.document.write("Auteur : "+auteur);}
    if(date&&auteur) {p.document.write("  ( "+date+" )");}
    else if(date) {p.document.write("( "+date+" )");}
    p.document.write("<\/span>");
  }
  p.document.write("<\/div>");
  
  if(proposer==1){
  for(var i=0;i<rep.length;i++) {nr[i]=rep[i];}
  shuffle(nr);
  items = nr.join("&nbsp;&diams;&nbsp;");
  p.document.write("<div id=\"consigne\">"+consigne+"<br \/><br \/>"+items+"<\/div>");
  }
  else {p.document.write("<div id=\"consigne\">"+consigne+"<\/div>");}
  
  if(chronometre==1) p.document.write("<div id=\"chrono\">"+delai+"<\/div>");
  p.document.write("<div id=\"frm\"><form id=\"txt\" name=\"txt\" action=\"\">");

  p.document.write(texte);
  
  p.document.write("<\/form><\/div>");
  p.document.write("<div id=\"indice\">.<\/div><div id=\"comment\">.<\/div><div id=\"score\">.<\/div>");
  p.document.write("<div id=\"commandes\">");
  p.document.write("<input type=\"button\" value=\"Corriger\" onclick=\"corriger();\" \/>");
  if(recommencer==1) p.document.write("<input type=\"button\" value=\"Recommencer\" onclick=\"recommencer();\" \/>");
  if(textannexe==1) p.document.write("<input type=\"button\" value=\"Texte\" onclick=\"liretexte();\" \/>");
  p.document.write("<\/div>");

  p.document.write("<\/body><\/html>");
  p.document.close();
}
function shuffle(nr) {
	for(i=0;i<nr.length;i++){
		var j=Math.floor(Math.random()*nr.length);
		var tempUnit=nr[i];
		nr[i]=nr[j];
		nr[j]=tempUnit;
	}
	return nr;
}

/****************
** GENERATION ***
*****************/

function generation()
{
/*************************
 QUELQUES VERIFICATIONS
**************************/

titre_page=document.getElementById("titre_pg").value;
titre=document.getElementById("titre_ex").value;
if(!titre_page) {
  alert("Vous avez oublié le titre de la page !");
  location.href="#prm";
  document.getElementById("titre_pg").focus();
  return;
}
if(!titre) {
  alert("Vous avez oublié le titre de l'exercice !");
  location.href="#prm";
  document.getElementById("titre_ex").focus();
  return;
}
if(!consigne){
  alert("Vous avez oublié la consigne !");
  location.href="#qst";
  document.getElementById("consigne").focus();
  return;
}
if (textannexe==1){
  letexte=tinyMCE.get('text').getContent(); //on récupère le texte dans tinymce
  if(!letexte){
    alert("Aucun texte à sauver !");
    location.href="#tx";return;
  }
}
if(!texte) {
  alert("Vous n'avez pas sauvé le texte à trou !");
  location.href="#qst";
  document.getElementById("texte_lac").focus();
  return;
}
var resultat = texte.search(/{/);
if(resultat!=-1){//s'il reste des accolades non transformées
  alert("Vous n'avez pas sauvé le texte à trou !");
  location.href="#qst";
  document.getElementById("texte_lac").focus();
  return;
}
if(js_separe==1){
  fichierjs=document.getElementById("fjs").value;
  if(!fichierjs){
  alert("Vous n'avez pas donné de nom\nau fichier javascript séparé !");
  location.href="#prm";
  document.getElementById("fjs").focus();
  return;  
  }
}

//REMPLACEMENTS ET ECHAPPEMENTS
// LE TEXTE
if (textannexe==1){
  letexte = letexte.replace(/["]/gi,"\\\"");
  letexte = letexte.replace(/<p>&nbsp;<\/p>/gi,"<br \/>");
  letexte = letexte.replace(/<p>/gi,"");
  letexte = letexte.replace(/<\/p>/gi,"<br \/>");
  letexte = letexte.replace(/[\n]/gi,"");
  letexte = letexte.replace(/[\r]/gi,"");
  letexte = letexte.replace(/[\r\n]/gi,"");
  letexte = letexte.replace(/<\//gi,"<\\/");
}

// INDICES ET COMMENTAIRES => déchapper s'il y a lieu
for(i=0;i<rep.length;i++)
{
  if(indice==1) {
    ind[i]=ind[i].replace(/[\"]/gi,'"');
    ind[i]=ind[i].replace(/[\\]/gi,'');
    }
  if(comment==1) {
    com[i]=com[i].replace(/[\"]/gi,'"');
    com[i]=com[i].replace(/[\\]/gi,'');
    }
}

// LES INDICES
if (indice==1)
{
  for(i=0;i<ind.length;i++){
    if(!ind[i]){
                alert("Vous avez oublié l'indice pour l'élément suivant :\n\n'"+rep[i]+"' !");
                location.href="#qst";
                return;
                }
  }
    
  for(i=0;i<ind.length;i++)
  {
    ind[i]=ind[i].replace(/[\\]/g,'\\\\');          //    si \ , mettre \\
    ind[i]=ind[i].replace(/["]/g,'\\"');            //    si " , mettre \"
    ind[i]=ind[i].replace(/[\n]/g,'<br \\/>');
    ind[i]=ind[i].replace(/[\r]/g,'');
    ind[i]=ind[i].replace(/[\r\n]/g,'');
    }
}

 
// LES COMMENTAIRES  
if (comment==1)
{
  for(i=0;i<com.length;i++){
    if(!com[i]){
                alert("Vous avez oublié le commentaire pour l'élément suivant :\n\n'"+rep[i]+"' !");
                location.href="#qst";
                return;
               }
  }

  for(i=0;i<com.length;i++)
  {
    com[i]=com[i].replace(/[\\]/g,'\\\\');
    com[i]=com[i].replace(/["]/g,'\\"');
    com[i]=com[i].replace(/[\n]/g,'<br \\/>');
    com[i]=com[i].replace(/[\r]/g,'');
    com[i]=com[i].replace(/[\r\n]/g,'');
    }
}

//message de confirmation
  if(!confirm("Etes-vous sûr d'avoir terminé,\ncar vous ne pourrez plus rien modifier ?\n\n\toui = [ OK ]\t\tnon = [ Annuler ]")) {return;}

//message d'alerte
alert("La génération de la page va commencer.\nVeuillez patienter jusqu'à l'apparition\ndu message 'génération terminée !'\n\nCliquez maintenant sur OK pour continuer.");

sauver_design(); //sauve le design + titre, consigne et délai chrono

// LA CONSIGNE
if(consigne){
  consigne = consigne.replace(/[\n]/gi,"<br \/>");
  consigne = consigne.replace(/[\r]/gi,"");
  consigne = consigne.replace(/[\r\n]/gi,"");
}

//cacher les autres cadres pour qu'on ne puisse pas y revenir
document.getElementById("menu").style.display="none";
document.getElementById("intro").style.display="none";
document.getElementById("parametres").style.display="none";
document.getElementById("entrer_quest").style.display="none";
document.getElementById("configuration").style.display="none";
document.getElementById("textalire").style.display="none";
var p = document.getElementsByTagName("p"); 
for(i=0;i<p.length;i++){
  if(p[i].className=="vide") p[i].style.display="none"; //cacher tous les paragraphes de la classe: "vide"
}


var pg = document.getElementById("page");
pg.value=""; // initialisation

pg.value+="<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\"\n";
pg.value+="    \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
pg.value+="<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
pg.value+="<head>\n";
pg.value+="<meta http-equiv=\"content-type\" content=\"text/html; charset=iso-8859-1\" />\n";
pg.value+="<meta name=\"generator\" content=\" \" />\n";
pg.value+="<meta http-equiv=\"Content-Language\" content=\"fr\" />\n";
pg.value+="<title>"+titre_page+"</title>\n";
pg.value+="<style type=\"text/css\">\n";
pg.value+="/*<![CDATA[*/\n";
pg.value+="body{background:"+fondpage+";}\n";
pg.value+="#titre {width:80%;margin-left:auto;margin-right:auto;font:"+poidstitre+" "+tailletitre+"pt "+poltitre+";color: "+coltitre+";background:"+fondtitre+";font-style:"+styletitre+";text-align:"+txtaligntitre+";padding:10px 20px;overflow:auto;}\n";
pg.value+="#auteur_date {font:normal 8pt arial;color:gray;}\n";
pg.value+="#consigne {width:80%;margin-left:auto;margin-right:auto;margin-top:3px;font:"+poidscons+" "+taillecons+"pt "+polcons+";color:"+colcons+";background:"+fondcons+";font-style:"+stylecons+";text-align:"+txtaligncons+";padding:10px 20px;overflow:auto;}\n";
if(chronometre==1) pg.value+="#chrono {width:80%;margin-left:auto;margin-right:auto;font:"+poidschro+" "+taillechro+"pt "+polchro+";color:"+colchro+";font-style:"+stylechro+";text-align:"+txtalignchro+";padding:0px 20px;}\n";
pg.value+="#frm {width:80%;height:400px;overflow:auto;margin-left:auto;margin-right:auto;margin-top:3px;line-height:2.5;background:"+fondfrm+";padding:20px;}\n";
pg.value+="#txt {width:90%;margin-left:auto;margin-right:auto;font:"+poidstxt+" "+tailletxt+"pt "+poltxt+";color:"+coltxt+";line-height:2.5;background:"+fondtxt+";font-style:"+styletxt+";padding:10px;overflow:auto;}\n";
pg.value+="input.inp {background:"+fondinp+";font:normal 12pt "+polinp+";color:"+colinp+";text-align:center;}\n";
pg.value+="span.aide {font-size:80%;font-family:verdana;font-weight:bold;background:#ffff99;color:gray;vertical-align:super;cursor:pointer;border:1px solid gray;padding:0px 2px;}\n";
pg.value+="span.aide:hover {background:orange;color:white;}\n";
pg.value+="span.cm {font-size:80%;font-family:verdana;font-weight:bold;background:red;color:white;vertical-align:super;cursor:pointer;border:1px solid gray;padding:0px 2px;display:none;}\n";
pg.value+="span.cm:hover {background:white;color:red;}\n";
pg.value+="#indice {position:absolute;visibility:hidden;display:none;width:400px;height:100px;overflow:auto;font:"+poidsind+" "+tailleind+"pt "+polind+";color:"+colind+";font-style:"+styleind+";background:"+fondind+";border:dotted 2px gray;padding:10px 20px;text-align:"+txtalignind+";}\n";
pg.value+="#comment {position:absolute;visibility:hidden;display:none;width:400px;height:100px;overflow:auto;font:"+poidscom+" "+taillecom+"pt "+polcom+";color:"+colcom+";border:dotted 2px gray;font-style:"+stylecom+";background:"+fondcom+";padding:10px 20px;text-align:"+txtaligncom+";}\n";
pg.value+="#score {position:absolute;visibility:hidden;display:none;width:400px;height:130px;overflow:auto;text-align:"+txtalignscore+";font:"+poidsscore+" "+taillescore+"pt "+polscore+";color:"+colscore+";font-style:"+stylescore+";background:"+fondscore+";padding:10px 20px;border:solid 2px gray;}\n";
pg.value+=".ok_btn {font:bold 9pt arial;color:gray;cursor:pointer;background:#cacaca;border:1px outset white;padding:2px;}\n";
pg.value+=".ok_btn:hover {background:#707070;border:2px inset white;color:white;}\n";
pg.value+="#commandes {width:80%;margin-left:auto;margin-right:auto;margin-top:3px;background:"+fondcmd+";padding:10px 20px;text-align:"+txtaligncmd+";}\n";
pg.value+="#creation {width:80%;margin-left:auto;margin-right:auto;margin-top:3px;font:normal 8pt arial;color:gray;text-align:center;background:transparent;padding:3px 20px;}\n";
pg.value+="a:link {color:gray;text-decoration:underline;font-weight:bold;}\n";
pg.value+="span.bnrep {font:bold 12pt arial;background:#AAFFD5;color:green;padding:0px 3px;}\n";
pg.value+="span.malrep {font:bold 12pt arial;background:#FF8080;color:yellow;padding:0px 3px;}\n";
pg.value+="/*]]>*/\n";
pg.value+="</style>\n";

if(js_separe==1){//si le fichier js doit être séparé
pg.value+="<script type=\"text/javascript\" src=\""+fichierjs+"\"></script>\n";
}
else {
pg.value+="<script type=\"text/javascript\">\n";
pg.value+="//<![CDATA[\n";
pg.value+="// initialisation\n";
pg.value+="var largeur=0;var hauteur=0;var i=0;var entree=\"\";var points=0;var score=\"\";\n";

//le texte
if(textannexe==1){
pg.value +='var texteplus="'+letexte+'";\n\n';
pg.value +='function liretexte(){\n';
pg.value +='var w="";w=open("","popup","width=600,height=500,toolbar=no,scrollbars=yes,resizable=yes");\n';
pg.value +='w.document.write(texteplus);\n';
pg.value +='w.document.write("<hr \/><input type=\\"button\\" value=\\"Fermer\\" onclick=\\"window.close();\\">");\n';
pg.value +='w.document.close();\n';
pg.value +='}\n';
}

//les bonnes réponses
  pg.value+="var rep= new Array();\n";
  for (i=0;i<rep.length;i++){pg.value+="rep["+i+"]=\""+rep[i]+"\";\n";}


//les indices
if(indice==1){
  pg.value+="var ind= new Array();\n";
  for (i=0;i<ind.length;i++){pg.value+="ind["+i+"]=\""+ind[i]+"\";\n";}
}

//s'il y a des commentaires
if(comment==1){
  pg.value+="var com= new Array();// les commentaires\n";
  for (i=0;i<com.length;i++){pg.value+="com["+i+"]=\""+com[i]+"\";\n";}
}

pg.value+="function centrer(){\n";
pg.value+="if (window.innerWidth) largeur=window.innerWidth;\n";
pg.value+="else if (document.documentElement && document.documentElement.clientWidth) largeur=document.documentElement.clientWidth;\n";
pg.value+="else if (document.body)	largeur=document.body.clientWidth;\n";
pg.value+="if (window.innerHeight)	hauteur=window.innerHeight;\n";
pg.value+="else if (document.documentElement && document.documentElement.clientHeight) hauteur=document.documentElement.clientHeight;\n";
pg.value+="else if (document.body) hauteur=document.body.clientHeight;\n";
pg.value+="}\n";


if(indice==1){
pg.value+="function indice(x){\n";
pg.value+="centrer();\n";
pg.value+="var ic = document.getElementById(\"indice\");\n";
pg.value+="var l = (largeur-400)/2;\n";
pg.value+="var t = (hauteur-100)/2;\n";
pg.value+="ic.style.left = l+\"px\";\n";
pg.value+="ic.style.top = t+\"px\";\n";
pg.value+="ic.style.visibility=\"visible\";\n";
pg.value+="ic.style.display=\"block\";\n";
pg.value+="ic.innerHTML = ind[x];\n";
pg.value+="ic.innerHTML +=\"<hr \\/><span class=\\\"ok_btn\\\" onclick=\\\"document.getElementById('indice').style.visibility='hidden';document.getElementById('indice').style.display='none';\\\";>OK<\\/span>\";\n";
pg.value+="}\n";
}


if(comment==1){
pg.value+="function cmt(x){\n";
pg.value+="centrer();\n";
pg.value+="var ic = document.getElementById(\"comment\");\n";
pg.value+="var l = (largeur-400)/2;\n";
pg.value+="var t = (hauteur-100)/2;\n";
pg.value+="ic.style.left = l+\"px\";\n";
pg.value+="ic.style.top = t+\"px\";\n";
pg.value+="ic.style.visibility=\"visible\";\n";
pg.value+="ic.style.display=\"block\";\n";
pg.value+="ic.innerHTML = com[x];\n";
pg.value+="ic.innerHTML +=\"<hr \\/><span class=\\\"ok_btn\\\" onclick=\\\"document.getElementById('comment').style.visibility='hidden';document.getElementById('comment').style.display='none';\\\";>OK<\\/span>\";\n";
pg.value+="}\n";
}
pg.value+="function trim(chaine){return chaine.replace(/^\\s+|\\s+$/g,'');}\n"; /* 04/11/2011 */
pg.value+="function corriger(){\n";
if(chronometre==1) pg.value+="clearTimeout(id);\n";
pg.value+="points=0;\n";
pg.value+="var d = document.getElementById(\"txt\");\n";
pg.value+="for(i=0;i<rep.length;i++){\n";
pg.value+="entree = document.getElementById(\"t\"+i);\n";
pg.value+="var rp = trim(entree.value);\n";  /* 27/10/2011 */
pg.value+="if(rp==rep[i]){\n";
pg.value+="points++;\n";
pg.value+="var sp1 = document.createElement(\"span\");\n";
pg.value+="var sp1_contenu = document.createTextNode(rep[i]);\n";
pg.value+="sp1.appendChild(sp1_contenu);\n";
pg.value+="sp1.setAttribute(\"class\",\"bnrep\");\n";
pg.value+="sp1.setAttribute(\"className\",\"bnrep\");\n";
pg.value+="var sp2 = document.getElementById(\"t\"+i);\n";
pg.value+="var parentDiv = sp2.parentNode;\n";
pg.value+="parentDiv.insertBefore(sp1, sp2);\n";
pg.value+="d.removeChild(entree);\n";
if(indice==1) pg.value+="d.removeChild(document.getElementById(\"hp\"+i));\n";
pg.value+="}\n";
pg.value+="else{\n";
if(montrer_rep==1){ // si "montrer la réponse" a été sélectionné
pg.value+="var sp1 = document.createElement(\"span\");\n";
pg.value+="var sp1_contenu = document.createTextNode(rep[i]);\n";
pg.value+="sp1.appendChild(sp1_contenu);\n";
pg.value+="sp1.setAttribute(\"class\",\"malrep\");\n";
pg.value+="sp1.setAttribute(\"className\",\"malrep\");\n";
pg.value+="var sp2 = document.getElementById(\"t\"+i);\n";
pg.value+="var parentDiv = sp2.parentNode;\n";
pg.value+="parentDiv.insertBefore(sp1, sp2);\n";
pg.value+="d.removeChild(entree);\n";
}
if(montrer_rep==0){pg.value+="entree.disabled=true;\n";}
if(indice==1) pg.value+="if(document.getElementById(\"hp\"+i)) d.removeChild(document.getElementById(\"hp\"+i));\n";
if(comment==1) pg.value+="if(document.getElementById(\"cm\"+i)) document.getElementById(\"cm\"+i).style.display=\"inline\";\n";
pg.value+="}\n";
pg.value+="}\n";
pg.value+="resultat();\n";
pg.value+="}\n";

pg.value+="function resultat(){\n";
pg.value+="centrer();\n";
pg.value+="var ic = document.getElementById(\"score\");\n";
pg.value+="var l = (largeur-400)/2;\n";
pg.value+="var t = (hauteur-130)/2;\n";
pg.value+="ic.style.left = l+\"px\";\n";
pg.value+="ic.style.top = t+\"px\";\n";
pg.value+="ic.style.visibility=\"visible\";\n";
pg.value+="ic.style.display=\"block\";\n";
pg.value+="ic.innerHTML=\"Résultat : \"+points+\" sur \"+rep.length+\" !\"\n";
if(montrer_rep==1||comment==1) {
  pg.value+="if(points<rep.length) {\n";
  if(montrer_rep==1) pg.value+="ic.innerHTML+=\"<br \\/><small><small>Les réponses en jaune sont les réponses qui étaient attendues.<\\/small><\\/small><br \\/>\";\n";
  if(comment==1) pg.value+="ic.innerHTML+=\"<br \\/><small><i>Cliquez sur les boutons [C] pour avoir des infos ! <\\/i><\\/small>\";\n";
  pg.value+="}\n";
}
pg.value+="ic.innerHTML +=\"<br \\/><hr \\/><span class=\\\"ok_btn\\\" onclick=\\\"document.getElementById('score').style.visibility='hidden';document.getElementById('score').style.display='none';\\\";>OK<\\/span>\";\n";
pg.value+="}\n";

if(recommencer==1){
pg.value+="function recommencer(){\n";
pg.value+="document.location = document.location;\n";
pg.value+="}\n";
}

if(chronometre==1){
pg.value+="var parselimit=0;var curmin=\"\";var curmin=0;var cursec=0;var curtime=\"\";var id=\"\";\n";
pg.value+="function decompte(){\n";
pg.value+="var limit=\""+delai+"\";\n";
pg.value+="if (document.images){parselimit=limit.split(':');parselimit=parselimit[0]*60+parselimit[1]*1;}\n";
pg.value+="begintimer();\n";
pg.value+="}\n";
pg.value+="function begintimer(){\n";
pg.value+="if (!document.images){return;}\n";
pg.value+="if (parselimit==0){alert(\"Désolé !\\n\\nLe temps imparti est écoulé !\");corriger();}\n";
pg.value+="else{\n";
pg.value+="parselimit-=1;curmin=Math.floor(parselimit/60);cursec=parselimit%60;\n";
pg.value+="if (cursec<10){cursec='0'+cursec;}\n";
pg.value+="if (curmin!=0){curtime=curmin+':'+cursec;}\n";
pg.value+="else{curtime='0:'+cursec;}\n";
pg.value+="document.getElementById(\"chrono\").innerHTML= curtime;\n";
pg.value+="id=setTimeout(\"begintimer()\",1000);\n";
pg.value+="}\n";
pg.value+="}\n";
}
pg.value+="//]]>\n";
pg.value+="</script>\n";
}

pg.value+="</head>\n";
if(chronometre==1){pg.value+="<body onload=\"decompte()\">\n";}
else {pg.value+="<body>\n";}

pg.value+="<div id=\"titre\">"+titre+"<br \/>\n";
	if(auteur!=""||date!=""){
		pg.value+="<span id=\"auteur_date\">\n";
			if(auteur){pg.value+="Auteur : "+auteur+"\n";}
			if(date && auteur){pg.value+=" ("+date+")\n";}
			else if(date){pg.value+="("+date+")\n";}
		pg.value+="<\/span>\n";
	}
pg.value+="<\/div>\n";

if(proposer==1){
	for(var i=0;i<rep.length;i++) {nr[i]=rep[i];}
	shuffle(nr);
	items = nr.join("&nbsp;&diams;&nbsp;");
	pg.value+="<div id=\"consigne\">"+consigne+"<br \/><br \/>"+items+"<\/div>\n";
}
else {pg.value+="<div id=\"consigne\">"+consigne+"<\/div>\n";}

if(chronometre==1) {pg.value+="<div id=\"chrono\">00:00</div>\n";}

pg.value+="<div id=\"frm\"><form id=\"txt\" name=\"txt\" action=\"\">\n";
pg.value+=texte+"\n";
pg.value+="</form></div>\n";

if(indice==1){pg.value+="<div id=\"indice\">.</div>";}
if(comment==1){pg.value+="<div id=\"comment\">.</div>";}
pg.value+="<div id=\"score\">.</div>\n";
pg.value+="<div id=\"commandes\">\n";
pg.value+="<input type=\"button\" value=\"Corriger\" onclick=\"corriger();\" />\n";
if(recommencer==1) pg.value+="<input type=\"button\" value=\"Recommencer\" onclick=\"recommencer();\" />\n";
if(textannexe==1) pg.value+="<input type=\"button\" value=\"Texte\" onclick=\"liretexte();\" />\n";
pg.value+="</div>\n";
pg.value+="<div id=\"creation\"> <b><a href=\" \" target=\"_blank\"> </a></b> </div>\n";

pg.value+="</body>\n";
pg.value+="</html>\n";

document.getElementById("fini1").style.display="inline";
document.getElementById("fini1").style.visibility="visible";
document.getElementById("fini1").innerHTML="génération terminée !";
document.getElementById("page").select(); //sélection automatique du code généré

}





function effacer(element) //effacer le(s) message(s) "génération terminée !" si le textarea perd le focus
{
  document.getElementById(element).style.visibility="hidden";
  document.getElementById(element).style.display="none";
}
  
/*  DEBUT SLIDEDOWN SCRIPT  */
	/************************************************************************************************************
	
	************************************************************************************************************/		
	var slideDownInitHeight = new Array();
	var slidedown_direction = new Array();
	var slidedownActive = false;
	var contentHeight = false;
	var slidedownSpeed = 5;	// Higher value = faster script
	var slidedownTimer = 3;	// Lower value = faster script
	function slidedown_showHide(boxId)
	{
		if(!slidedown_direction[boxId])slidedown_direction[boxId] = 1;
		if(!slideDownInitHeight[boxId])slideDownInitHeight[boxId] = 0;
		if(slideDownInitHeight[boxId]==0)slidedown_direction[boxId]=slidedownSpeed; else slidedown_direction[boxId] = slidedownSpeed*-1;
		slidedownContentBox = document.getElementById(boxId);
		var subDivs = slidedownContentBox.getElementsByTagName('DIV');
		for(var no=0;no<subDivs.length;no++){
			if(subDivs[no].className=='contenu')slidedownContent = subDivs[no];	
		}
		contentHeight = slidedownContent.offsetHeight;
		slidedownContentBox.style.visibility='visible';
		slidedownActive = true;
		slidedown_showHide_start(slidedownContentBox,slidedownContent);
	}
	function slidedown_showHide_start(slidedownContentBox,slidedownContent)
	{
		if(!slidedownActive)return;
		slideDownInitHeight[slidedownContentBox.id] = slideDownInitHeight[slidedownContentBox.id]/1 + slidedown_direction[slidedownContentBox.id];
		if(slideDownInitHeight[slidedownContentBox.id] <= 0){
			slidedownActive = false;	
			slidedownContentBox.style.visibility='hidden';
			slideDownInitHeight[slidedownContentBox.id] = 0;
		}
		if(slideDownInitHeight[slidedownContentBox.id]>contentHeight){
			slidedownActive = false;	
		}
		slidedownContentBox.style.height = slideDownInitHeight[slidedownContentBox.id] + 'px';
		slidedownContent.style.top = slideDownInitHeight[slidedownContentBox.id] - contentHeight + 'px';
		setTimeout('slidedown_showHide_start(document.getElementById("' + slidedownContentBox.id + '"),document.getElementById("' + slidedownContent.id + '"))',slidedownTimer);	// Choose a lower value than 10 to make the script move faster
	}
/*  FIN SLIDEDOWN SCRIPT  */

function inserer_image(){
  document.getElementById("image").style.visibility="visible";
  document.getElementById("image").style.display="block";
  document.getElementById("nom").value="";
  document.getElementById("largeur").value="";
  document.getElementById("hauteur").value="";
  document.getElementById("bordure").value="0";
  document.getElementById("textealt").value="";
  document.getElementById("pict").innerHTML="";
  document.getElementById("codeimg").value="";
  document.getElementById("aligne").selectedIndex=1;
  document.getElementById("nom").focus();
}

function code_image(){
  var aligner="";
  var bord=document.getElementById("bordure").value;
  
  var nom=document.getElementById("nom").value;
  if (nom==""){alert("Le nom du fichier image est manquant !");document.getElementById("nom").focus();return;}
  var ext=nom.substr(nom.length-4, 4);
  if (ext!=".jpg"&&ext!=".gif"&&ext!=".png"){alert("L'extension du fichier image est manquante\nou non valide !");ext="";document.getElementById("nom").focus();return;}

  if (document.getElementById("largeur").value==""){alert("La largeur de l'image est manquante !");document.getElementById("largeur").focus();return;}
  if (document.getElementById("hauteur").value==""){alert("La hauteur de l'image est manquante !");document.getElementById("hauteur").focus();return;}
  if (document.getElementById("textealt").value==""){alert("Le texte alternatif est manquant !");document.getElementById("textealt").focus();return;}
  
  document.getElementById("codeimage").style.visibility="visible";
  document.getElementById("codeimage").style.display="block";
  if(alignement=="none") {aligner="";}
  else if(alignement=="left") {aligner=" align=\"left\"";}
  else if(alignement=="right") {aligner=" align=\"right\"";}
  
  document.getElementById("pict").innerHTML="<img src=\"images/"+document.getElementById("nom").value+"\" width=\""+document.getElementById("largeur").value+"\" height=\""+document.getElementById("hauteur").value+"\" alt=\""+document.getElementById("textealt").value+"\" border=\""+bord+"\""+aligner+" />";
  
  document.getElementById("codeimg").value="<img src=\"images/"+document.getElementById("nom").value+"\" width=\""+document.getElementById("largeur").value+"\" height=\""+document.getElementById("hauteur").value+"\" alt=\""+document.getElementById("textealt").value+"\" border=\""+bord+"\""+aligner+" />";
}

function fermer_div(){ //ferme la fenêtre pour l'introduction d'une image
  document.getElementById('codeimage').style.visibility='hidden';
  document.getElementById('codeimage').style.display='none';
  document.getElementById('image').style.visibility='hidden';
  document.getElementById('image').style.display='none';
}
