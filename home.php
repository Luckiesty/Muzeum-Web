<?php

session_start();


    if (isset($_POST["kijelentkezes"])) {
        session_unset(); 
         session_destroy();
         header("Location: ./index.php");
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
</head>
<body>
<header class="continer-fluid ">
            <div class="header-bottom">
                <div class="container">
                    <div class="row nav-row">
                        <div class="col-md-3">
                            <img class="fologo" src="kepek/fologo.png" alt="">
                        </div>
                        <div class="col-md-9 nav-col">
                            <nav class="navbar navbar-expand-lg navbar-light">

                              
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li>
                                            <a class="nav-link" href="index.php">Főoldal</a>
                                        </li>
                                        <li >
                                            <a class="nav-link" href="Rolunk.php">Rolunk</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="kategoriak.php">Kategóriák</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="videok.php">Videók</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="elorhetosegeink.php">Elérhetőségeink</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="webshop.php">Souvenir Bolt</a>
                                        </li>
                                        <li  class="nav-item">
                                            <div  id="profil-keret">
                                                <?php 
                                                    print('<img class="profilkep1 menu-btn>"  src="'.$_SESSION['profilkep'].'" alt=""> ');
                                                ?>
                                         
                                        </li>
                                    </ul>
    
                                </div>   
                            </nav>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </header> 
</div>
<!--kijelentkezés gomb -->

<div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">profil</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="#about">szerkesztés</a>
                    <form method ='post' >
                        <button  class="form-control kijelentkezes" type="submit" name="kijelentkezes">Kilépek</button>
                    </form>
                </div>
        </div>
    <!--menu-->
<div class="section cc-store-home-wrap"><div class="intro-header"><div class="intro-content cc-homepage">
  <div class="intro-text">
   
</div>
</div>
<a href="/about" class="button cc-jumbo-button cc-jumbo-white w-inline-block"><div>Tudj Meg Többet </div>
</a>
</div>
</div>
<div class="container"><div class="motto-wrap">
  <div class="label cc-light">What we believe in</div>
<div class="heading-jumbo-small">Grow your business, establish your brand, and put your customers first.<br/>
</div>
</div>
<div class="divider"></div
><div class="home-content-wrap"><div class="w-layout-grid about-grid">
  <div id="w-node-_86e64837-0616-515b-4568-76c147234d34-2df3ed86">
    <div class="home-section-wrap"><div class="label cc-light">About</div>
    <h2 class="section-heading">Who we are</h2>
    <p class="paragraph-light">Nulla vel sodales tellus, quis condimentum enim. Nunc porttitor venenatis feugiat. Etiam quis faucibus erat, non accumsan leo. Aliquam erat volutpat. Vestibulum ac faucibus eros. Cras ullamcorper gravida tellus ut consequat.</p>
    </div><a href="/about" class="button w-inline-block"><div>Learn More</div></a></div><img src="https://uploads-ssl.webflow.com/6404dcc77e2407dfb2f3ed83/6404dcc77e2407475cf3edaf_placeholder%203.svg" id="w-node-_86e64837-0616-515b-4568-76c147234d3f-2df3ed86" alt=""/>
    </div><div class="w-layout-grid about-grid cc-about-2"><div id="w-node-_86e64837-0616-515b-4568-76c147234d41-2df3ed86">
      <div class="home-section-wrap"><div class="label cc-light">Team</div>
      <h2 class="section-heading">What we do</h2>
      <p class="paragraph-light">Nulla vel sodales tellus, quis condimentum enim. Nunc porttitor venenatis feugiat. Etiam quis faucibus erat, non accumsan leo. Aliquam erat volutpat. Vestibulum ac faucibus eros. Cras ullamcorper gravida tellus ut consequat.</p>
      </div><a href="/team" class="button w-inline-block"><div>Learn More</div></a></div><img src="https://uploads-ssl.webflow.com/6404dcc77e2407dfb2f3ed83/6404dcc77e240711b5f3edb1_placeholder%201.svg" id="w-node-_86e64837-0616-515b-4568-76c147234d4c-2df3ed86" alt=""/>
      </div></div></div></div><div class="section"><div class="container"><div class="blog-heading"><div class="label cc-light">About Us</div><h2 class="work-heading">Company news</h2></div><div class="collection-list-wrapper w-dyn-list"><div role="list" class="collection-wrap w-dyn-items">
        <div role="listitem" class="blog-preview-wrap w-dyn-item"><a href="/post/10-quick-tips-about-blogging" class="business-article-heading">10 Quick Tips About Blogging</a>
        <div class="label cc-blog-date">Feb 21, 2019</div>
        <p class="paragraph-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p></div>
        <div role="listitem" class="blog-preview-wrap w-dyn-item"><a href="/post/15-best-blogs-to-follow-about-web-design" class="business-article-heading">15 Best Blogs To Follow About Web Design</a>
        <div class="label cc-blog-date">Feb 21, 2019</div><p class="paragraph-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
        </div><div role="listitem" class="blog-preview-wrap w-dyn-item"><a href="/post/7-of-the-best-examples-of-beautiful-blog-design" class="business-article-heading">7 of the Best Examples of Beautiful Blog Design</a><div class="label cc-blog-date">Feb 21, 2019</div>
        <p class="paragraph-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
        </div>
        </div>
        </div>
        </div>
        </div>
        <div class="section cc-cta">
          <div class="container">
            <div class="cta-wrap">
              <div>
                <div class="cta-text">
                  <div class="heading-jumbo-small">Grow your business.<br/>
                  </div>
                  <div class="paragraph-bigger cc-bigger-light">Today is the day to build the business of your dreams. Share your mission with the world — and blow your customers away.<br/>
                  </div>
                  </div><a href="/contact" class="button cc-jumbo-button w-inline-block"><div>Start Now</div>
                  </a>
                  </div>
                  </div>
                  </div>
                  </div><div class="section">
                    <div class="container">
                      <div class="footer-wrap"><a href="https://webflow.com/" target="_blank" class="webflow-link w-inline-block"><img src="https://uploads-ssl.webflow.com/6404dcc77e2407dfb2f3ed83/6404dcc77e240774c3f3edba_webflow-w-small%402x.png" width="15" alt="" class="webflow-logo-tiny"/>
                      <div class="paragraph-tiny">Powered by Webflow</div>
                      </a>
                      </div>
                      </div>
                      </div>
                      <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6404dcc77e2407dfb2f3ed83" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script><script src="https://uploads-ssl.webflow.com/6404dcc77e2407dfb2f3ed83/js/webflow.d7675b9d5.js" type="text/javascript">
  
</script><!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
  
<script>


</script>

    <script src="css/javascript.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>

</body>
</html>