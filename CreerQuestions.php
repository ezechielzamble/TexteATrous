<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <!-- <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /> -->
    <meta name="description" content=
    "GaPeX est un script qui permet de créer des exercices interactifs de type texte lacunaire ou texte à trous à effectuer en ligne sur le web ou sur un ordinateur" />
    <meta charset="utf-8">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="keywords" content=
    "GaPeX,exercices en ligne,créer,texte lacunaire,texte à trous,interactifs,générateur,exerciseur" />
    <meta name="author" content="Ezechiel Zamble" />
    <title>Générateur de Textes à Trous</title>
    <!-- <link rel="stylesheet" href="gapex.css" type="text/css" /> -->
    <link rel="stylesheet" href="gtt.css" type="text/css" />
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
    <script type="text/javascript" src="gapex.js"></script>
    <script type="text/javascript" src="jscolor.js"></script>
<!-- début TinyMCE -->
    <script type="text/javascript" src="TINYMCE/jscripts/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript" src="TINYMCE/config.js"></script>
<!-- fin TinyMCE -->


  </head>
  <body onload="dater();">
    <div id="menu">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="logo"><a href="#"><span>Textes</span> à trous</a></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        
      <!-- <span onclick="document.location.href='#intr';" title="Introduction au Générateur de texte à trou">[Introduction]</span>&nbsp; -->
      <span onclick="document.location.href='#prm';" title="Paramètres de l'exercice">[Fixer les paramètres]</span>&nbsp;
      <!-- <span onclick="document.location.href='#qst';" title="Créer le texte à trous">[Créer les questions]</span>&nbsp; -->
      <span onclick="document.location.href='#conf';" title="Créer le design de la page">[Configurer la page]</span>&nbsp;
      <span onclick="previsualiser();" title="Voir la page dans le navigateur">[Prévisualiser]</span>&nbsp;
      <span onclick="document.location.href='#gen';" title="Créer le code HTML et JavaScript">[Générer le code]</span>&nbsp;
      <span onclick="inserer_image();" title="Insérer une image">[Image]</span>&nbsp;
      <span onclick="document.location.href='#tx';" id="txt_a_lire" title="Annexer un texte">[Texte]</span>
      </nav>  
    </div>
    
    <!-- <div > -->
    <div class="container">
    <div id="corps">
    <p class="vide">&nbsp;<br /></p>
      <div id="titre">
        <span class="tit">Générateur de textes à trous</span>
      </div>
      <a name="intr" id="intr"></a>
      
      <!-- <p class="vide">&nbsp;</p> -->
      <a name="qst" id="qst"></a>
      <p class="vide">&nbsp;<br /></p>
      
      <div id="entrer_quest" class="cadre">
        <p class="soustitre">
          Créer les questions
        </p>
        <div id="cadre_txt">
          <p class="indent">
            Entrez la consigne pour l'exercice dans le cadre ci-dessous :
          </p>
          <div>
            <a href="#" onclick="slidedown_showHide('box1');return false;"><span class=
            "aide_txt" title="Aide pour la consigne">AIDE</span></a>
            <div class="conteneur" id="box1">
              <div class="contenu" id="subBox1">
                <ul>
                  <li>Entrez dans le cadre ci-dessous la consigne pour l'exercice.<br />
                    Expliquez ce que vous attendez de l'utilisateur final et la<br />
                    manière dont il doit s'y prendre.
                  </li>
                  <li>Vous pouvez utiliser la touche [Enter] pour faire un saut de<br />
                    ligne.
                  </li>
                  <li>Vous pouvez incorporer une/des image(s) dans la consigne en<br />
                    utilisant la fonction [Image] du menu.
                  </li>
                  <li>Vous pouvez proposer dans ce cadre les réponses dans le désordre.<br />
                  <small>(voir '<span onmouseover="this.style.cursor='pointer';" onclick="document.location.href='#prm';"><u>Param�tres</u></span>')</small><br />
                    L'utilisateur final pourra ainsi employer le copier/coller ou<br />
                    ou le glisser/déposer pour entrer ses réponses dans les trous.
                  </li>
                </ul>
                <hr />
                <div class="fermer">
                  <small><a href="#" onclick="slidedown_showHide('box1');return false;">Fermer</a></small><br />
                  <br />
                </div>
              </div>
            </div>
          </div>
          <p>
            <textarea id="consigne" rows="2" cols="100" onchange="consigne=this.value;">
</textarea><br />
          </p>
          <div class="indent">
            <ul>
              <li>Entrez le texte dans le cadre ci-dessous.
              </li>
              <li>Marquez ensuite les mots à cacher en les plaçant entre des accolades !
              </li>
              <li>Veuillez n'utiliser les accolades que pour marquer les mots !
              </li>
              <li>Consultez l'aide !
              </li>
            </ul>
          </div>
          <div>
            <a href="#" onclick="slidedown_showHide('box2');return false;"><span class=
            "aide_txt" title="Aide pour le texte à trou">AIDE</span></a>
            <div class="conteneur" id="box2">
              <div class="contenu" id="subBox2">
                <ul>
                  <li>Pour créer un trou, double-cliquez sur le mot, puis cliquez sur le bouton
                  {...}
                  </li>
                  <li>Pour créer un trou de plusieurs mots consécutifs, sélectionnez-les en
                  glissant la souris dessus<br />
                    et en maintenant le bouton gauche enfoncé, puis cliquez sur le bouton {...}.
                  </li>
                  <li>Le programme supprime automatiquement l'éventuel espace en fin de sélection.
                  </li>
                  <li>Pour annuler un trou, procédez comme ci-dessus, mais cliquez ensuite sur le
                  bouton {X}.
                  </li>
                  <li>Vous pouvez incorporer dans votre texte des balises HTML de mise en forme telles que, par exemple,<br />
                  &lt;b&gt;...&lt;/b&gt; pour le gras, &lt;i&gt;...&lt;/i&gt; pour l'italique, &lt;u&gt;...&lt;/u&gt; pour le souligné etc.</li>
                  <li>Une fois <b>TOUS</b> les trous créés, cliquez sur le bouton SAUVER.
                  </li>
                  <li>Si vous avez choisi d'afficher des indices et/ou des commentaires, les
                  boutons respectifs s'affichent.<br />
                    Cliquez dessus pour entrer vos données.
                  </li>
                </ul>
                <hr />
                <div class="fermer">
                  <small><a href="#" onclick="slidedown_showHide('box2');return false;">Fermer</a></small><br />
                  <br />
                </div>
              </div>
            </div>
          </div>
          <form id="frm" name="frm" action="">
            <p>
              <textarea id="texte_lac" class="txt" name="texte_lac" rows="20" cols="10"></textarea>
            </p>
            <p class="commandes">
              <input type="button" class="accolades1" id="marq" title="Créer un trou" value="{...}"
              onclick="marquer('{');" /> <input type="button" class="accolades2" id="annuler"
              title="Annuler le trou" value=" {X} " onclick="oter();" /> <input type="button"
              class="accolades1" id="ok" title="Sauver" value="Sauver" onclick="sauver();" />
              <input type="button" class="inputcache" id="ind" title="Entrer les indices" value=
              "Indices" onclick="entrer_indices();" /> <input type="button" class="inputcache"
              id="com" title="Entrer les commentaires" value="Commentaires" onclick=
              "commenter();" />
            </p>
          </form>
        </div>
      </div>

    