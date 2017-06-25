<?php
# start session
session_start();

date_default_timezone_set ( 'America/New_York' );

# ---------------------------------------------------

# gen part_number function
function gen_random_string($digits) {
	# list of all numbers and letters
	$all_nums = array('0','1','2','3','4','5','6','7','8','9');
	$all_letters = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

	$rand_string = '';

	# Shuffle both lists
	shuffle($all_nums);
	shuffle($all_letters);

	$i = 0;

	while ($i < $digits) {
		if ($i % 2 == 0) {
			$cur_rand = array_pop($all_nums);
		}
		else {
			$cur_rand = array_pop($all_letters);
		}

		$rand_string = "$rand_string"."$cur_rand";
		$i += 1;
	}

	return $rand_string;
}

# ---------------------------------------------------

# store in session

# ---------------------------------------------------

if (!isset($_SESSION['part_id'])) {
	# gen participant number
	$digits = 7;
	$random_string = gen_random_string($digits);

	# save data to session
	$_SESSION['part_id'] = "$random_string";
}

$_SESSION['saveFile'] =  $_SERVER['DOCUMENT_ROOT']."/ratings/data/shapes_".$_SESSION['part_id'].'.txt';

# write header
$myfile = fopen($_SESSION['saveFile'], "a") or die($_SESSION['saveFile']);
$txt = "date\ttime\timg_group\tparticipant\tfilename\tword_left\tword_right\trating\n";

# write to file
fwrite($myfile, $txt);
fclose($myfile);

# ---------------------------------------------------

# load in image list
$path = 'assets/img';

$files = array_values(array_filter(scandir($path), function($file) {
    return !is_dir($file);
}));

# randomize presentation order
shuffle($files);
$img_list = $files;

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
		$('.instruct_1').hide();
		$('.instruct1').hide();
		$('.instruct_2').hide();
		$('.instruct2').hide();
		$('.instruct_3').hide();
		$('.instruct3').hide();
		$('.experiment').hide();
		$('.donotcontinue').hide();
		$('.stimuli_1').hide();
		$('.stimuli_2').hide();
		$('.stimuli_3').hide();
		$('.stimuli_4').hide();
		$('.stimuli_5').hide();
		$('.stimuli_6').hide();
		$('.stimuli_7').hide();
		$('.stimuli_8').hide();
		$('.stimuli_9').hide();
		$('.stimuli_10').hide();
		$('.stimuli_11').hide();
		$('.stimuli_12').hide();
		$('.button_1').hide();
		$('.button_2').hide();
		$('.button_3').hide();
		$('.button_4').hide();
		$('.button_5').hide();
		$('.button_6').hide();
		$('.button_7').hide();
		$('.button_8').hide();
		$('.button_9').hide();
		$('.button_10').hide();
		$('.button_11').hide();
		$('.button_12').hide();
		$('.final_submit').hide();
	});
	</script>
</head>
<body>
	<div class="mine_theme">
		<!-- BEGIN CONSENT FORM -->
		<h1 class="dark consent">INFORMED CONSENT FORM</h1>
		<p class="dark consent">
			I freely and voluntarily and without element of force or coercion, consent to be a
			participant in this research project.
			<br><br>
			I understand the purpose of their research project is to better understand how ambiguity leads to decision making.
			<br><br>
			I understand that the study will last approximately 3 minutes. I understand my participation is totally voluntary
			and I may stop participation at anytime. 
			<br><br>
			I understand that everything I say will be kept
			strictly confidential to the extent allowable by law. Any data that results from my
			participation will be made totally anonymous, and will not be attributable to any
			individual.
			<br><br>
			I understand there is a possibility of a minimal level of risk involved equivalent to that
			encountered in daily life. 
			<br><br>
			However, I am able to stop my participation at any time I wish.
			<br>
			I understand that there are seven features of the study process designed to maximize
			my confidentiality. These are described below.
			</p>
		<hr class="consent">
		<!-- END CONSENT FORM -->
		<h1 class="dark instructions">INSTRUCTIONS</h1>
		<h2 class="dark instruct_1">This experiment will ask you to rate an image on a spectrum.</h2>
		<h2 class="dark instruct_2">While viewing this set of images, determine to what degree the image is representative of two categories</h2>
		<h2 class="dark consent">By clicking yes, you are agreeing with the terms mentioned above, and consent to this experiment.</h2>
		<button class="consent_yes" value="yes">YES</button>
		<button class="consent_no" value="no">NO</button>
		<button class="instruct1">NEXT</button>
		<button class="instruct2">NEXT</button>
		<button class="instruct3">NEXT</button>
		</div>
		<div id='top'></div>
		<div class="experiment">
			<?php
				$i = 1;
				$img_group = 'shapes';
				echo("<center>");
				echo("<form action='assets/php/saveData.php' method='post'>");
				echo("<input type='hidden' name='direction' value='$img_group'>");
				foreach($img_list as $item){
					# create vars
					$stimuli_class = 'stimuli_'.$i;
					$likert_class = "likert_".$i;
					$img_class = "img_".$i;
					$button_class = "button_".$i;
					$path_item = $path.'/'.$item;
					$wli = "w_l_".$i;
					$wri = "w_r_".$i;

					# determine word choices based on filename
					if ($item == "circle.png") {
						$word_choices = array("Circle","Square");
					} elseif ($item == "triangle.png") {
						$word_choices = array("Triangle","Square");
					} elseif ($item == "square.png") {
						$word_choices = array("Circle","Square");
					} elseif ($item == "circle_square_1.png" || $item == "circle_square_2.png" || $item == "circle_square_3.png") {
						$word_choices = array("Circle","Square");
					} elseif ($item == "triangle_square_1.png" || $item == "triangle_square_2.png" || $item == "triangle_square_3.png") {
						$word_choices = array("Triangle","Square");
					} elseif ($item == "triangle_circle_1.png" || $item == "triangle_circle_2.png" || $item == "triangle_circle_3.png") {
						$word_choices = array("Triangle","Circle");
					}

					# randomize word choices
					shuffle($word_choices);

					# get left/right words
					$word_left = $word_choices[0];
					$word_right = $word_choices[1];

					# draw form
					echo("<div class='$stimuli_class'>");
					echo("<img src='$path_item'><br>");
					echo("<h3><span style='color:red;'>Please note that labels may switch sides from trial to trial</span></h3>");
					echo("<hr>");

					# to show slider, uncomment below
					#echo("<label for='range_Left'>$word_left</label>");
					#echo("<center>Ambivalent</center>");
				 	#echo("<input type='range' name='$likert_class' id='points' value='0' min='-50' max='50'><br>");
					#echo("<label for='range_Right'>$word_right</label><br>");

					# set likert options
					$option1 = "1";
					$option2 = "2";
					$option3 = "3";
					$option4 = "4";
					$option5 = "5";
					$option6 = "6";
					$option7 = "7";

					$option1_lab = $word_left;
					$option2_lab = "2";
					$option3_lab = "3";
					$option4_lab = "Uncertain/<br>Ambivalent";
					$option5_lab = "5";
					$option6_lab = "6";
					$option7_lab = $word_right;

					echo("<table class='likert_table'>
					<tr>
					<td><b>$option1_lab</b></td>
					<td><b>$option2_lab</b></td>
					<td><b>$option3_lab</b></td>
					<td><b>$option4_lab</b></td>
					<td><b>$option5_lab</b></td>
					<td><b>$option6_lab</b></td>
					<td><b>$option7_lab</b></td>
					</tr>
					<tr>
					<td><input type='radio' name='$likert_class' value='$option1' /></td>
					<td><input type='radio' name='$likert_class' value='$option2' /></td>
					<td><input type='radio' name='$likert_class' value='$option3' /></td>
					<td><input type='radio' name='$likert_class' value='$option4' /></td>
					<td><input type='radio' name='$likert_class' value='$option5' /></td>
					<td><input type='radio' name='$likert_class' value='$option6' /></td>
					<td><input type='radio' name='$likert_class' value='$option7' /></td>
					</tr>
					</table>");

					echo("<input type='hidden' name='img_group' value='$img_group'>");
					echo("<input type='hidden' name='$img_class' value='$item'>");
					echo("<input type='hidden' name='$wli' value='$word_left'>");
					echo("<input type='hidden' name='$wri' value='$word_right'>");
					echo("<hr><a href='#top'><button type='button' class='$button_class'>NEXT</button></a>");
					echo("</div>");
					$i += 1;
				}

				# add submit button
				echo("<button class='final_submit' name='text_submit' onsubmit='form.final_submit.disabled = true;'>Submit All Responses</button></form></center>");
			?>
		</div>
		<div class="donotcontinue">
			<?php
				echo("<center>
					<h1 class='dark'>Thank You for your time!</h1>
					<h3 class='dark'>Ask your experimenter for further details about this study if interested</h3>
					</center>");
			?>
		</div>

<!-- show and hide components based on page navigation -->
<script>
	$( ".consent_yes" ).click(function() {
	$( ".consent" ).hide();
	$( ".consent_yes" ).hide();
	$( ".consent_no" ).hide();
	$('.instructions').show();
	$( ".instruct1" ).show();
	$( ".instruct_1" ).show();
	});
	$( ".consent_no" ).click(function() {
	$( ".consent" ).hide();
	$( ".consent_yes" ).hide();
	$( ".consent_no" ).hide();
	$( ".donotcontinue" ).show();
	});
	$( ".instruct1" ).click(function() {
	$( ".instruct1" ).hide();
	$( ".instruct_1" ).hide();
	$( ".instruct2" ).show();
	$( ".instruct_2" ).show();
	});
	$( ".instruct2" ).click(function() {
	$( ".instruct2" ).hide();
	$( ".instruct_2" ).hide();
	$( ".instructions" ).hide();
	$( ".experiment" ).show();
	$( ".stimuli_1").show();
	$( ".button_1" ).show();
	});
	$( ".button_1" ).click(function() {
	$( ".stimuli_1" ).hide();
	$( ".button_1" ).hide();
	$( ".stimuli_2" ).show();
	$( ".button_2" ).show();
	});
	$( ".button_2" ).click(function() {
	$( ".stimuli_2" ).hide();
	$( ".button_2" ).hide();
	$( ".stimuli_3" ).show();
	$( ".button_3" ).show();
	});
	$( ".button_3" ).click(function() {
	$( ".stimuli_3" ).hide();
	$( ".button_3" ).hide();
	$( ".stimuli_4" ).show();
	$( ".button_4" ).show();
	});
	$( ".button_4" ).click(function() {
	$( ".stimuli_4" ).hide();
	$( ".button_4" ).hide();
	$( ".stimuli_5" ).show();
	$( ".button_5" ).show();
	});
	$( ".button_5" ).click(function() {
	$( ".stimuli_5" ).hide();
	$( ".button_5" ).hide();
	$( ".stimuli_6" ).show();
	$( ".button_6" ).show();
	});
	$( ".button_6" ).click(function() {
	$( ".stimuli_6" ).hide();
	$( ".button_6" ).hide();
	$( ".stimuli_7" ).show();
	$( ".button_7" ).show();
	});
	$( ".button_7" ).click(function() {
	$( ".stimuli_7" ).hide();
	$( ".button_7" ).hide();
	$( ".stimuli_8" ).show();
	$( ".button_8" ).show();
	});
	$( ".button_8" ).click(function() {
	$( ".stimuli_8" ).hide();
	$( ".button_8" ).hide();
	$( ".stimuli_9" ).show();
	$( ".button_9" ).show();
	});
	$( ".button_9" ).click(function() {
	$( ".stimuli_9" ).hide();
	$( ".button_9" ).hide();
	$( ".stimuli_10" ).show();
	$( ".button_10" ).show();
	});
	$( ".button_10" ).click(function() {
	$( ".stimuli_10" ).hide();
	$( ".button_10" ).hide();
	$( ".stimuli_11" ).show();
	$( ".button_11" ).show();
	});
	$( ".button_11" ).click(function() {
	$( ".stimuli_11" ).hide();
	$( ".button_11" ).hide();
	$( ".stimuli_12" ).show();
	$( ".button_12" ).hide();
	$( ".final_submit" ).show();
	});
</script>
</body>
</html>