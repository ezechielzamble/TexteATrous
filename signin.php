<?php
try
{
  $objetPdo = new PDO('mysql:host=localhost;dbname=gtt','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES'utf8'"));
  $objetPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if(isset($_POST["signin"]))
  {
  		$email = htmlspecialchars($_POST['email']);
        $pass = sha1($_POST['motdepasse']);
      if(empty($_POST["email"]) || empty($_POST["motdepasse"]))
      {
        $message = '<label>Tous les champs sont requis !</label>';
      }
      else
      {
        $query = ("SELECT * FROM users WHERE email = ? AND motdepasse = ?");
        $statement = $objetPdo->prepare($query);
        $statement->execute(
              array(
              		$email, $pass
                    // '?' => $_POST["email"],
                    // '?' => $_POST["motdepasse"]
                  )
            );
            $count = $statement->rowCount();
            if ($count > 0)
            {
            	$userinfo = $statement->fetch();
            	$_SESSION['id'] = $userinfo['id'];
            	$_SESSION['nom'] = $userinfo['nom'];
                $_SESSION["email"] = $userinfo["email"];
                header("location:bim.php?page=home");

            }
            else
            {
                $message ='<label>données incorrecte !</label>';
            }
      }
  }
}
catch(PDOException $error)
{
  $message = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Se connecter</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="BHost template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>
<body>

<div class="super_container">
  
  <!-- Header -->





  <!-- Contact -->

  <div class="contact">
    <div class="container">
      <div class="row">

        <!-- Contact Form -->
        <div class="col-lg-6 offset-lg-4 contact_form_col">
          <div class="contact_form_container"><br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <form class="contact_form" id="contact_form" method="POST">
              <div class="">
                <div class="col-lg-6"><input type="email" class="contact_input" name="email" placeholder="votre identifiant" required="required"></div><br>
                                
                <div class="col-lg-6"><input type="password" class="contact_input" name="motdepasse" placeholder="votre mot de passe" required="required"></div><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Register.php">Pas encore de compte</a>
                
              </div>
                              <?php
                            if(isset($message))
                            {
                                echo '<font color="red">'.$message."</font>";
                            }
                            ?>
                            <br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="contact_button trans_200" type="submit" name="signin">Se Connecter</button>
            </form><br>
            
          </div>
        </div>
      </div>