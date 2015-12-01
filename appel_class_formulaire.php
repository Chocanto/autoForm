<?php

require_once('classFormulaire.php');

function main() {
	$formulaire = new FormulaireHTML();

	$formulaire->champTypeText('login', 'Login : ');
	$formulaire->champTypePassword('password', 'Mot de passe : ');
	$formulaire->champTypeTextarea('description', 'Description : ');
	$formulaire->champTypeCheckbox(
		['matin', 'aprem', 'soiree', 'nuit'],
		['Matin', 'Après-midi', 'Soirée', 'Nuit'],
		'Disponibilités : '
	);

	$formulaire->afficheFormulaireHTML();
}


main();
