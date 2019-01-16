<?php
$phrase = "Please enter a number.";
$rules = array(
	3 => 'fizz',
	5 => 'buzz'
);

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
				<li>Multiple of 3 will return 'fizz'</li>
				<li>Multiple of 5 will return 'buzz'</li>
			</ul>
		</dd>
	</dl>
	<form action="/" method="post">
		<input name="number" />
		<button type="submit">Submit</button>
	</form>
	<div class="output-container">
		<?php echo $phrase; ?>
	</div>
</body>
</html>