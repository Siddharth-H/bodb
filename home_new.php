<?php 
require './core.inc.php';
require './connection.inc.php';

$query = "SELECT * FROM actors WHERE MONTH(`dob`) = MONTH(NOW())";

$query_run = mysql_query($query);
$query_num_rows = mysql_num_rows($query_run);

if(mysql_num_rows($query_run) == 1 ){
    $firstname = mysql_result($query_run,0,'fname');
    $lastname = mysql_result($query_run,0,'lname');
    $dob = mysql_result($query_run,0,'dob');
    
    $image_name =$firstname.$lastname;
    $image_name = strtolower($image_name);
    
}
if(loggedin()){
    $firstname = getuserfield('fname');
    $lastname = getuserfield('lname');
    echo 'You are logged in '.$firstname.' '.$lastname.' <a href = "login/logout.php">Logout</a><br>';
    $loginout = 'Log out';
    $loginout_address = 'logout.php';
    $regacc = 'View Account';
    $regacc_address ='view_account_details.php';
    $uid = $_SESSION['user_id'];
    
    //$query = "select fname,lname from users where uid = ".$uid.";";
    //$query_run = mysql_query($query);
   
}else {
    echo 'You are not logged in';
    $loginout = 'Log in';
    $loginout_address = 'login.php';
    $regacc = 'Register';
    $regacc_address ='register.php'

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to BODb !!</title>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="header-wrap">
	<div class="header">
            <div class="logo"><h1><a href="home_new.php" style="color: white">BODb</a></h1></div>
		<div class="menu">
        	<ul>
                <li><a href="index.html" >Movies</a></li>
                <li><a href="music.html" >Music         </a></li>
                <li><a href="Artists.html">Artists          </a></li>
                <li><a href="contact.html" >Contact</a></li>
                <li><a href="<?php echo $regacc_address; ?>"><?php echo $regacc;?>  </a></li>
                <li><a href ="<?php echo $loginout_address; ?>"><?php echo $loginout ?> </a> </li>
				
        	</ul>
        </div>
	</div>
</div><!---header-wrap--->

<div class="wrap">
	<div class="leftcol">
		<div class="search">
			<div class="title">
            	<h1>Site Search</h1>
                <div class="search-input"><input name="" type="text" class="input-style"/></div>
                <div class="search-btn"><a href="login.php"><img src="search-btn.jpg" alt="search" /></a></div>
            </div>
        </div>

		<div class="block"> 
        	<div class="panel">
            	<div class="title">
                	<h1>Latest Updates</h1>
                </div>
                <div class="content">
                	<ul>
                    	<li><a href="#">Tom Cruise starrer "Jack Reacher" in theatres</a></li>
                        <li><a href="#">Tom Hank's comback through INFERNO</a></li>
                        <li><a href="#">Ben Affleck’s ‘Accountant’ No. 1 at Box Office</a></li>
                        <li><a href="#">Pritam Chakraborty creates History With Ae Dil Hai Mushkil Songs!</a></li>
                        <li><a href="#">Hrithik Roshan’s Kaabil to be dubbed in Telugu</a></li>
                	</ul>
                </div>
        	</div>
		</div>
        
        <div class="block2">
        	<div class="title"><h1>Born This Month</h1></div>
            	
                <?php 
                for ($index = 0; $index < $query_num_rows; $index++) {
                    $firstname = mysql_result($query_run,$index,'fname');
                    $lastname = mysql_result($query_run,$index,'lname');
                    $dob = mysql_result($query_run,$index,'dob');

                    $image_name =$firstname.$lastname;
                    $image_name = strtolower($image_name);

                    include './repeat_month.php';
                    
                    
                }
                
                ?>
            </div>
	</div><!---leftcol--->

<div class="rightcol">
	<div class="banner"><img src="images/cap.jpg" alt="banner" /></div>
	<div class="page">
		<div class="panel mar-bottom">
			<div class="title">
            	<h1>Avengers: Age of Ultron 2015 </h1>
                <h2>‧ Science fiction film/Action ‧ 2h 22m</h2>
            </div>
            <div class="content">
            	<p>Tony Stark builds an artificial intelligence system named Ultron with the help of Bruce Banner. However, Ultron gains control and the Avengers have to stop him from wiping out the human race.</p>
                 <div class="button"><a href="#">More Info</a></div>
            </div>
        </div>
        <div class="box mar-Right">
        	<div class="panel">
        		<img src="images/ari.jpg" alt="image" width="230" height="270"  />
        		<div class="title">
                	<h1>Arijit Singh</h1>
                </div>
                <div class="content">
                	<p>The singer is about to perform in an event called Te Bollywood music project along with many artist og his league.</p>
                    <div class="button"><a href="#">More Info</a></div>
                </div>
        	</div>
        </div>
        <div class="box">
        	<div class="panel">
        		<img src="images/zim.jpg" alt="image" width="230" height="270" />
        		<div class="title">
                	<h1>Hans Zimmer</h1>
                </div>
                <div class="content">
                	<p>The German composer and record producer of the Batman series. Since the 1980s, he has composed music for over 150 films.</p>
                    <div class="button"><a href="#">More Info</a></div>
                </div>
        	</div>
        </div>
        <div class="clearing"></div>
        <div class="panel mar-top">
			<div class="title">
            	<h1>Star Wars: The Force Awakens</h1>
                <h2>Release date: December 25, 2015 (India)</h2>
            </div>
            <img src="images/star.png" alt="image" width="270" height="250"/>
            <div class="content">
            	<p>Fans who watched Star Wars 7 trailer will anticipate the new look at VII which is constantly on the list of top 2015 movies.</p>
                 <div class="button2"><a href="#">More Info</a></div>
            </div>
        </div>
	</div><!---page--->
</div><!---Rightcol--->
</div>
<div class="footer-wrap">
	<div class="footer">
		<div class="bolg">
            <div class="title">
            	<h1>From Our Bolg</h1>

            </div>
        	<div class="panel mar-right115">
            <div class="content">
            	<ul>
                	<li><img src="images/icon1.png" alt="icon" /></li>
                    <li>Siddharth Hatkar<br />Oct.2016</li><br><br><br>
					<li><img src="images/icon1.png" alt="icon" /></li>
                    <li>Purvi Jain<br />Oct.2016</li><br />
            	</ul>
                <p>Bodb Provides you a complete entertainment guide to Find showtimes, watch trailers, browse photos, track your Watchlist and rate your favorite movies</p>
                <p><a href="#">Read More + </a></p>
            </div>
           </div> 
           
           <div class="panel">
            <div class="content">
            	<ul>
                	<li><img src="images/icon1.png" alt="icon" /></li>
                    <li>Chaitanya Chauganjkar<br />Oct.2016</li><br><br><br>
					<li><img src="images/icon1.png" alt="icon" /></li>
                    <li>Siddhant Khanna<br />Oct.2016</li><br><br><br>
					
            	</ul>
                
            </div>
           </div>
        </div>
        
        <div class="quickcontact">
        	<div class="title">
            	<h1></h1>
            </div>
			<div class="panel">
            <div class="content">
            	<ul>
                    <li><p><a href="contact.php" class="active">Contact Us</a></p><br /><h5>We'll get back to you ASAP</h5></li>
            	</ul>
                <p>Mail Us @: <a href="https://accounts.google.com/ServiceLogin?service=mail&passive=true&rm=false&continue=https://mail.google.com/mail/&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1#identifier">BODb2016@gmail.com</a></p>
                <p><span>Tel: (000) 888 88888888</span></p>
            </div>
           </div>
        </div>
    </div>
</div><!---footer--->
</body>
</html>