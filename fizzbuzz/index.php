<?php
$phrase = "Please enter a number.";

if (isset($_POST['number'])) {
	$phrase = $_POST['number'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fizz Buzz Kata</title>
</head>
<body>
	<form action="/" method="post">
		<input name="number" />
		<button type="submit">Submit</button>
	</form>
	<div class="output-container">
		<?php echo $phrase; ?>
	</div>
</body>
</html>