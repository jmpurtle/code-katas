<?php

$phrase = "Please enter a number.";
$providedNumber = null;

$rules = array(
	3 => "fizz",
	5 => "buzz",
	7 => "pop"
);
if (isset($_POST['multiples']) && isset($_POST['substitutions'])) {
	$rules = array();
	foreach ($_POST['multiples'] as $index => $multiple) {
		if (empty($multiple)) { continue; }
		$rules[$multiple] = $_POST['substitutions'][$index];
	}

	echo var_export($rules, true);
}

if (isset($_POST['number'])) {
	$phrase = $_POST['number'];
	$providedNumber = $_POST['number'];

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
			<dd><input type="number" name="number" value="<?php echo $providedNumber; ?>"/></dd>
			<dt>The rules:</dt>
			<?php foreach ($rules as $multiple => $substitution) { ?>
			<dd>Multiples of <input type="number" name="multiples[]"  value="<?php echo $multiple; ?>" /> will return <input type="text" name="substitutions[]" value="<?php echo $substitution; ?>" /></dd>
			<?php } ?>
		<button type="submit">Submit</button>
	</form>
	<div class="output-container">
		<?php echo $phrase; ?>
	</div>
</body>
</html>