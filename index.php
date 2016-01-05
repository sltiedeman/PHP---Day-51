<?php
	$connection = mysql_connect('127.0.0.1', 'phpland', 'test');
	if (!$connection) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db('phpland', $connection);
	if (!db_selected) {
		die ('Can\'t use phpland : ' . mysql_error());
	}
	// else{
	// 	print "success!!";
	// }
	//in this case phpland is the name of our db and not the user!
	// $query = "SELECT * FROM about WHERE section = 'header'";
	$query = "SELECT * FROM about";
	//We have a var called query with our query 
	$result = mysql_query($query);
	//We now have a mysql object called result!
	print mysql_error();
	// while ($row = mysql_fetch_assoc($result)){
	// 	$rows[] = $row;
	// }
	while ($row = mysql_fetch_assoc($result)){
		$section = $row["section"];
		$rows[$section] = $row['content'];
	}

	// $header_content = $rows[0]['content'];


	//this will print off our error if one happens
	$row = mysql_fetch_assoc($result);
	// print "<pre>";
	// print_r ($row['id']);
	// print "</pre>";
	$header_content = $row['content'];

	$feedback = 'Feedback';
	$span = '<span>Prepare for Your Adventure</span>';
	$home = '<li>Home</li>';
	$about = '<li>About Us</li>';
	$programs = '<li>Programs</li>';
	$leadership = '<li>Leadership</li>';
	$contact = '<li>Contact Us</li>';
	$textleft1 = 'Our lives take us on many journeys; with our careers, families, sports teams, schools, etc...  At Sojourn, our desire is to provide a safe and fun environment to Sojourn from these life journeys for a brief period of time in order to reflect, gain new insight, and enter back into our journeys with new perspective.';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu|Oswald|Kameron">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="scripts.js" type="text/javascript"></script>
</head>
<body>

<div id="total-wrapper">
	<div id="social-media">
		<div class="text">
			<img src="http://pq.b5z.net/zirw/317/i/u/10099375/i/menu/qb877.gif">
			<?php print $feedback ?>
		</div>
		<div id="icons">
			<img src="http://q.b5z.net/zirw/h495b/i/t/w/integration/social/icons/fcc1/tw_32x32.png">
			<img  src="http://q.b5z.net/zirw/h495b/i/t/w/integration/social/icons/fcc1/fb_32x32.png">
			<img src="http://q.b5z.net/zirw/h495b/i/t/w/integration/social/icons/fcc1/ig_32x32.png">
		</div>
		<div class="text">
			<img src="http://pq.b5z.net/zirw/317/i/u/10099375/i/menu/qb658.gif">
			<?php print $span ?>
		</div>
	</div>

	<div id="banner">
		<div id="header-holder">
			<img src="header.png">
		</div>
		<div id="menu">
			<ul>
				<?php print $home ?>
				<?php print $about ?>
				<?php print $programs ?>
				<?php print $leadership ?>	
				<?php print $contact ?>		
			</ul>
		</div>
	</div>

	<div id="main-content-wrapper">
		<div id="main-content">
			<div id="left">
				<h1> <img style="display:inline" src="http://pq.b5z.net/zirw/317/i/u/10099375/i/menu/tico1.png">About Sojourn </h1>
				<hr></hr>
				<img id="sojourn-pic" src="sojourn.jpg">
				<div class="text-left">
					<?php print $rows['about'] ?>
				</div>
				<div class="picture-right">
					<img src="http://pq.b5z.net/i/u/10099375/i/Fox_5_Video_of_Sojourn.png">
				</div>
				<hr class="rule"></hr>
				
				<div class="text-left">
					<?php print '<h1>Location </h1>'; ?>
					<?php print $rows['header']; ?>
				</div>
				<div class="picture-right">
					<img src="http://pq.b5z.net/i/u/10099375/i/Get_Directions_to_Ropes_Course_Button.png">
				</div>

				<hr class="rule"></hr>
				
				<div class="text-left">
					<h1>ACCT Membership </h1>
					<?php print $rows['acct']; ?>
				</div>
				<div class="picture-right">
					<img src="http://pq.b5z.net/i/u/10099375/i/ACCT_Logo_Button.png">
				</div>


				<hr class="rule"></hr>
				<div id="pricing">
					<h1>Pricing </h1>
					<?php print $rows['pricing']; ?>

				</div>
				



			</div>
			<div id="right">
				<img src="http://pq.b5z.net/i/u/10099375/i/Get_a_Quote.png">
				<img src="http://pq.b5z.net/i/u/10099375/i/Photo_Gallery_Button.png">
				<img src="http://pq.b5z.net/i/u/10099375/i/video_tour_button.png">
				<img src="http://pq.b5z.net/i/u/10099375/i/Prepare_for_Your_Event_Sidebar_Button.png"> 
			</div>
		</div>	
	</div>

	<div id="footer">
		<?php print $rows['address']; ?>
		<img id="staff-login" alt="Ropes Course Staff Login" src="http://q.b5z.net/i/u/10099375/i/staff_login_button_footer.png">
		<img alt="Association for Challenge Course Technology" src="http://q.b5z.net/i/u/10099375/i/acct_logo_footer.png">
	</div>
	
</div>	

</body>
</html>