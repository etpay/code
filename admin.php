<!Doctype html>
<html>
<body>
<style>
#nav {
list-style:none inside;
margin:0;
padding:0;
text-align:center;
}
#nav li {
display:block;
position:relative;
float:left;
background: #24af15; /* menu background color */
}
#nav li a {
display:block;
padding:0;
text-decoration:none;
width:200px; /* this is the width of the menu items */
line-height:35px; /* this is the hieght of the menu items */
color:#ffffff; /* list item font color */
}
#nav li li a {font-size:80%;} /* smaller font size for sub menu items */
#nav li:hover {background:#003f20;} /* highlights current hovered list item and the parent list items when hovering over sub menues */
#nav ul {
position:absolute;
padding:0;
left:0;
display:none; /* hides sublists */
}
#nav li:hover ul ul {display:none;} /* hides sub-sublists */
#nav li:hover ul {display:block;} /* shows sublist on hover */
#nav li li:hover ul {
display:block; /* shows sub-sublist on hover */
margin-left:200px; /* this should be the same width as the parent list item */
margin-top:-35px; /* aligns top of sub menu with top of list item */
}
</style>
</head>
<ul id="nav">
<li><a href="#">Yeserasew Payment System</a></li>
<li><a href="#">Telecom</a>
<ul>


<li><a href="#">»</a>
<ul>
<li><a href="index.php">Ethio telecom</a>
<li><a href="index.php">Safaricom</a>
</ul>
</li>
</ul>
</li>

</ul>
<ul id="nav">

<li><a href="#">Power</a>
<ul>


<li><a href="#">»</a>
<ul>
<li><a href="index.php">Electric</a>
<li><a href="index.php">Electric</a>
</ul>
</li>
</ul>
</li>

</ul>
<ul id="nav">

<li><a href="#">Water and sanitation</a>
<ul>


<li><a href="#">»</a>
<ul>
<li><a href="index.php">Water and sanitation</a>
<li><a href="index.php">sanitation</a>
</ul>
</li>
</ul>
</li>

</ul>
<ul id="nav">

<li><a href="#">Housing and land Related</a>
<ul>


<li><a href="#">»</a>
<ul>
<li><a href="index.php">A.A Land House</a>
<li><a href="index.php">others</a>
</ul>
</li>
</ul>
</li>

</ul>
<ul id="nav">

<li><a href="#">Tax and pension Related</a>
<ul>


<li><a href="#">»</a>
<ul>
<li><a href="index.php">A.A  Revenue Authority</a>
<li><a href="index.php">FDRE Ministry of Revenue</a>
</ul>
</li>
</ul>
</li>

</ul>
<a href="login.php">Log Out</a> </br>

</body>
</html>
