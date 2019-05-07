<?php

/*
 * setup require_once, namespaces (make sure to include both autoloaders)
 * use the new keyword to call the constructor in the class and add all required parameters
 * vardump() the result from the step above
 */
require_once(dirname(__DIR__) . "/classes/autoload.php");

use nmarshlovato\ObjectOrientedProject\Author;
$authorId = null;

	try{
		$authorId = new Author("87e1528e-da10-4bf2-abdd-ed28b06e95f5",
			"avatar", "87e1528eda104bf2abdded28b06e95f5", "new@gmail.com",
			'$argon2i$v=19$m=1024,t=384,p=2$T1B6Ymdqa3FJdmZqaDdqYg$hhyC1jf2WjbgfD8Jp6GZE9Tg3IpsYpXKm2VWYOJq8LA',
			"newAuthorUsername");
	}
	catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		echo $exception->getPrevious();
	}
	var_dump($authorId);