<?php
$phrase = "Please enter a number.";

$rules = array();
if (isset($_POST['multiples']) && isset($_POST['substitutions'])) {
	foreach ($_POST['multiples'] as $index => $multiple) {
		$rules[$multiple] = $_POST['substitutions'][$index];
	}
}

if (isset($_POST['number'])) {
	$phrase = $_POST['number'];

	$alteredPhrase = array();
	foreach ($rules as $multiple => $substitution) {
		if ($phrase % $multiple === 0) {
			$alteredPhrase[] = $substitution;
		}
	}

	if ($alteredPhrase !== array()) {
		$phrase = implode(" ", $alteredPhrase);
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fizz Buzz Kata</title>
</head>
<body>
	<h1>Fizz Buzz Kata</h1>
	<dl>
		<dt>The rules</dt>
		<dd>
			<ul>
				<?php foreach ($rules as $multiple => $substitution) { ?>
				<li>Multiple of <?php echo $multiple; ?> will return '<?php echo $substitution;?>'</li>
				<?php } ?>
			</ul>
		</dd>
	</dl>
	<form action="/" method="post">
		<dl>
			<dt>The number:</dt>
			<dd><input type="number" name="number" /></dd>
			<dt>The rules:</dt>
			<dd>Multiples of <input type="number" name="multiples[]" /> will return <input type="text" name="substitutions[]" /></dd>
		<button type="submit">Submit</button>
	</form>
	<div class="output-container">
		<?php echo $phrase; ?>
	</div>
</body>
</html>