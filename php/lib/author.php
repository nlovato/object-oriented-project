<?php

/*
 * setup require_once, namespaces (make sure to include both autoloaders)
 * use the new keyword to call the constructor in the class and add all required parameters
 * vardump() the result from the step above
 */
require_once (dirname(__DIR__) . "/vendor/autoload.php");
require_once(dirname(__DIR__) . "/classes/autoload.php");

use nmarshlovato\ObjectOrientedProject\Author;

	$authorId = new Author("23f0d40babd5456d8ae516186e135a01",
	"avatar", "0abf9d115769410ab1d55e0acec5f8b0", "new@email.com",
	'$argon2i$v=19$m=1024,t=384,p=2$T1B6Ymdqa3FJdmZqaDdqYg$hhyC1jf2WjbgfD8Jp6GZE9Tg3IpsYpXKm2VWYOJq8LA',
	"newAuthorUsername");
	var_dump($authorId);