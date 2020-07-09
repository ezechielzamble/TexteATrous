<?php
session_start();
if (isset($_SESSION["id"]))
{
?>
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
        
        
      <span onclick="previsualiser();" title="Voir la page dans le navigateur">Prévisualiser</span>&nbsp;
      <span onclick="document.location.href='#gen';" title="Créer le code HTML et JavaScript">Générer le code</span>&nbsp;
      <span onclick="document.location.href='#tx';" id="txt_a_lire" title="Annexer un texte">Texte</span>

      <div class="phone d-flex flex-row align-items-center justify-content-start">
          <a><i class=" " aria-hidden="true"></i>

          <?php
                        // if(isset($_SESSION["id"])){
                        ?>
                        <div><font color="white">Bienvenue - <?php echo $_SESSION['nom']; ?></font></div>
                        <?php
                        }
          ?>
        </div>
        <?php
                        {
                        ?>
                        <a href="deconnexion.php">Se deconnecter</a>
                        <?php
                        }
                        ?>
      </nav>  
    </div>
    
    <!-- <div id="corps"> -->
      <div class="container">
        <div id="corps">
          <div id="titre">
            <span class="tit">Générateur de textes à trous</span>
          </div><a name="intr" id="intr"></a>
          
          <p class="vide">&nbsp;</p>
          
          <div id="intro" class="cadre">
            <!-- <p class="soustitre">
              Introduction
            </p> -->
            <div id="txt_intro">
              
            </div><br />
          </div><a name="prm" id="prm"></a>
          
          <p class="vide">&nbsp;</p>
          
          <div id="parametres" class="cadre">
            <p class="soustitre">
              Fixer les paramètres
            </p>
            <p class="italic">
              complétez les données suivantes : <sup>( * = facultatif )</sup>
            </p>
            <table id="titre_consigne" summary="">
              <tr>
                <td>
                  Titre de la page<sup><span title="Titre qui s'affiche dans l'onglet du navigateur" onmouseover="this.style.cursor='pointer'"></span></sup> :
                </td>
                <td>
                  <input type="text" id="titre_pg" onchange="titre_page=this.value;" />
                </td>
              </tr>
              <tr>
                <td>
                  Titre de l'exercice :
                </td>
                <td>
                  <input type="text" id="titre_ex" onchange="titre=this.value;" />
                </td>
              </tr>
              <tr>
                <td>
                  Auteur de l'exercice * :
                </td>
                <td>
                  <input type="text" id="auteur" onchange="auteur=this.value;" />
                </td>
              </tr>
              <tr>
                <td>
                  Date de création * :
                </td>
                <td>
                  <input type="text" id="date" onchange="date=this.value;" />
                </td>
              </tr>
            </table><br />
            <p class="italic">
              Pour sélectionner un paramètre, cochez la case correspondante.<br />
              Si nécessaire, complétez les renseignements supplémentaires (délai, nom du fichier .js)
            </p>
            <p class="indent">
              Je désire :<br />
              <input type="checkbox" id="textannexe" onclick="txt_lect();" /> annexer un texte à
              lire<br />
              <input type="checkbox" id="chr" onclick="fixer_delai();" /> fixer un délai pour effectuer
              l'exercice <span id="del">==&gt;Délai : <select name='delai' id='delai' onclick=
              "delai=this.value;">
                <option value='1:00'>
                  1:00
                </option>
                <option value='1:30'>
                  1:30
                </option>
                <option value='2:00'>
                  2:00
                </option>
                <option value='2:30'>
                  2:30
                </option>
                <option value='3:00'>
                  3:00
                </option>
                <option value='3:30'>
                  3:30
                </option>
                <option value='4:00'>
                  4:00
                </option>
                <option value='4:30'>
                  4:30
                </option>
                <option value='5:00' selected='selected'>
                  5:00
                </option>
                <option value='5:30'>
                  5:30
                </option>
                <option value='6:00'>
                  6:00
                </option>
                <option value='6:00'>
                  6:00
                </option>
                <option value='6:30'>
                  6:30
                </option>
                <option value='7:00'>
                  7:00
                </option>
                <option value='7:30'>
                  7:30
                </option>
                <option value='8:00'>
                  8:00
                </option>
                <option value='8:30'>
                  8:30
                </option>
                <option value='9:00'>
                  9:00
                </option>
                <option value='9:30'>
                  9:30
                </option>
                <option value='10:00'>
                  10:00
                </option>
                <option value='10:30'>
                  10:30
                </option>
                <option value='11:00'>
                  11:00
                </option>
                <option value='11:30'>
                  11:30
                </option>
                <option value='12:00'>
                  12:00
                </option>
                <option value='12:30'>
                  12:30
                </option>
                <option value='13:00'>
                  13:00
                </option>
                <option value='13:30'>
                  13:30
                </option>
                <option value='14:00'>
                  14:00
                </option>
                <option value='14:30'>
                  14:30
                </option>
                <option value='15:00'>
                  15:00
                </option>
              </select>(min:sec)</span><br />
              <input type="checkbox" id="mel" onclick="it_mel();" /> afficher les éléments à trouver
              dans un ordre mélangé<br />
              <input type="checkbox" id="indi" onclick="change_indice();" /> fournir la possibilité de
              consulter un indice par trou<br />
              <input type="checkbox" id="comment" onclick="commentaires();" /> ajouter un commentaire
              pour chaque réponse fausse<br />
              <input type="checkbox" id="montrer_rep" onclick="montre_rep();" /> montrer les bonnes
              réponses en fin d'exercice<br />
              <input type="checkbox" id="recommencer" onclick="recom();" /> donner la possibilité de
              recommencer l'exercice<br />
              <!-- <input type="checkbox" id="js_separe" onclick="js_separ();" /> sauver le code JavaScript
              dans un fichier externe<br /> -->

              <span id="fichierjs">==&gt; Nom du fichier JavaScript : <input type="text" size=
              "35" id="fjs" /> (avec l'extension <b>.js</b> !)</span>
            </p>
          </div>
          
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
              
              <p>
                <textarea id="consigne" rows="2" cols="100" onchange="consigne=this.value;">
    </textarea><br />
              </p>
              <div class="indent">
                <ul>
                  <li>Entrez le texte dans le cadre ci-dessous.
                  </li>
                  <li>Double cliquez sur un mot pour le selectionner 
                  </li>
                  <li>Ensuite cliquez sur créer un trou !
                  </li>
                  <li>
                  </li>
                </ul>
              </div>
             
              <form id="frm" name="frm" action="">
                <p>
                  <textarea id="texte_lac" class="txt" name="texte_lac" rows="20" cols="10">&nbsp;</textarea>
                </p>
                <p class="commandes">
                  <input type="button" class="accolades1" id="marq" title="Créer un trou" value="Créer un trou"
                  onclick="marquer('{');" /> <input type="button" class="accolades2" id="annuler"
                  title="Annuler le trou" value="Annuler le trou" onclick="oter();" /> <input type="button"
                  class="accolades1" id="ok" title="Sauver" value="Sauver" onclick="sauver();" />
                  <input type="button" class="inputcache" id="ind" title="Entrer les indices" value=
                  "Indices" onclick="entrer_indices();" /> <input type="button" class="inputcache"
                  id="com" title="Entrer les commentaires" value="Commentaires" onclick=
                  "commenter();" />
                </p>
              </form>
            </div>
          </div><a name="conf" id="conf"></a>
          
          <p class="vide">&nbsp;</p>
          
          <div id="configuration" class="cadre">
            <p class="soustitre">
              Configurer la page
            </p>
            
            <form name='tcp_test' action="" id="tcp_test">
              <table summary="">
                <tr>
                  <td class="titre_col" colspan="2">
                    PAGE
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur de fond
                  </td>
                  <td>
                    <input type='text' class="color" id='fondpage' size='6' value='FFFFFF' />
                  </td>
                </tr>
              </table>
              <table summary="">
                <tr>
                  <td class="titre_col" colspan="2">
                    TITRE
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur de fond
                  </td>
                  <td>
                    <input type='text' class="color" id='fondtitre' size="6" value='FFFFFF' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Police de caractères
                  </td>
                  <td>
                    <select name='poltitre' id='poltitre'>
                      <option value='Arial' selected='selected'>
                        Arial
                      </option>
                      <option value='Comic sans MS'>
                        Comic sans MS
                      </option>
                      <option value='Courier New'>
                        Courier New
                      </option>
                      <option value='Times New Roman'>
                        Times New Roman
                      </option>
                      <option value='Verdana'>
                        Verdana
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur
                  </td>
                  <td>
                    <input type='text' class="color" id='coltitre' size="6" value='000000' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Style
                  </td>
                  <td>
                    <select name='styletitre' id='styletitre'>
                      <option value='Normal' selected='selected'>
                        Normal
                      </option>
                      <option value='italic'>
                        Italique
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Graisse
                  </td>
                  <td>
                    <select name='poidstitre' id='poidstitre'>
                      <option value='Normal' selected='selected'>
                        Normal
                      </option>
                      <option value='bold'>
                        Gras
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Taille
                  </td>
                  <td>
                    <select name='tailletitre' id='tailletitre'>
                      <option value='16' selected='selected'>
                        16
                      </option>
                      <option value='18'>
                        18
                      </option>
                      <option value='20'>
                        20
                      </option>
                      <option value='22'>
                        22
                      </option>
                      <option value='24'>
                        24
                      </option>
                      <option value='26'>
                        26
                      </option>
                      <option value='28'>
                        28
                      </option>
                      <option value='32'>
                        32
                      </option>
                    </select> pt.
                  </td>
                </tr>
                <tr>
                  <td>
                    Alignement
                  </td>
                  <td>
                    <select name='txtaligntitre' id='txtaligntitre'>
                      <option value='left' selected='selected'>
                        à gauche
                      </option>
                      <option value='center'>
                        centré
                      </option>
                      <option value='right'>
                        à droite
                      </option>
                    </select>
                  </td>
                </tr>
              </table>
              <table summary="">
                <tr>
                  <td class="titre_col" colspan="2">
                    CONSIGNE
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur de fond
                  </td>
                  <td>
                    <input type='text' class="color" id='fondcons' size="6" value='FFFFFF' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Police de caractères
                  </td>
                  <td>
                    <select name='polcons' id='polcons'>
                      <option value='Arial' selected='selected'>
                        Arial
                      </option>
                      <option value='Comic sans MS'>
                        Comic sans MS
                      </option>
                      <option value='Courier New'>
                        Courier New
                      </option>
                      <option value='Times New Roman'>
                        Times New Roman
                      </option>
                      <option value='Verdana'>
                        Verdana
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur
                  </td>
                  <td>
                    <input type='text' class="color" id='colcons' size="6" value='000000' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Style
                  </td>
                  <td>
                    <select name='stylecons' id='stylecons'>
                      <option value='normal' selected='selected'>
                        Normal
                      </option>
                      <option value='Italic'>
                        Italique
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Graisse
                  </td>
                  <td>
                    <select name='poidscons' id='poidscons'>
                      <option value='normal' selected='selected'>
                        Normal
                      </option>
                      <option value='bold'>
                        Gras
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Taille
                  </td>
                  <td>
                    <select name='taillecons' id='taillecons'>
                      <option value='12' selected='selected'>
                        12
                      </option>
                      <option value='13'>
                        13
                      </option>
                      <option value='14'>
                        14
                      </option>
                      <option value='15'>
                        15
                      </option>
                      <option value='16'>
                        16
                      </option>
                      <option value='18'>
                        18
                      </option>
                    </select> pt.
                  </td>
                </tr>
                <tr>
                  <td>
                    Alignement
                  </td>
                  <td>
                    <select name='txtaligncons' id='txtaligncons'>
                      <option value='left' selected='selected'>
                        à gauche
                      </option>
                      <option value='center'>
                        centré
                      </option>
                      <option value='right'>
                        à droite
                      </option>
                    </select>
                  </td>
                </tr>
              </table>
              <table class="chro" summary="">
                <tr>
                  <td class="titre_col" colspan="2">
                    CHRONOMETRE
                  </td>
                </tr>
                <tr>
                  <td>
                    Police de caractères
                  </td>
                  <td>
                    <select name='polchro' id='polchro'>
                      <option value='Arial' selected='selected'>
                        Arial
                      </option>
                      <option value='Comic sans MS'>
                        Comic sans MS
                      </option>
                      <option value='Courier New'>
                        Courier New
                      </option>
                      <option value='Times New Roman'>
                        Times New Roman
                      </option>
                      <option value='Verdana'>
                        Verdana
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur
                  </td>
                  <td>
                    <input type='text' class="color" id='colchro' size="6" value='000000' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Style
                  </td>
                  <td>
                    <select name='stylechro' id='stylechro'>
                      <option value='normal' selected='selected'>
                        Normal
                      </option>
                      <option value='Italic'>
                        Italique
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Graisse
                  </td>
                  <td>
                    <select name='poidschro' id='poidschro'>
                      <option value='normal' selected='selected'>
                        Normal
                      </option>
                      <option value='bold'>
                        Gras
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Taille
                  </td>
                  <td>
                    <select name='taillechro' id='taillechro'>
                      <option value='14' selected='selected'>
                        14
                      </option>
                      <option value='15'>
                        15
                      </option>
                      <option value='16'>
                        16
                      </option>
                      <option value='17'>
                        17
                      </option>
                      <option value='18'>
                        18
                      </option>
                      <option value='19'>
                        19
                      </option>
                      <option value='20'>
                        20
                      </option>
                    </select> pt.
                  </td>
                </tr>
                <tr>
                  <td>
                    Alignement
                  </td>
                  <td>
                    <select name='txtalignchro' id='txtalignchro'>
                      <option value='left'>
                        à gauche
                      </option>
                      <option value='center' selected='selected'>
                        centré
                      </option>
                      <option value='right'>
                        à droite
                      </option>
                    </select>
                  </td>
                </tr>
              </table>
              <table summary="">
                <tr>
                  <td class="titre_col" colspan="2">
                    CADRE DE FOND DE L'EXERCICE
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur de fond
                  </td>
                  <td>
                    <input type='text' class="color" id='fondfrm' size="6" value='FFFFFF' />
                  </td>
                </tr>
              </table>
              <table summary="">
                <tr>
                  <td class="titre_col" colspan="2">
                    TEXTE LACUNAIRE
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur de fond
                  </td>
                  <td>
                    <input type='text' class="color" id='fondtxt' size="6" value='FFFFFF' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Police de caractères
                  </td>
                  <td>
                    <select name='poltxt' id='poltxt'>
                      <option value='Arial' selected='selected'>
                        Arial
                      </option>
                      <option value='Comic sans MS'>
                        Comic sans MS
                      </option>
                      <option value='Courier New'>
                        Courier New
                      </option>
                      <option value='Times New Roman'>
                        Times New Roman
                      </option>
                      <option value='Verdana'>
                        Verdana
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur
                  </td>
                  <td>
                    <input type='text' class="color" id='coltxt' size="6" value='000000' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Style
                  </td>
                  <td>
                    <select name='styletxt' id='styletxt'>
                      <option value='normal' selected='selected'>
                        Normal
                      </option>
                      <option value='Italic'>
                        Italique
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Graisse
                  </td>
                  <td>
                    <select name='poidstxt' id='poidstxt'>
                      <option value='normal' selected='selected'>
                        Normal
                      </option>
                      <option value='bold'>
                        Gras
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Taille
                  </td>
                  <td>
                    <select name='tailletxt' id='tailletxt'>
                      <option value='10'>
                        10
                      </option>
                      <option value='11'>
                        11
                      </option>
                      <option value='12' selected='selected'>
                        12
                      </option>
                      <option value='13'>
                        13
                      </option>
                      <option value='14'>
                        14
                      </option>
                      <option value='15'>
                        15
                      </option>
                      <option value='16'>
                        16
                      </option>
                    </select> pt.
                  </td>
                </tr>
              </table>
              <table class="indi" summary="">
                <tr>
                  <td class="titre_col" colspan="2">
                    INDICES
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur de fond
                  </td>
                  <td>
                    <input type='text' class="color" id='fondind' size="6" value='FFFFFF' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Police de caractères
                  </td>
                  <td>
                    <select name='polind' id='polind'>
                      <option value='Arial' selected='selected'>
                        Arial
                      </option>
                      <option value='Comic sans MS'>
                        Comic sans MS
                      </option>
                      <option value='Courier New'>
                        Courier New
                      </option>
                      <option value='Times New Roman'>
                        Times New Roman
                      </option>
                      <option value='Verdana'>
                        Verdana
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur
                  </td>
                  <td>
                    <input type='text' class="color" id='colind' size="6" value='000000' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Style
                  </td>
                  <td>
                    <select name='styleind' id='styleind'>
                      <option value='normal' selected='selected'>
                        Normal
                      </option>
                      <option value='Italic'>
                        Italique
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Graisse
                  </td>
                  <td>
                    <select name='poidsind' id='poidsind'>
                      <option value='normal' selected='selected'>
                        Normal
                      </option>
                      <option value='bold'>
                        Gras
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Taille
                  </td>
                  <td>
                    <select name='tailleind' id='tailleind'>
                      <option value='8'>
                        8
                      </option>
                      <option value='9' selected='selected'>
                        9
                      </option>
                      <option value='10'>
                        10
                      </option>
                      <option value='11'>
                        11
                      </option>
                    </select> pt.
                  </td>
                </tr>
                <tr>
                  <td>
                    Alignement
                  </td>
                  <td>
                    <select name='txtalignind' id='txtalignind'>
                      <option value='left' selected='selected'>
                        à gauche
                      </option>
                      <option value='center'>
                        centré
                      </option>
                      <option value='right'>
                        à droite
                      </option>
                    </select>
                  </td>
                </tr>
              </table>
              <table class="comm" summary="">
                <tr>
                  <td class="titre_col" colspan="2">
                    COMMENTAIRES
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur de fond
                  </td>
                  <td>
                    <input type='text' class="color" id='fondcom' size="6" value='FFFFFF' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Police de caractères
                  </td>
                  <td>
                    <select name='polcom' id='polcom'>
                      <option value='Arial' selected='selected'>
                        Arial
                      </option>
                      <option value='Comic sans MS'>
                        Comic sans MS
                      </option>
                      <option value='Courier New'>
                        Courier New
                      </option>
                      <option value='Times New Roman'>
                        Times New Roman
                      </option>
                      <option value='Verdana'>
                        Verdana
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur
                  </td>
                  <td>
                    <input type='text' class="color" id='colcom' size="6" value='000000' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Style
                  </td>
                  <td>
                    <select name='stylecom' id='stylecom'>
                      <option value='normal' selected='selected'>
                        Normal
                      </option>
                      <option value='Italic'>
                        Italique
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Graisse
                  </td>
                  <td>
                    <select name='poidscom' id='poidscom'>
                      <option value='normal' selected='selected'>
                        Normal
                      </option>
                      <option value='bold'>
                        Gras
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Taille
                  </td>
                  <td>
                    <select name='taillecom' id='taillecom'>
                      <option value='8'>
                        8
                      </option>
                      <option value='9' selected='selected'>
                        9
                      </option>
                      <option value='10'>
                        10
                      </option>
                      <option value='11'>
                        11
                      </option>
                    </select> pt.
                  </td>
                </tr>
                <tr>
                  <td>
                    Alignement
                  </td>
                  <td>
                    <select name='txtaligncom' id='txtaligncom'>
                      <option value='left' selected='selected'>
                        à gauche
                      </option>
                      <option value='center'>
                        centré
                      </option>
                      <option value='right'>
                        à droite
                      </option>
                    </select>
                  </td>
                </tr>
              </table>
              <table summary="">
                <tr>
                  <td class="titre_col" colspan="2">
                    SCORE
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur de fond
                  </td>
                  <td>
                    <input type='text' class="color" id='fondscore' size="6" value='FFFFFF' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Police de caractères
                  </td>
                  <td>
                    <select name='polscore' id='polscore'>
                      <option value='Arial' selected='selected'>
                        Arial
                      </option>
                      <option value='comic sans MS'>
                        comic sans MS
                      </option>
                      <option value='Courier New'>
                        Courier New
                      </option>
                      <option value='Times New Roman'>
                        Times New Roman
                      </option>
                      <option value='Verdana'>
                        Verdana
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur
                  </td>
                  <td>
                    <input type='text' class="color" id='colscore' size="6" value='000000' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Style
                  </td>
                  <td>
                    <select name='stylescore' id='stylescore'>
                      <option value='normal' selected='selected'>
                        Normal
                      </option>
                      <option value='Italic'>
                        Italique
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Graisse
                  </td>
                  <td>
                    <select name='poidsscore' id='poidsscore'>
                      <option value='normal' selected='selected'>
                        Normal
                      </option>
                      <option value='bold'>
                        Gras
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Taille
                  </td>
                  <td>
                    <select name='taillescore' id='taillescore'>
                      <option value='10'>
                        10
                      </option>
                      <option value='12' selected='selected'>
                        12
                      </option>
                      <option value='13'>
                        13
                      </option>
                      <option value='14'>
                        14
                      </option>
                      <option value='15'>
                        15
                      </option>
                      <option value='16'>
                        16
                      </option>
                      <option value='18'>
                        18
                      </option>
                    </select> pt.
                  </td>
                </tr>
                <tr>
                  <td>
                    Alignement
                  </td>
                  <td>
                    <select name='txtalignscore' id='txtalignscore'>
                      <option value='left' selected='selected'>
                        à gauche
                      </option>
                      <option value='center'>
                        centré
                      </option>
                      <option value='right'>
                        à droite
                      </option>
                    </select>
                  </td>
                </tr>
              </table>
              <table summary="">
                <tr>
                  <td class="titre_col" colspan="2">
                    CADRE DES BOUTONS
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur de fond
                  </td>
                  <td>
                    <input type='text' class="color" id='fondcmd' size="6" value='FFFFFF' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Alignement
                  </td>
                  <td>
                    <select name='txtaligncmd' id='txtaligncmd'>
                      <option value='left'>
                        à gauche
                      </option>
                      <option value='center' selected='selected'>
                        centré
                      </option>
                      <option value='right'>
                        à droite
                      </option>
                    </select>
                  </td>
                </tr>
              </table>
              <table summary="">
                <tr>
                  <td class="titre_col" colspan="2">
                    TROUS
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur de fond
                  </td>
                  <td>
                    <input type='text' class="color" id='fondinp' size="6" value='FFFFFF' />
                  </td>
                </tr>
                <tr>
                  <td>
                    Police de caractères
                  </td>
                  <td>
                    <select name='polinp' id='polinp'>
                      <option value='Arial' selected='selected'>
                        Arial
                      </option>
                      <option value='comic sans MS'>
                        comic sans MS
                      </option>
                      <option value='Courier New'>
                        Courier New
                      </option>
                      <option value='Times New Roman'>
                        Times New Roman
                      </option>
                      <option value='Verdana'>
                        Verdana
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Couleur
                  </td>
                  <td>
                    <input type='text' class="color" id='colinp' size="6" value='000000' />
                  </td>
                </tr>
              </table>
            </form>
    
          </div><a name="gen" id="gen"></a>
          
          <p class="vide">&nbsp;</p>
          
          <div id="generation" class="cadre">
            <p class="soustitre">
              Générer le code
            </p>
            <div id="genera" class="fond">
              <div id="instruc" class="instruc">
                <span class="titrecode">Génération du code HTML</span><br />
                <br />
                -&gt; <input type="button" id="bouton_generer" value="Générer" onclick=
                "generation();" /><span id="fini1" class="fini"></span><br /><br />
                    -&gt;clic sur choisir un fichier pour ajouter un medias =&gt; puis sur uploader.<br />
                <form method="post" action="generateur.php" enctype="multipart/form-data">
                <input type="file" name="file">
                <input type="submit" name="upload" value="UPLOAD"><br />
                </form>
                
                <?php
                        $con = mysqli_connect('localhost','root','','gtt');
                        if (isset($_POST['upload'])){
                            $name= $_FILES['file']['name'];
                            $tmp= $_FILES['file']['tmp_name'];
                            move_uploaded_file($tmp, "medias/".$name);
                            $sql="INSERT INTO videos (name) VALUE('$name')";
                            $res=mysqli_query($con, $sql);
                            if($res==1){
                                echo "<h1>media ajouté</h1>";
                            }
                        }

                     
                ?>
                    <br /><br />
                -&gt;clic droit sur le code sélectionné, puis =&gt;Copier.<br />
                -&gt;Ouvrez le 'Bloc-notes', =&gt; clic droit, =&gt;Coller.<br />
                -&gt;Dans le Bloc-notes =&gt;Fichier, =&gt;Enregistrer sous..., =&gt;donnez un nom
                valide à votre fichier et ajoutez <b>.html</b> comme extension.<br />
                -&gt; Votre exercice est terminé et prêt à être ouvert dans un navigateur ou à être uploadé sur votre site ou votre blog !<br />
                <br />
              </div>
              <form action="">
                <div>
                  <textarea id="page" class="page" name="page" rows="10" cols="100" onblur="effacer('fini1');"></textarea>
                </div>
              </form><br />
              <div id="jssepare" class="jssepare">
                <div id="instrucjs" class="instruc">
                  <span id="codejs" class="titrecode">Génération du code JS séparé</span><br />
                  <br />
                  -&gt; <input type="button" value="Générer" onclick="creer_page_js();" /> <span id=
                  "fini2" class="fini"></span><br />
                  -&gt; Procédez comme pour la page HTML, mais dans le Bloc-notes =&gt;Fichier,
                  -&gt;;Enregistrer sous..., =&gt;donnez le même nom au fichier JavaScript séparé que
                  lors de la configuration.<br />
                  <br />
                </div>
                <form action="">
                  <div>
                    <textarea id="page_js" class="page" name="page_js" rows="10" cols="100" onblur=
                    "effacer('fini1');">
    </textarea>
                  </div>
                </form>
              </div>
            </div>
          </div><a name="tx" id="tx"></a>
          
          <p class="vide">&nbsp;</p>
          
          <div id="textalire" class="cadre">
            <p class="soustitre">
              Texte
            </p>
            <div>
              Texte à joindre :(Entrez le texte soit au clavier, soit par copier/coller, soit par
              glisser/d�poser)<br />
              <b>N.B.</b>: <i>vous pouvez redimensionner le cadre de texte au moyen de la poign�e en
              bas à droite.</i><br />
              <br />
              <form name="WriteForm" id="WriteForm" action="">
                <textarea name="text" id="text" class="areatext" rows="10" cols="80">
    </textarea>
              </form>
            </div>
          </div>
          <div id="div_indices"></div>
          <div id="div_coms"></div>
          
          <div id="image" class="image">
            <h1>Insérer une image</h1>
            <hr />
            <p class="dossierimages">
              <b>ATTENTION !</b><br />
                - Toutes vos images doivent se trouver au préalable dans un dossier que vous aurez nommé "<b>images</b>" et qui sera situé au <u>même niveau</u> que votre exercice !<br />
            </p><br />
            Nom du fichier image : images/ <input type="text" value="" id="nom" size="30" /> (avec
            l'extension <b>.jpg</b>, <b>.png</b> ou <b>.gif</b>)<br />
            <br />
            Largeur de l'image = <input type="text" value="" id="largeur" size="2" /> px&nbsp;&nbsp;|&nbsp;&nbsp;Hauteur
            de l'image = <input type="text" value="" id="hauteur" size="2" /> px&nbsp;&nbsp;|&nbsp;&nbsp;Bordure de l'image = <input type="text" value="0" id="bordure" size="1" /> <small>(0 = aucune bordure)</small><br />
            <br />
            Texte alternatif pour l'image au cas ou celle-ci ne s'afficherait pas : <input type="text"
            value="" id="textealt" size="20" /><br />
            <br />
            Alignement de l'image = <select id="aligne" onclick="alignement=this.value;">
            <option value="left">A gauche</option>
            <option value="none" selected="selected">Aucun</option>
            <option value="right">A droite</option>
            </select>
            <div id="pict"></div>
            <hr />
            <div class="code">
              <input type="button" value=" OK " title="Afficher le code" onclick="code_image();" />
            </div>
            <div id="codeimage">
              Code à copier/coller ou glisser/déposer à l'endroit ou vous désirez voir apparaître
              l'image :<br />
              <input type="text" value="" id="codeimg" size="90" /><br />
              <small>Si nécessaire, vous pouvez encore modifier les paramètres pour cette image. Cliquez ensuite sur OK.</small>
            </div><br />
            <div class="code">
              <input type="button" value="Fermer" title="Fermer la fenêtre" onclick="fermer_div();" />
            </div>
          </div>
        </div>
        <div id="validation">
          
        </div>
    </div>
    
  </body>
</html>
