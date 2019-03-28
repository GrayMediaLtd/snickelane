<?php

global $project;
$project = 'mysite';

global $database;

if(!defined('SS_DATABASE_NAME')) {
	$database = 'snickel';
} else {
	$database = SS_DATABASE_NAME;
}

require_once "conf/ConfigureFromEnv.php";

// Set the site locale
i18n::set_locale('en_US');

if (!Director::isDev()) {
	Director::forceSSL();
}
