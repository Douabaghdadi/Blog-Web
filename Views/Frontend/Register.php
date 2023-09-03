<?php 


include '../../Controller/UserC.php';

require_once '../../model/User.php';

$UserC = new UserC();

if (isset($_REQUEST['add'])) {
  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         
          $UserC = new UserC();
          if (isset($_REQUEST['add'])) {
            $UserC = new UserC();
          $Now = new DateTime('now', new DateTimeZone('Europe/Paris'));
          $date = DateTime::createFromFormat('Y-m-d', $_POST['ddn']);
          
            $user = new User(1,$_POST['nom'],$_POST['prenom'], $_POST['login'],$_POST['email'],$date,$target_file,$_POST['password'],$Now,$_POST['genre'],$_POST['role']);
            $UserC->register($user);
            
           
            header('Location:login.php');
          } 
         
      } else {
          echo 'error';
      }
    
    }

?> 



<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tiya Golf Club - Free HTML CSS Template</title>

        <!-- CSS FILES -->                
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-tiya-golf-club.css" rel="stylesheet">
        
<!--

TemplateMo 587 Tiya Golf Club

https://templatemo.com/tm-587-tiya-golf-club

-->
    </head>
    
    <body>

        <main>

            <nav class="navbar navbar-expand-lg">                
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="index.html">
                        <img src="images/logo.png" class="navbar-brand-image img-fluid" alt="Tiya Golf Club">
                        <span class="navbar-brand-text">
                            BlogTn
                            <small>BlogTn</small>
                        </span>
                    </a>

                    <div class="d-lg-none ms-auto me-3">
                        <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Member Login</a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                                <a class="nav-link click-scroll" href="login.php">Login</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="register.php">Inscription</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">About</a>
                            </li>

                            
                        </ul>

                        
                    </div>
                </div>
            </nav>

         
            

            <section >

                
            </section>




            <section class="contact-section section-padding" id="section_5">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-5 col-12">
                            <form action="#" method="post" class="custom-form contact-form" enctype="multipart/form-data" role="form">
                                <h2 class="mb-4 pb-2">Inscription</h2>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                        <label for="floatingInput">Nom</label>
                                            <input type="text" name="nom" id="nom" class="form-control" placeholder="entre votre nom" required="">
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                        <label for="floatingInput">Prenom</label>
                                            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="entre votre prenom" required="">
                                            
                                           
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-6 col-md-6 col-12"> 
                                        <div class="form-floating">
                                        <label for="floatingInput">Email</label>
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                        <label for="floatingInput">login</label>
                                            <input type="text" name="login" id="login" class="form-control" placeholder="entre votre login" required="">
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                        <label for="floatingInput">Mot de passe</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="entre votre mot de passe" required="">
                                            
                                          
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                      
                                        <input placeholder="Date de naissance" type="date" name="ddn" class="form-control" id="ddn" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                        
                                        <input required type="file" class="form-control" id="fileToUpload" name="fileToUpload">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                        <label for="floatingInput">Genre</label>
                                        <select  class="form-control" id="genre" name="genre">
                                        <option>---</option>
                                            <option value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                        <label for="floatingInput">Role</label>
                                        <select  class="form-control" id="role" name="role">
                                        <option>---</option>
                                            <option value="Auteur">Auteur</option>
                                            <option value="Lecteur">Lecteur</option>
                                        </select>
                                        </div>
                                    </div>


                                   

                                        <button id="submit-btn" type="submit" name="add" class="form-control">S'inscrire</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script>
      document.addEventListener('DOMContentLoaded', function() {


var submitBtn = document.getElementById('submit-btn');


submitBtn.addEventListener('click', function(event) {
  var nomInput = document.getElementById('nom');
  var nomValue = nomInput.value;


  if (/^[a-zA-Z]+$/.test(nomValue)) {
    // nom input is valid
  } else {
    event.preventDefault();
    var nomErrorMsg = document.createElement('span');
    nomErrorMsg.innerText = 'Le nom  ne doit contenir que des lettres.';
    nomInput.parentNode.insertBefore(nomErrorMsg, nomInput.nextSibling);
  }

  var prenomInput = document.getElementById('prenom');
  var prenomValue = prenomInput.value;


  if (/^[a-zA-Z]+$/.test(prenomValue)) {
    // nom input is valid
  } else {
    event.preventDefault();
    var prenomErrorMsg = document.createElement('span');
    prenomErrorMsg.innerText = 'Le prenom  ne doit contenir que des lettres.';
    prenomInput.parentNode.insertBefore(prenomErrorMsg, prenomInput.nextSibling);
  }


  


  var emailInput = document.getElementById('email');
  var emailValue = emailInput.value;


  if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)) {
    // email input is valid
  } else {
    event.preventDefault();
    var emailErrorMsg = document.createElement('span');
    emailErrorMsg.innerText = 'Veuillez entrer une adresse email valide.';
    emailInput.parentNode.insertBefore(emailErrorMsg, emailInput.nextSibling);
  }
});


});
</script>

                        <div class="col-lg-6 col-12">
                            <div class="contact-info mt-5">
                                <div class="contact-info-item">
                                    <div class="contact-info-body">
                                        <strong>Ariana, Tunisie</strong>

                                        <p class="mt-2 mb-1">
                                            <a href="tel: 010-020-0340" class="contact-link">
                                                (216) 
                                                123-020-0340
                                            </a>
                                        </p>

                                        <p class="mb-0">
                                            <a href="mailto:info@company.com" class="contact-link">
                                                Tn-Blog@esprit.tn
                                            </a>
                                        </p>
                                    </div>

                                    <div class="contact-info-footer">
                                        <a href="#">Directions</a>
                                    </div>
                                </div>

                                <img src="images/WorldMap.svg" class="img-fluid" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 me-auto mb-5 mb-lg-0">
                        <a class="navbar-brand d-flex align-items-center" href="index.html">
                            <img src="images/logo.png" class="navbar-brand-image img-fluid" alt="">
                            <span class="navbar-brand-text">
                                Tiya
                                <small>Golf Club</small>
                            </span>
                        </a>
                    </div>

                    <div class="col-lg-3 col-12">
                        <h5 class="site-footer-title mb-4">Join Us</h5>

                        <p class="d-flex border-bottom pb-3 mb-3 me-lg-3">
                            <span>Mon-Fri</span>
                            6:00 AM - 6:00 PM
                        </p>

                        <p class="d-flex me-lg-3">
                            <span>Sat-Sun</span>
                            6:30 AM - 8:30 PM
                        </p>
                        <br>
                        <p class="copyright-text">Copyright © 2048 Tiya Golf Club</p>
                    </div>

                        <div class="col-lg-2 col-12 ms-auto">
                            <ul class="social-icon mt-lg-5 mt-3 mb-4">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-instagram"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-whatsapp"></a>
                                </li>
                            </ul>
                            <p class="copyright-text">Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                            
                        </div>

                </div>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#81B29A" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
        </footer>


        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/animated-headline.js"></script>
        <script src="js/modernizr.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>