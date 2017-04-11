<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => 'ozboardgamer.com',
		'secret' => 'key-17cd24ee7e04d9e750c57655300a8ad1',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],

	'facebook' => [
	    'client_id' => '256969058009917',
	    'client_secret' => 'cb35765b2e414b7d50d0398dd30679e6',
	    'redirect' => 'https://ozboardgamer.com/facebook/callback',
	],

	'google' => [
	    'client_id' => '235672082558-4tc6013v8rtgth9hfs188d67uhmc8am9.apps.googleusercontent.com',
	    'client_secret' => 'oGhCNUrn0JaqJDiMWNTIBOhk',
	    'redirect' => 'https://ozboardgamer.com/',
	],

];
