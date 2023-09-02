<?php



include '../../Controller/ArticleC.php';
include '../../Controller/LikesC.php';
include '../../Controller/CommentaireC.php';
include '../../Controller/FavorisC.php';

require_once '../../model/Favoris.php';
require_once '../../model/Commentaire.php';
require_once '../../model/Likes.php';
require_once '../../model/Article.php';
session_start();
$ArticleC = new ArticleC();
$listarticles=$ArticleC->AfficherArticle();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addcomm'])) {
  $CommentC = new CommentaireC();
  $Now = new DateTime('now', new DateTimeZone('Europe/Paris'));
  
  $comment = new Commentaire(1, $_POST['contenu'], $_SESSION['id'], $_POST['postid'], $Now);
  $CommentC->AjouterComment($comment);
  header("Location: postDetail.php?id={$_POST['postid']}");
exit();
}
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tiya Golf Club - Event Listing</title>

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
                            Tiya
                            <small>Golf Club</small>
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
                                <a class="nav-link" href="indexLecteur.php">Blog</a>
                            </li>
    
                            

                            

                            <li class="nav-item">
                                <a class="nav-link" href="favoris.php">Articles favoris</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="index.html#section_5">Contact Us</a>
                            </li>

                            
                        </ul>

                        <div class="d-none d-lg-block ms-lg-3">
                            <a class="btn custom-btn custom-border-btn"  href="disconnect.php" role="button" aria-controls="offcanvasExample">Deconnecter</a>
                        </div>
                    </div>
                </div>
            </nav>

           
            

            <section class="hero-section hero-50 d-flex justify-content-center align-items-center" id="section_1">

                <div class="section-overlay"></div>

                <svg viewBox="0 0 1962 178" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#3D405B" d="M 0 114 C 118.5 114 118.5 167 237 167 L 237 167 L 237 0 L 0 0 Z" stroke-width="0"></path> <path fill="#3D405B" d="M 236 167 C 373 167 373 128 510 128 L 510 128 L 510 0 L 236 0 Z" stroke-width="0"></path> <path fill="#3D405B" d="M 509 128 C 607 128 607 153 705 153 L 705 153 L 705 0 L 509 0 Z" stroke-width="0"></path><path fill="#3D405B" d="M 704 153 C 812 153 812 113 920 113 L 920 113 L 920 0 L 704 0 Z" stroke-width="0"></path><path fill="#3D405B" d="M 919 113 C 1048.5 113 1048.5 148 1178 148 L 1178 148 L 1178 0 L 919 0 Z" stroke-width="0"></path><path fill="#3D405B" d="M 1177 148 C 1359.5 148 1359.5 129 1542 129 L 1542 129 L 1542 0 L 1177 0 Z" stroke-width="0"></path><path fill="#3D405B" d="M 1541 129 C 1751.5 129 1751.5 138 1962 138 L 1962 138 L 1962 0 L 1541 0 Z" stroke-width="0"></path></svg>

                <div class="container">
                    <div class="row">

                        

                    </div>
                </div>

                <svg viewBox="0 0 1962 178" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#ffffff" d="M 0 114 C 118.5 114 118.5 167 237 167 L 237 167 L 237 0 L 0 0 Z" stroke-width="0"></path> <path fill="#ffffff" d="M 236 167 C 373 167 373 128 510 128 L 510 128 L 510 0 L 236 0 Z" stroke-width="0"></path> <path fill="#ffffff" d="M 509 128 C 607 128 607 153 705 153 L 705 153 L 705 0 L 509 0 Z" stroke-width="0"></path><path fill="#ffffff" d="M 704 153 C 812 153 812 113 920 113 L 920 113 L 920 0 L 704 0 Z" stroke-width="0"></path><path fill="#ffffff" d="M 919 113 C 1048.5 113 1048.5 148 1178 148 L 1178 148 L 1178 0 L 919 0 Z" stroke-width="0"></path><path fill="#ffffff" d="M 1177 148 C 1359.5 148 1359.5 129 1542 129 L 1542 129 L 1542 0 L 1177 0 Z" stroke-width="0"></path><path fill="#ffffff" d="M 1541 129 C 1751.5 129 1751.5 138 1962 138 L 1962 138 L 1962 0 L 1541 0 Z" stroke-width="0"></path></svg>
            </section>


           


            <section class="events-section events-listing-section section-bg section-padding" id="section_3">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h2 class="mb-3">Liste des Articles</h2>
                        </div>

                        
                        <?php foreach($listarticles as $key) { ?>
                        <div class="row custom-block custom-block-bg">
                            <div class="col-lg-2 col-md-4 col-12 order-2 order-md-0 order-lg-0">
                                <div class="custom-block-date-wrap d-flex d-lg-block d-md-block align-items-center mt-3 mt-lg-0 mt-md-0">
                                    <h6 class="custom-block-date mb-lg-1 mb-0 me-3 me-lg-0 me-md-0"></h6>
                                    
                                    <strong class="text-white">2023</strong>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-8 col-12 order-1 order-lg-0">
                                <div class="custom-block-image-wrap">
                                    <a href="event-detail.html">
                                        <img src="<?php echo $key['img'] ?>" class="custom-block-image img-fluid" alt="">

                                        <i class="custom-block-icon bi-link"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12 order-3 order-lg-0">
                                <div class="custom-block-info mt-2 mt-lg-0">
                                    <a href="event-detail.html" class="events-title mb-3"><?php echo $key['titre'] ?></a>

                                    <p class="mb-0"><?php echo $key['description'] ?></p>

                                    <div class="d-flex flex-wrap border-top mt-4 pt-3">

                                        <div class="mb-4 mb-lg-0">
                                            <div class="d-flex flex-wrap align-items-center mb-1">
                                                <span class="custom-block-span">Catgeorie:</span>

                                                <p class="mb-0"><?php echo $key['categorie'] ?></p>
                                            </div>

                                              
      <div class="post-actions">
      <?php
      $LikesC = new LikesC();
      $totallikes = $LikesC->GetLikesByArticle($key['id']);
      $already_liked = $LikesC->CheckLike($_SESSION['id'],$key['id']);
      if ($already_liked==0) {
        
      ?>
      <a href="Like.php?id=<?php echo $key['id']; ?>">
        <button class="like-button"><i class="fa fa-thumbs-up"></i> Like</button></a>
        <?php
}?>
<?php
      $LikesC = new LikesC();
      $totallikes = $LikesC->GetLikesByArticle($key['id']);
      $already_liked = $LikesC->CheckLike($_SESSION['id'],$key['id']);
      if ($already_liked==1) {
        
      ?>
      <a href="Dislike.php?id=<?php echo $key['id']; ?>">
        <button class="like-button"><i class="fa fa-thumbs-up"></i> DisLike</button></a>
        <?php
}?>


        

        <span class="like-count">
          <i class="fa fa-heart"></i>
          <?php echo $totallikes;?>
        </span>
        
        <button id="comment-button-<?php echo $key['id']; ?>" class="comment-button"><i class="fa fa-comment"></i> Comment</button>
        <?php
      $favC = new FavorisC();
     
      $check = $favC->Check($_SESSION['id'],$key['id']);
      if ($check==0) {
        
      ?>
      <a href="Addfav.php?id=<?php echo $key['id']; ?>">
        <button class="like-button"><i class="fa fa-thumbs-up"></i> Favoris</button></a>
        <?php
}?>


                                        </div>
                                        
                                        <div id="comment-form-container-<?php echo $key['id']; ?>" class="comment-form-container" style="display:none;">
        <form method="POST" class="comment-form">
        <input  style="display:none;" value=<?php echo $key['id'];?> name="postid"></input>
          <textarea  style=" height: 150px;
  margin-bottom: 10px;
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
  width: 600px;"placeholder="Write your comment here" name="contenu"></textarea>
          <button type="submit" name="addcomm" class="submit-comment-button">Submit</button>
        </form>
      </div>
      <style>
        .comment-form-container {
  display: none;
  margin-top: 20px;
}

.comment-form {
  display: flex;
  flex-direction: column;
}

.comment-form textarea {
 
}

.submit-comment-button {
  align-self: flex-end;
  padding: 10px 15px;
  border: none;
  border-radius: 50px;
  background-color: #00008B;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
}

.submit-comment-button:hover {
  background-color: #ADD8E6;
}
        </style>
      <script>
  // Get all the comment buttons
  var commentButtons = document.querySelectorAll('.comment-button');

  // Loop through the comment buttons
  commentButtons.forEach(function(button) {
    // Get the ID of the post
    var postId = button.getAttribute('id').split('-')[2];

    // Add a click event listener to the comment button
    button.addEventListener('click', function() {
      // Get the comment form container for this post
      var commentFormContainer = document.querySelector('#comment-form-container-' + postId);

      // Show the comment form container
      commentFormContainer.style.display = 'block';
    });
  });
</script>                           
                                    </div>
                                </div>
                            </div>
                        </div>
<?php } ?>
                    </div>
                </div>
            </section>
        </main>
        <style>
		
        .forum-container {
  max-width: 800px;
  margin: 0 auto;
  padding: 40px;
  background-color: #f5f5f5;
  border-radius: 8px;
}

.post-container {
  background-color: #fff;
  padding: 20px;
  margin-bottom: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.post-title {
  font-size: 28px;
  font-weight: bold;
  margin-top: 0;
  margin-bottom: 10px;
}

.post-description {
  font-size: 18px;
  margin-bottom: 20px;
}

.post-date {
  font-size: 14px;
  color: #888;
  margin-top: 0;
  margin-bottom: 20px;
}

.comments-container {
  background-color: #fff;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.comments-title {
  font-size: 20px;
  font-weight: bold;
  margin-top: 0;
  margin-bottom: 20px;
}

.comment {
  display: block;
  align-items: flex-start;
  margin-bottom: 20px;
}

.comment-avatar {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  margin-right: 10px;
}

.comment-text-container {
  flex: 1;
}

.comment-author {
  font-size: 16px;
  font-weight: bold;
  margin-top: 0;
  margin-bottom: 5px;
}

.comment-text {
  font-size: 14px;
  line-height: 1.4;
  margin-bottom: 5px;
}

.comment-date {
  font-size: 12px;
  color: #888;
  margin-top: 0;
}

.post-actions {
  display: flex;
  justify-content: center;
  align-items: center;
}

.like-button, .comment-button {
  display: inline-flex;
  align-items: center;
  padding: 10px 15px;
  border: none;
  border-radius: 50px;
  background-color: #f5f5f5;
  color: #444;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

.like-button:hover, .comment-button:hover {
  background-color: #ddd;
  color: #222;
}

.like-button i, .comment-button i {
  margin-right: 5px;
  font-size: 20px;
}
.comment-form-container {
  display: none;
  margin-top: 20px;
}

.comment-form {
  display: flex;
  flex-direction: column;
}

.comment-form textarea {
  height: 80px;
  margin-bottom: 10px;
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
  resize: none;
}

.submit-comment-button {
  align-self: flex-end;
  padding: 10px 15px;
  border: none;
  border-radius: 50px;
  background-color: #00008B;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
}

.submit-comment-button:hover {
  background-color: #ADD8E6;
}

.like-count {
    display: inline-block;
    margin-left: 5px;
    font-size: 14px;
    color: #555;
  }
  .delete-button {
  background-color: transparent;
  border: none;
  color: #ff0000; /* red color for emphasis */
  cursor: pointer;
  font-size: 14px;
  text-decoration: underline;
  margin-left: 10px;
}
.edit-button {
  background-color: transparent;
  border: none;
  color: #555; /* red color for emphasis */
  cursor: pointer;
  font-size: 14px;
  text-decoration: underline;
  margin-left: 10px;
}

.delete-button:hover {
  text-decoration: none;
}
.delete-comment-button {
  background-color: #e7f2ff;
  color: #3273dc;
  border: none;
  padding: 3px 6px;
  border-radius: 3px;
  font-size: 14px;
  cursor: pointer;
}

.delete-comment-button:hover {
  background-color: #3273dc;
  color: #fff;
}
	</style>
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
        <script src="js/custom.js"></script>

    </body>
</html>
