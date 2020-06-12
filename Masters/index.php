<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Constructive HTML Template</title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
      <link rel="stylesheet" href="css/fontawesome-all.min.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/magnific-popup.css"/>
      <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
      <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
      <link rel="stylesheet" href="css/tooplate-style.css">
      <script type="text/javascript" src="http://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
      <script type="text/javascript" src="http://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="css/flexboxgrid.min.css" type="text/css">
      <link rel="stylesheet" href="style.css"/>
			<link rel="stylesheet" href="flexbox.css"/>
      <?php
         session_start();
         $un =$_SESSION["login_key"];
         if(!isset($_SESSION['login_key'])){
           header("Location:pleaselogin.html");
         }
         ?>
      <script>
         var renderPage = true;

         if(navigator.userAgent.indexOf('MSIE')!==-1
         || navigator.appVersion.indexOf('Trident/') > 0){

          		alert("Please view this in a modern browser such as Chrome or Microsoft Edge.");
          		renderPage = false;
         }
      </script>
      <div class="fl_right">
         <ul>
            <li><a href=login.html>Login</a></li>
            <li><a href=register.html>Register</a></li>
            <li><a href=logout.php>Logout</a></li>
            <li><a href="#">Welcome,  <?php echo $_SESSION["login_key"]; ?> </a></li>
         </ul>
      </div>
   </head>
   <body>
      <div id="loader-wrapper">
         <div id="loader"></div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      <div class="container-fluid tm-main">
         <div class="row tm-main-row">
            <div id="tmSideBar" class="col-xl-3 col-lg-4 col-md-12 col-sm-12 sidebar">
               <button id="tmMainNavToggle" class="menu-icon">&#9776;</button>
               <div class="inner">
                  <nav id="tmMainNav" class="tm-main-nav">
                     <ul>
                        <li>
                           <a href="#Login" id="tmNavLink1" class="scrolly active" data-bg-img="constructive_bg_01.jpg" data-page="#tm-section-1">
                           <i class="fas fa-home tm-nav-fa-icon"></i>
                           <span>Login</span>
                           </a>
                        </li>
                        <li>
                           <a href="#intro" id="tmNavLink1" class="scrolly active" data-bg-img="constructive_bg_01.jpg" data-page="#tm-section-2">
                           <i class="fas fa-home tm-nav-fa-icon"></i>
                           <span>Enter your spendings</span>
                           </a>
                        </li>

                     </ul>
                  </nav>
               </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 tm-content">
               <!-- section 1 -->
               <section id="tm-section-1" class="tm-section">
                  <div class="ml-auto">
                     <header class="mb-4">
                        <h1 class="tm-text-shadow">Welcome</h1>
                     </header>
                     <p class="mb-5 tm-font-big">Log in to the system to measure your daily financial spendings on a column chart in the next section of the page!</p>
                     <!-- data-nav-link holds the ID of nav item, which means this link should behave the same as that nav item  -->
                  </div>
               </section>
               <!-- section 2 -->
               <section id="tm-section-2" class="tm-section tm-section-carousel">
                  <div class="flexcont1">
										<div class="flexcont2">
                     <div class="container1">
                           <h3> Add to system </h3>
                           <form class="addform" action="/action_page.php">
                              <div class="form-group">
                                 <label for="email">Todays spending:</label>
                                 <input type="email" class="form-control" id="email" placeholder="Enter amount" name="field2">
                              </div>
                              <div class="form-group">
                                 <label for="pwd">Date:</label>
                                 <input type="date" class="form-control" id="pwd" placeholder="date" name="date">
                              </div>
                              <input type="hidden" name="user" value="<?php  echo $_SESSION["login_key"];?>"/>
                              <button type="submit" class="btn btn-default">Add to system</button>
                           </form>
                        </div>
                        <div class="container2">
                           <h3> Edit your spendings </h3>
                           <form class="editform" action="/action_page.php">
                              <div class="form-group">
                                 <label for="email">Todays spending:</label>
                                 <input type="email" class="form-control" id="email" placeholder="Enter amount" name="field2">
                              </div>
                              <div class="form-group">
                                 <label for="pwd">Date:</label>
                                 <input type="date" class="form-control" id="pwd" placeholder="date" name="date">
                              </div>
                              <input type="hidden" name="user" value="<?php  echo $_SESSION["login_key"];?>"/>
                              <button type="submit" class="btn btn-default">Edit your data from system</button>
                           </form>
                        </div>
                     </div>
										 <div class="flexcont3">
                     <?php
                        include('C:\xampp\htdocs\fusioncharts.php');



                        $dbhandle = new mysqli("localhost","root","","web");

                        if ($dbhandle->connect_error) {
                        		exit("There was an error with your connection: ".$dbhandle->connect_error);
                        	 }
                        	$strQuery = "SELECT moneyspent, username, dateentered  FROM money WHERE username = '$un'";


                        			$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");


                        			if ($result) {

                        					$arrData = array(
                        							"chart" => array(
                        									"caption" => "Daily financial spendings",
                        									"showValues" => "0",
                        									"theme" => "fusion"
                        								)
                        						);

                        					$arrData["data"] = array();


                        					while($row = mysqli_fetch_array($result)) {
                        						array_push($arrData["data"], array(
                        								"label" => $row["dateentered"],
                        								"value" => $row["moneyspent"]
                        								)
                        						);
                        					}



                        					$jsonEncodedData = json_encode($arrData);



                        					$columnChart = new FusionCharts("column3D", "myFirstChart" ,1063, 300, "chart-1", "json", $jsonEncodedData);


                        					$columnChart->render();


                        					$dbhandle->close();
                        			}
                        		?>
                     <div id="chart-1">

                     </div>


									 <div id="chart-1"></div>
									 </div>
									 <div class="flexcont4">
                     <div class="container2">
                        <h3> Delete your entry </h3>
                        <form class="editform" action="/action_page.php">
                           <div class="form-group">
                              <label for="pwd">Date:</label>
                              <input type="date" class="form-control" id="pwd" placeholder="date" name="date">
                           </div>
                           <input type="hidden" name="user" value="<?php  echo $_SESSION["login_key"];?>"/>
                           <button type="submit" class="btn btn-default">Delete from system</button>
                        </form>
                     </div>
               </section>

               </div>







      </div>
      <div id="preload-01"></div>
      <div id="preload-02"></div>
      <div id="preload-03"></div>
      <div id="preload-04"></div>
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
      <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
      <script type="text/javascript" src="slick/slick.min.js"></script> <!-- Slick Carousel -->
      <script>
         var sidebarVisible = false;
         var currentPageID = "#tm-section-1";


         function setupCarousel() {


         	if($('#tm-section-2').css('display') == "none") {
         	}
         	else {

         		var slider = $('.tm-img-slider');
         		var windowWidth = $(window).width();

         		if (slider.hasClass('slick-initialized')) {
         			slider.slick('destroy');
         		}

         		if(windowWidth < 640) {
         			slider.slick({
                      		dots: true,
                      		infinite: false,
                      		slidesToShow: 1,
                      		slidesToScroll: 1
                      	});
         		}
         		else if(windowWidth < 992) {
         			slider.slick({
                      		dots: true,
                      		infinite: false,
                      		slidesToShow: 2,
                      		slidesToScroll: 1
                      	});
         		}
         		else {
         			// Slick carousel
                      	slider.slick({
                      		dots: true,
                      		infinite: false,
                      		slidesToShow: 3,
                      		slidesToScroll: 2
                      	});
         		}

         		// Init Magnific Popup
         		$('.tm-img-slider').magnificPopup({
         		  delegate: 'a', // child items selector, by clicking on it popup will open
         		  type: 'image',
         		  gallery: {enabled:true}
         		  // other options
         		});
             		}
         		}

         		// Setup Nav
         		function setupNav() {
         			// Add Event Listener to each Nav item
             	$(".tm-main-nav a").click(function(e){
             		e.preventDefault();

             	var currentNavItem = $(this);
             	changePage(currentNavItem);

             	setupCarousel();
             	setupFooter();

             	// Hide the nav on mobile
             	$("#tmSideBar").removeClass("show");
             });
         		}

         		function changePage(currentNavItem) {
         			// Update Nav items
         			$(".tm-main-nav a").removeClass("active");
            		currentNavItem.addClass("active");

            	$(currentPageID).hide();

            	// Show current page
            	currentPageID = currentNavItem.data("page");
            	$(currentPageID).fadeIn(1000);

            	// Change background image
            	var bgImg = currentNavItem.data("bgImg");
            	$.backstretch("img/" + bgImg);
         		}

         		// Setup Nav Toggle Button
         		function setupNavToggle() {

         	$("#tmMainNavToggle").on("click", function(){
         		$(".sidebar").toggleClass("show");
         	});
         		}

         		// If there is enough room, stick the footer at the bottom of page content.
         		// If not, place it after the page content
         		function setupFooter() {

         			var padding = 100;
         			var footerPadding = 40;
         			var mainContent = $("section"+currentPageID);
         			var mainContentHeight = mainContent.outerHeight(true);
         			var footer = $(".footer-link");
         			var footerHeight = footer.outerHeight(true);
         			var totalPageHeight = mainContentHeight + footerHeight + footerPadding + padding;
         			var windowHeight = $(window).height();

         			if(totalPageHeight > windowHeight){
         				$(".tm-content").css("margin-bottom", footerHeight + footerPadding + "px");
         				footer.css("bottom", footerHeight + "px");
         			}
         			else {
         				$(".tm-content").css("margin-bottom", "0");
         				footer.css("bottom", "20px");
         			}
         		}

         		// Everything is loaded including images.
             	$(window).on("load", function(){

             		// Render the page on modern browser only.
             		if(renderPage) {
         		// Remove loader
               	$('body').addClass('loaded');

               	// Page transition
               	var allPages = $(".tm-section");

               	// Handle click of "Continue", which changes to next page
               	// The link contains data-nav-link attribute, which holds the nav item ID
               	// Nav item ID is then used to access and trigger click on the corresponding nav item
               	var linkToAnotherPage = $("a.tm-btn[data-nav-link]");

         	    if(linkToAnotherPage != null) {

         	    	linkToAnotherPage.on("click", function(){
         	    		var navItemToHighlight = linkToAnotherPage.data("navLink");
         	    		$("a" + navItemToHighlight).click();
         	    	});
         	    }

               	// Hide all pages
               	allPages.hide();

               	$("#tm-section-1").fadeIn();

              	// Set up background first page
              	var bgImg = $("#tmNavLink1").data("bgImg");

              	$.backstretch("img/" + bgImg, {fade: 500});

              	// Setup Carousel, Nav, and Nav Toggle
         	    setupCarousel();
         	    setupNav();
         	    setupNavToggle();
         	    setupFooter();

         	    // Resize Carousel upon window resize
         	    $(window).resize(function() {
         	    	setupCarousel();
         	    	setupFooter();
         	    });
             		}
         });

      </script>
   </body>
</html>
