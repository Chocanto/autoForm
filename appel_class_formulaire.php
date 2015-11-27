<?php

require_once('classFormulaire.php');

function main() {
	$formulaire = new FormulaireHTML();

	$formulaire->champTypeText('nom_variable');

	$formulaire->afficheFormulaireHTML();
}


main();
