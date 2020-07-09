<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Ecrire dans un fichier en PHP</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Ecrire dans un fichier en PHP</h1>
          <?php
          $texte= "<p>Test</p>";
      
            $fichier = fopen('test.txt', 'w+');
            $textes = "Ceci est un test pour voir comment cela s'affiche \n";
            fwrite($fichier, $texte);
            fclose($fichier);
        ?>

    </body>
</html> -->






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content=" " />
<meta http-equiv="Content-Language" content="fr" />
<title>test</title>
<style type="text/css">
/*<![CDATA[*/
body{background:#FFFFFF;}
#titre {width:80%;margin-left:auto;margin-right:auto;font:Normal 16pt Arial;color: #000000;background:#FFFFFF;font-style:Normal;text-align:left;padding:10px 20px;overflow:auto;}
#auteur_date {font:normal 8pt arial;color:gray;}
#consigne {width:80%;margin-left:auto;margin-right:auto;margin-top:3px;font:normal 12pt Arial;color:#000000;background:#FFFFFF;font-style:normal;text-align:left;padding:10px 20px;overflow:auto;}
#chrono {width:80%;margin-left:auto;margin-right:auto;font:normal 14pt Arial;color:#000000;font-style:normal;text-align:center;padding:0px 20px;}
#frm {width:80%;height:400px;overflow:auto;margin-left:auto;margin-right:auto;margin-top:3px;line-height:2.5;background:#FFFFFF;padding:20px;}
#txt {width:90%;margin-left:auto;margin-right:auto;font:normal 12pt Arial;color:#000000;line-height:2.5;background:#FFFFFF;font-style:normal;padding:10px;overflow:auto;}
input.inp {background:#FFFFFF;font:normal 12pt Arial;color:#000000;text-align:center;}
span.aide {font-size:80%;font-family:verdana;font-weight:bold;background:#ffff99;color:gray;vertical-align:super;cursor:pointer;border:1px solid gray;padding:0px 2px;}
span.aide:hover {background:orange;color:white;}
span.cm {font-size:80%;font-family:verdana;font-weight:bold;background:red;color:white;vertical-align:super;cursor:pointer;border:1px solid gray;padding:0px 2px;display:none;}
span.cm:hover {background:white;color:red;}
#indice {position:absolute;visibility:hidden;display:none;width:400px;height:100px;overflow:auto;font:normal 9pt Arial;color:#000000;font-style:normal;background:#FFFFFF;border:dotted 2px gray;padding:10px 20px;text-align:left;}
#comment {position:absolute;visibility:hidden;display:none;width:400px;height:100px;overflow:auto;font:normal 9pt Arial;color:#000000;border:dotted 2px gray;font-style:normal;background:#FFFFFF;padding:10px 20px;text-align:left;}
#score {position:absolute;visibility:hidden;display:none;width:400px;height:130px;overflow:auto;text-align:left;font:normal 12pt Arial;color:#000000;font-style:normal;background:#FFFFFF;padding:10px 20px;border:solid 2px gray;}
.ok_btn {font:bold 9pt arial;color:gray;cursor:pointer;background:#cacaca;border:1px outset white;padding:2px;}
.ok_btn:hover {background:#707070;border:2px inset white;color:white;}
#commandes {width:80%;margin-left:auto;margin-right:auto;margin-top:3px;background:#FFFFFF;padding:10px 20px;text-align:center;}
#creation {width:80%;margin-left:auto;margin-right:auto;margin-top:3px;font:normal 8pt arial;color:gray;text-align:center;background:transparent;padding:3px 20px;}
a:link {color:gray;text-decoration:underline;font-weight:bold;}
span.bnrep {font:bold 12pt arial;background:#AAFFD5;color:green;padding:0px 3px;}
span.malrep {font:bold 12pt arial;background:#FF8080;color:yellow;padding:0px 3px;}
/*]]>*/
</style>
<script type="text/javascript">
//<![CDATA[
// initialisation
var largeur=0;var hauteur=0;var i=0;var entree="";var points=0;var score="";
var rep= new Array();
rep[0]="e";
rep[1]="es";
rep[2]="e";
rep[3]="eons";
rep[4]="ez";
rep[5]="ent";
function centrer(){
if (window.innerWidth) largeur=window.innerWidth;
else if (document.documentElement && document.documentElement.clientWidth) largeur=document.documentElement.clientWidth;
else if (document.body)	largeur=document.body.clientWidth;
if (window.innerHeight)	hauteur=window.innerHeight;
else if (document.documentElement && document.documentElement.clientHeight) hauteur=document.documentElement.clientHeight;
else if (document.body) hauteur=document.body.clientHeight;
}
function trim(chaine){return chaine.replace(/^\s+|\s+$/g,'');}
function corriger(){
clearTimeout(id);
points=0;
var d = document.getElementById("txt");
for(i=0;i<rep.length;i++){
entree = document.getElementById("t"+i);
var rp = trim(entree.value);
if(rp==rep[i]){
points++;
var sp1 = document.createElement("span");
var sp1_contenu = document.createTextNode(rep[i]);
sp1.appendChild(sp1_contenu);
sp1.setAttribute("class","bnrep");
sp1.setAttribute("className","bnrep");
var sp2 = document.getElementById("t"+i);
var parentDiv = sp2.parentNode;
parentDiv.insertBefore(sp1, sp2);
d.removeChild(entree);
}
else{
var sp1 = document.createElement("span");
var sp1_contenu = document.createTextNode(rep[i]);
sp1.appendChild(sp1_contenu);
sp1.setAttribute("class","malrep");
sp1.setAttribute("className","malrep");
var sp2 = document.getElementById("t"+i);
var parentDiv = sp2.parentNode;
parentDiv.insertBefore(sp1, sp2);
d.removeChild(entree);
}
}
resultat();
}
function resultat(){
centrer();
var ic = document.getElementById("score");
var l = (largeur-400)/2;
var t = (hauteur-130)/2;
ic.style.left = l+"px";
ic.style.top = t+"px";
ic.style.visibility="visible";
ic.style.display="block";
ic.innerHTML="Résultat : "+points+" sur "+rep.length+" !"
if(points<rep.length) {
ic.innerHTML+="<br \/><small><small>Les réponses en jaune sont les réponses qui étaient attendues.<\/small><\/small><br \/>";
}
ic.innerHTML +="<br \/><hr \/><span class=\"ok_btn\" onclick=\"document.getElementById('score').style.visibility='hidden';document.getElementById('score').style.display='none';\";>OK<\/span>";
}
function recommencer(){
document.location = document.location;
}
var parselimit=0;var curmin="";var curmin=0;var cursec=0;var curtime="";var id="";
function decompte(){
var limit="1:00";
if (document.images){parselimit=limit.split(':');parselimit=parselimit[0]*60+parselimit[1]*1;}
begintimer();
}
function begintimer(){
if (!document.images){return;}
if (parselimit==0){alert("Désolé !\n\nLe temps imparti est écoulé !");corriger();}
else{
parselimit-=1;curmin=Math.floor(parselimit/60);cursec=parselimit%60;
if (cursec<10){cursec='0'+cursec;}
if (curmin!=0){curtime=curmin+':'+cursec;}
else{curtime='0:'+cursec;}
document.getElementById("chrono").innerHTML= curtime;
id=setTimeout("begintimer()",1000);
}
}
//]]>
</script>
</head>
<body onload="decompte()">
<div id="titre">Quiz<br />
<span id="auteur_date">
Auteur : Zamble
 (30/6/2020)
</span>
</div>
<div id="consigne">    conjuguez au présent</div>
<div id="chrono">00:00</div>
<div id="frm"><form id="txt" name="txt" action="">
 je mang<input type="text" id="t0" class="inp" size="1" /><br /> tu mang<input type="text" id="t1" class="inp" size="2" /><br /> il mang<input type="text" id="t2" class="inp" size="1" /><br /> nous mang<input type="text" id="t3" class="inp" size="4" /><br /> vous mang<input type="text" id="t4" class="inp" size="2" /><br /> ils mang<input type="text" id="t5" class="inp" size="3" />
</form></div>
<div id="score">.</div>
<div id="commandes">
<input type="button" value="Corriger" onclick="corriger();" />
<input type="button" value="Recommencer" onclick="recommencer();" />
</div>
<div id="creation"> <b><a href=" " target="_blank"> </a></b> </div>
</body>
</html>
