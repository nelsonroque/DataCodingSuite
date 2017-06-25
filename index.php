<?php
?>
<html>
<head>
<title>Rating Tasks</title>
<link rel="stylesheet" type="text/css" href="http://cognitivetask.com/ospan/assets/style.css">
</head>
<body>
<div class="container">
  	<div id="instruct_area">
  		<h1>Rating Tasks</h1>
      <h3>Click the buttons below to begin any of the tasks</h3>
      <hr>
      <center>
      <table>
      <tr>
      <td><p></p>
      <button class="standard_button_orange" onclick="start_FACES()">START FACES RATING</button></td>
      <td><p></p>
      <button class="standard_button_green" onclick="start_SHAPES()">START SHAPES RATING</button></td>
      <td><p></p>
      <button class="standard_button_blue" onclick="start_OBJECTS()">START OBJECTS RATING</button></td>
      </tr>
      </table>
      </center>
  	</div>
</div>
</body>
</html>
<script>
function start_FACES () {
    window.location.assign("http://cognitivetask.com/ratings/faces")
}
function start_SHAPES () {
    window.location.assign("http://cognitivetask.com/ratings/shapes")
}
function start_OBJECTS () {
    window.location.assign("http://cognitivetask.com/ratings/objects")
}
</script>