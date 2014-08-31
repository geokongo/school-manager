<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Geoffrey Oliver Home Page</title>
	<style>
		body, html { margin: 0; padding: 0;}
		
		body {
			background: #EEE;
		}
		
		h1, h2, h3, h4, p, a, ul, li {
			font-family: arial, sans-serif;
			color: black;
			text-decoration: none;	
		}
		
		#nav {
			margin: 50px auto 0 auto;
			width: 1000px;
			background-color: #888;
			height: 15px;
			padding: 20px;
		}
		#nav a:hover {
			color: green;
		}
		#nav ul {
			list-style: none;
			margin: 0 50px;
			float: left;
		}
		
		#nav ul li {
			display: inline;
		}
		
		#content {
			width: 1000px;
			margin: 0 auto;
			padding: 20px;
			min-height: 100%;
		}
		
		#footer {
			width: 500px;
			height: 15px;
			padding: 20px;
			margin: 0 auto;
		}
		
		#footer p {
			color: #777;
		}
	</style>

	
</head>
<body>
	
	<div id="container">
		<div id='nav'>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</div>
	</div>
	
	<div id="content">
		<h1> Home Page</h1>
		<p> Welcome to my awesome homepage, this is Oliver </p>
		<p> Data Container Arrays (DCAs) are used to store table meta data. Each DCA describes a particular table in terms of its configuration, its relations to other tables and its fields. The Contao core engine determines by this meta data how to list records, how to render back end forms and how to save data. The DCA files of all active module are loaded one after the other (starting with "backend" and "frontend" and then in alphabetical order), so that every module can override the existing configuration. 
		A Data Container Array is devided into six sections. The first section stores the general table configuration like relations to other tables. The second and third section determine how records are listed and which operations a user is allowed to execute. The fourth section defines different groups of form fields which are called "palettes" and the last two sections describe the input fields in detail.</p>
	</div>
	
	<div id="footer">
		<p> Copyright (c) Geoffrey Oliver 2004 - 2014. All rights reserved</p>
	</div>
</body>
</html>