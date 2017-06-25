<?php
# start session
session_start();

date_default_timezone_set ( 'America/New_York' );

$participant = $_SESSION['part_id'];
$cur_date = date("m.d.y");
$cur_time = date("h:i:sa");

# ---------------------------------------------------
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Image Rating Task</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script>
	$(document).ready(function() {
		$('.instructions').hide();
		$('.experiment').show();
	});
	</script>
</head>
<body>
	<div class="mine_theme">
		<h1 class="dark instructions">INSTRUCTIONS</h1>
		<div class="experiment">
			<?php
				$i = 1;
				$direction='EDUCATE';
				echo("<h1 class='dark'>THANK YOU FOR YOUR PARTICIPATION!</h1>");
				#echo("<h4 class='dark'>To receive compensation, </h4>");
				echo("<hr>");
				echo("<h4 class='dark'>PARTICIPANT: ".$participant."</h3>");
				echo("<h4 class='dark'>COMPLETION DATE: ".$cur_date."</h3>");
				echo("<h4 class='dark'>COMPLETION TIME: ".$cur_time."</h3>");
				echo("<hr>");
			?>
				<button class="standard_button_blue" onclick="back_to_back()">Continue to the other Ratings Tasks</button>
		</div>
	</div>
</body>
<script type="text/javascript">
	function back_to_back() {
    window.location.assign("http://cognitivetask.com/ratings")
}
</script>
</html>