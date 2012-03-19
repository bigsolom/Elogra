<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib uri="http://tiles.apache.org/tags-tiles" prefix="tiles" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--

	terrafirma1.0 by nodethirtythree design
	http://www.nodethirtythree.com

-->
<html>
<head>

     
     <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>terrafirma1.0 by nodethirtythree</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="../css/default.css" />

</head>
<body>

<div id="outer">

	<div id="upbg"></div>

	<div id="inner">

		<div id="header">
			<h1><span>terra</span>firma<sup>1.0</sup></h1>
			<h2>by nodethirtythree</h2>
		</div>
	
		<div id="splash"></div>
	
		<div id="menu">
			<ul>
				<li class="first"><a href="search.jsp">Home</a></li>
				<li><a href="submit.jsp">Submit</a></li>
				<li><a href="#">Links</a></li>
				<li><a href="#">Resources</a></li>
				<li><a href="#">Contact</a></li>
			</ul>

		<div id="date">August 1, 2006</div>
		</div>
	

		<div id="primarycontent">
		
			<!-- primary content start -->
		
			<div class="post">
				<tiles:insertAttribute name="body"/>
			</div>
		


			<!-- primary content end -->
	
		</div>
		
		<div id="secondarycontent">

			<!-- secondary content start -->
		
			<h3>About Me</h3>
			<div class="content">
				<img src="../images/pic2.jpg" class="picB" alt="" />
				<p><strong>Nullam turpis</strong> vestibulum et sed dolore. Nulla facilisi. Sed tortor. lobortis commodo. <a href="#">More ...</a></p>
			</div>
			
			<h3>Topics</h3>
			<div class="content">
				<ul class="linklist">
					<li class="first"><a href="#">Accumsan congue (32)</a></li>
					<li><a href="#">Dignissim nec augue (14)</a></li>
					<li><a href="#">Nunc ante elit nulla (83)</a></li>
					<li><a href="#">Aliquam suscipit (74)</a></li>
					<li><a href="#">Cursus sed arcu sed (14)</a></li>
					<li><a href="#">Eu ante cras at risus (24)</a></li>
					<li><a href="#">Donec mollis dolore (39)</a></li>
					<li><a href="#">Aliquam suscipit (74)</a></li>
				</ul>
			</div>

			<!-- secondary content end -->

		</div>
	
		<div id="footer">
		
			&copy; My Website. All rights reserved. Design by <a href="http://www.nodethirtythree.com/">NodeThirtyThree</a>.
		
		</div>

	</div>

</div>

</body>
</html> 