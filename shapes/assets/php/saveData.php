<?php
	session_start();
	date_default_timezone_set ( 'America/New_York' );
	# parameters
	$participant = $_SESSION['part_id'];
	$cur_date = date("m.d.y");
	$cur_time = date("h:i:sa");
	$img_group = $_REQUEST['img_group'];

	# load image data
	$img1 = $_REQUEST['img_1'];
	$img2 = $_REQUEST['img_2'];
	$img3 = $_REQUEST['img_3'];
	$img4 = $_REQUEST['img_4'];
	$img5 = $_REQUEST['img_5'];
	$img6 = $_REQUEST['img_6'];
	$img7 = $_REQUEST['img_7'];
	$img8 = $_REQUEST['img_8'];
	$img9 = $_REQUEST['img_9'];
	$img10 = $_REQUEST['img_10'];
	$img11 = $_REQUEST['img_11'];
	$img12 = $_REQUEST['img_12'];

	# load word left data
	$w_l_1 = $_REQUEST['w_l_1'];
	$w_l_2 = $_REQUEST['w_l_2'];
	$w_l_3 = $_REQUEST['w_l_3'];
	$w_l_4 = $_REQUEST['w_l_4'];
	$w_l_5 = $_REQUEST['w_l_5'];
	$w_l_6 = $_REQUEST['w_l_6'];
	$w_l_7 = $_REQUEST['w_l_7'];
	$w_l_8 = $_REQUEST['w_l_8'];
	$w_l_9 = $_REQUEST['w_l_9'];
	$w_l_10 = $_REQUEST['w_l_10'];
	$w_l_11 = $_REQUEST['w_l_11'];
	$w_l_12 = $_REQUEST['w_l_12'];

	# load word right data
	$w_r_1 = $_REQUEST['w_r_1'];
	$w_r_2 = $_REQUEST['w_r_2'];
	$w_r_3 = $_REQUEST['w_r_3'];
	$w_r_4 = $_REQUEST['w_r_4'];
	$w_r_5 = $_REQUEST['w_r_5'];
	$w_r_6 = $_REQUEST['w_r_6'];
	$w_r_7 = $_REQUEST['w_r_7'];
	$w_r_8 = $_REQUEST['w_r_8'];
	$w_r_9 = $_REQUEST['w_r_9'];
	$w_r_10 = $_REQUEST['w_r_10'];
	$w_r_11 = $_REQUEST['w_r_11'];
	$w_r_12 = $_REQUEST['w_r_12'];

	# request likert values
	$likert_1 = $_REQUEST['likert_1'];
	$likert_2 = $_REQUEST['likert_2'];
	$likert_3 = $_REQUEST['likert_3'];
	$likert_4 = $_REQUEST['likert_4'];
	$likert_5 = $_REQUEST['likert_5'];
	$likert_6 = $_REQUEST['likert_6'];
	$likert_7 = $_REQUEST['likert_7'];
	$likert_8 = $_REQUEST['likert_8'];
	$likert_9 = $_REQUEST['likert_9'];
	$likert_10 = $_REQUEST['likert_10'];
	$likert_11 = $_REQUEST['likert_11'];
	$likert_12 = $_REQUEST['likert_12'];

	# get file name
	$myfile = fopen($_SESSION['saveFile'], "a") or die($_SESSION['saveFile']);
	$txt1 = "$cur_date\t$cur_time\t$img_group\t$participant\t$img1\t$w_l_1$\t$w_r_1$\t$likert_1\n";
	$txt2 = "$cur_date\t$cur_time\t$img_group\t$participant\t$img2\t$w_l_2$\t$w_r_2$\t$likert_2\n";
	$txt3 = "$cur_date\t$cur_time\t$img_group\t$participant\t$img3\t$w_l_3$\t$w_r_3$\t$likert_3\n";
	$txt4 = "$cur_date\t$cur_time\t$img_group\t$participant\t$img4\t$w_l_4$\t$w_r_4$\t$likert_4\n";
	$txt5 = "$cur_date\t$cur_time\t$img_group\t$participant\t$img5\t$w_l_5$\t$w_r_5$\t$likert_5\n";
	$txt6 = "$cur_date\t$cur_time\t$img_group\t$participant\t$img6\t$w_l_6$\t$w_r_6$\t$likert_6\n";
	$txt7 = "$cur_date\t$cur_time\t$img_group\t$participant\t$img7\t$w_l_7$\t$w_r_7$\t$likert_7\n";
	$txt8 = "$cur_date\t$cur_time\t$img_group\t$participant\t$img8\t$w_l_8$\t$w_r_8$\t$likert_8\n";
	$txt9 = "$cur_date\t$cur_time\t$img_group\t$participant\t$img9\t$w_l_9$\t$w_r_9$\t$likert_9\n";
	$txt10 = "$cur_date\t$cur_time\t$img_group\t$participant\t$img10\t$w_l_10$\t$w_r_10$\t$likert_10\n";
	$txt11 = "$cur_date\t$cur_time\t$img_group\t$participant\t$img11\t$w_l_11$\t$w_r_11$\t$likert_11\n";
	$txt12 = "$cur_date\t$cur_time\t$img_group\t$participant\t$img12\t$w_l_12$\t$w_r_12$\t$likert_12\n";

	# write to file
	fwrite($myfile, $txt1);
	fwrite($myfile, $txt2);
	fwrite($myfile, $txt3);
	fwrite($myfile, $txt4);
	fwrite($myfile, $txt5);
	fwrite($myfile, $txt6);
	fwrite($myfile, $txt7);
	fwrite($myfile, $txt8);
	fwrite($myfile, $txt9);
	fwrite($myfile, $txt10);
	fwrite($myfile, $txt11);
	fwrite($myfile, $txt12);
	fclose($myfile);
	header("Location: http://cognitivetask.com/ratings/shapes/final.php");
?>