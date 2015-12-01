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
	$formulaire->champTypeSelectSimple(
		'sexe',
		['masc', 'fem', 'inc'],
		['Masculin', 'Féminin', 'Inconnu'],
		'Sexe : '
	);
	$formulaire->champTypeSelectMultiple(
		'couleur',
		['rouge', 'vert', 'bleu', 'jaune'],
		['Rouge', 'Vert', 'Bleu', 'Jaune'],
		'Couleurs préférées : '
	);
	$formulaire->champTypeFile('img', 'Image de profile : ', 'image/png, image/gif, image/jpeg');
	$formulaire->champTypeRadio(
		'boisson',
		['cafe', 'the', 'chocolat', 'eau', 'biere'],
		['Café', 'Thé', 'Chocolat chaud', 'Eau minérale', 'Bière'],
		'Boisson préférée : '
	);

	$formulaire->afficheFormulaireHTML();
}


main();
