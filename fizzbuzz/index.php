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
		if (empty($multiple) || empty($_POST['substitutions'][$index])) { continue; }
		$rules[$multiple] = $_POST['substitutions'][$index];
	}

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

if ($rules == array()) {
	//If the user gives us a rule-less set, we tell the output that it's a void set for display purposes
	$voidSet = true;
	$rules = array(
		'' => ''
	);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fizz Buzz Kata</title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<div class="gameContainer">
		<h1>Fizz Buzz Kata</h1>
		<dl class="ruleset">
			<dt>The rules</dt>
			<dd>
				<ul>
					<?php 
					if (!isset($voidSet)) {
						foreach ($rules as $multiple => $substitution) { ?>
							<li>Multiple of <?php echo $multiple; ?> will return '<?php echo $substitution;?>'</li>
					<?php
						}
					} ?>
				</ul>
			</dd>
		</dl>
		<form id="gameInterface" class="gameInterface" action="/" method="post">
			<dl id="ruleList">
				<dt>The number:</dt>
				<dd class="numberField"><input id="numberFieldInput" type="number" name="number" value="<?php echo $providedNumber; ?>"/></dd>
				<dt>The rules:</dt>
				<?php foreach ($rules as $multiple => $substitution) { ?>
				<dd class="ruleField">Multiples of <input type="number" name="multiples[]"  value="<?php echo $multiple; ?>" /> will return <input type="text" name="substitutions[]" value="<?php echo $substitution; ?>" /><span class="add">+</span><span class="remove">-</span></dd>
				<?php } ?>
			</dl>
			<button class="formSubmit" type="submit">Submit</button>
		</form>
		<div class="outputContainer">
			<?php echo $phrase; ?>
		</div>
	</div>
	<script type="text/javascript" src="/assets/js/main.js"></script>
</body>
</html>