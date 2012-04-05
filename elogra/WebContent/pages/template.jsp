	<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib uri="http://tiles.apache.org/tags-tiles" prefix="tiles" %>
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt" %>

<!--  
<c:if test="${ message == null }">
<fmt:setBundle basename="Translation" var="message" scope="application"/>
</c:if>
-->

<c:if test="${param['lang']!=null }">
	<fmt:setLocale value="${param['lang']}" scope="session" />
</c:if>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta charset="utf-8">
		<title>LEFT TEMPLATE</title>
		
		
		 <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
		
		     <!-- bootstrap -->
     <link rel="stylesheet" href="css/bootstrap/bootstrap-rtl.min.css" type="text/css"/>
     <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
     <!-- bootstrap -->
		<!-- CSS -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/social-icons.css" type="text/css" media="screen" />
	
		<!-- THEME -->
		<link rel="stylesheet" href="skins/paper-brown/style.css" type="text/css" media="screen" />
		
		<!-- JS -->
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>
		<script type="text/javascript" src="js/quicksand.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		<!--[if IE]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- ENDS JS -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="js/DD_belatedPNG.js"></script>
			<script>
	      		/* EXAMPLE */
	      		//DD_belatedPNG.fix('*');
	    	</script>
		<![endif]-->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="css/superfish.css" /> 
		<link rel="stylesheet" media="screen" href="css/superfish-left.css" /> 
		<script type="text/javascript" src="js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script type="text/javascript" src="js/superfish-1.4.8/js/superfish.js"></script>
		<script type="text/javascript" src="js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->
		
		<!-- poshytip -->
		<link rel="stylesheet" href="js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
		<script type="text/javascript" src="js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="css/jquery.tweet.css" media="all"  type="text/css"/> 
		<script src="js/tweet/jquery.tweet.js" type="text/javascript"></script> 
		<!-- ENDS Tweet -->
		
		<!-- Fancybox -->
		<link rel="stylesheet" href="js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
		<script type="text/javascript" src="js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<!-- ENDS Fancybox -->
		
		<!-- jflickrfeed -->
		<link href="css/jflickrfeed.css" rel="stylesheet" type="text/css" media="screen" /> 
		<script src="js/jflickrfeed/jflickrfeed.js"></script>
		
		<link href="js/jflickrfeed/colorbox/colorbox.css" rel="stylesheet" type="text/css" media="screen" /> 
		<script src="js/jflickrfeed/colorbox/jquery.colorbox.js"></script>
		<!-- ENDS jflickrfeed -->
		
		<!-- prettyPhoto -->
		<script type="text/javascript" src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
				
		<!-- Nivo slider -->
		<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
		<script src="js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- ENDS Nivo slider -->
		
		<!-- tabs -->
		<link rel="stylesheet" href="css/tabs.css" type="text/css" media="screen" />
		<script type="text/javascript" src="js/tabs.js"></script>
  		<!-- ENDS tabs -->
  		
  		

		<!--[if IE 7]>
			<link rel="stylesheet" type="text/css" media="screen" href="css/ie7-hacks.css" />
		<![endif]-->
		<!--[if IE 8]>
			<link rel="stylesheet" type="text/css" media="screen" href="css/ie8-hacks.css" />
		<![endif]-->
		<!-- ENDS CSS -->	
		
	</head>
	<body dir="rtl">
	
	<!-- WRAPPER -->
	<div id="wrapper">
	
		<!-- SIDEBAR -->
		<div id="sidebar">
			<!-- logo -->
			<a href="index-2.html"><img src="img/logo.png" alt="Left template" id="logo" /></a>
						
			<!-- Navigation -->
		  <ul id="nav" class="sf-menu sf-vertical">
				<li class="current-menu-item"><a href="index-2.html">الصفحة الرئيسيه</a></li>
				<li><a href="features.html">حكاوي التاكسي</a>
					</li>
				
				<li><a href="contact.html">بكام</a></li>
				<li><a href="?lang=ar">عربي</a></li>
				<li><a href="?lang=en">English</a></li>
             </ul>
			<!-- Navigation -->	
					
			<!-- categories --><!-- categories -->	
			<!-- latest tweets --><!-- ENDS latest tweets -->
			
			<!-- Social -->
			<!--ul class="aim">
				<li><h6>Follow us</h6>
				<li><a href="http://www.facebook.com/" class="facebook" title="Become a fan"></a></li>
				<li><a href="http://www.twitter.com/" class="twitter" title="Follow our tweets"></a></li>
				<li><a href="http://www.dribbble.com/" class="dribbble" title="View our work"></a></li>
				<li><a href="http://www.addthis.com/" class="addthis" title="Tell everybody"></a></li>
		  </ul-->
			<!-- ENDS Social -->

		</div>
		<!-- ENDS SIDEBAR -->
		
		<!-- MAIN -->
	  <div id="main">
		
			<!-- CONTENT -->
			<div id="content">
				<!-- PAGE CONTENT -->
				<div id="page-content">
					
					<!-- feature blocks -->
				  <h1 class="header-line">FEATURE PAGES</h1>
					<!-- ENDS feature blocks -->
										
					
					<!-- TABS -->
					<!-- the tabs -->
					<ul class="tabs">
						<li><a href="#">Search</a></li>
						<li><a href="#">News</a></li>
						<li><a href="#">Recent videos</a></li>
						<li><a href="#">Latest gallery</a></li>
						
				  </ul>
					
					<!-- tab "panes" -->
					<div class="panes">
					
						<!-- Information  -->
						<div>
							
							<tiles:insertAttribute name="body"/>
						
						</div>
						<!-- ENDS Information -->
						
						<!-- Post list -->
						<div>
							<ul class="blocks-list">
								<li>
									<a href="single.html" class="border"><img src="img/dummies/114x86.jpg" alt="Post" /></a>
									<div class="the-excerpt">
										<strong>Pellentesque habitant morbi tristique</strong>  senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.																			<a href="single.html" class="link-arrow">Read more &#8594;</a>
									</div>
								</li>
								<li>
									<a href="single.html" class="border"><img src="img/dummies/114x86.jpg" alt="Post" /></a>
									<div class="the-excerpt">
										<strong>Pellentesque habitant morbi tristique</strong>  senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.																			<a href="single.html" class="link-arrow">Read more &#8594;</a>
									</div>
								</li>
								<li>
									<a href="single.html" class="border"><img src="img/dummies/114x86.jpg" alt="Post" /></a>
									<div class="the-excerpt">
										<strong>Pellentesque habitant morbi tristique</strong>  senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.																			<a href="single.html" class="link-arrow">Read more &#8594;</a>
									</div>
								</li>
							</ul>
						</div>
						<!-- ENDS Post list -->
					
						
						<!-- img gallery -->
						<div>
							<ul class="blocks-gallery">
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
							</ul>
						</div>
						<!-- ENDS img gallery -->
						
						<!-- img gallery -->
						<div>
							<ul class="blocks-gallery">
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
							</ul>
						</div>
						<!-- ENDS img gallery -->
						
					</div>
					<!-- ENDS TABS -->
					
					
					
					
				</div>
				<!-- ENDS PAGE-CONTENT -->
			
		</div>
			<!-- ENDS CONTENT -->
			
	  </div>
		<!-- ENDS MAIN -->
	</div>
	<!-- ENDS WRAPPER -->

	<!-- FOOTER -->

		<!-- ENDS FOOTER-WRAPPER -->
	<!-- ENDS FOOTER -->
	
	
	</body>
</html>