<?php

require_once('classFormulaire.php');

function main() {
	$formulaire = new FormulaireHTML();

	$formulaire->champTypeText('nom_variable', 'Variable test : ', 'test');

	$formulaire->champTypeText('variable_2', 'Variable 2 : ', 'test 2');

	$formulaire->afficheFormulaireHTML();
}


main();
