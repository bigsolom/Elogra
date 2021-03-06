<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib uri="http://tiles.apache.org/tags-tiles" prefix="tiles" %>
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt" %>

<!--  
<c:if test="${ message == null }">
<fmt:setBundle basename="Translation" var="message" scope="application"/>
</c:if>
-->
<fmt:setLocale value="ar" scope="session" />
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>LEFT TEMPLATE</title>
		
		
		 <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
		
		<!-- CSS -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/social-icons.css" type="text/css" media="screen" />
	
		<!-- THEME -->
		<link rel="stylesheet" href="skins/paper-brown/style.css" type="text/css" media="screen" />
		
		<!-- JS -->
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript" src="js/extras.js"></script>
				
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
  		
		     <!-- bootstrap -->
     <link rel="stylesheet" href="css/bootstrap/bootstrap-rtl.min.css" type="text/css"/>
     <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
     <link href="css/bootstrap/extra.css" rel="stylesheet" type="text/css"/>
     <!-- bootstrap -->
     
     
  		

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
				<li class="current-menu-item"><a href="taxiTalks.tiles"><fmt:message key="links.taxiTalks"/></a></li>
				<li><a href="search.tiles"><fmt:message key="links.search"/></a>
					</li>
				
				<li><a href="submit.tiles"><fmt:message key="links.submit"/></a></li>
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
										
					
				<tiles:insertAttribute name="body"/>
					
					
					
					
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