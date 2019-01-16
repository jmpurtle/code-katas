var ruleSet = document.getElementById('gameInterface').addEventListener('click', function (event) {
	if (event.target.matches('.add')) {
		var newRule = event.target.parentElement.cloneNode(true);
		document.getElementById('ruleList').appendChild(newRule);
	}

	if (event.target.matches('.remove')) {
		var ruleFields = document.querySelectorAll('.ruleField');
		if (ruleFields.length > 1) {
			//We want to make sure it's not possible to block the game through normal means by deleting all rule fields
			document.getElementById('ruleList').removeChild(event.target.parentElement);
		} else {
			var ruleFieldsInputs = document.querySelectorAll('.ruleField input');
			ruleFieldsInputs.forEach(function(inputField) {
				inputField.value = '';
			});
		}
	}

});