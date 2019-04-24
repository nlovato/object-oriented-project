<?php
require_once ("Author.php");
require_once(dirname(__DIR__,2) . "/vendor/autoload.php");
$oVal = (object)[\nmarshloavto\ObjectOrientedProject\Author::class];

use nmarshlovato\ObjectOrientedProject\Author;

	$authorId = new Author("f805a6fb-83c8-4690-bcb2-19b170cfc8f8\", \"dummy.com\", \"0abf9d115769410ab1d55e0acec5f8b0\", \"duumy505@gmail.com\", \"QueSera88\", \"$argon2i$v=19$m=1024,t=384,p=2$T1B6Ymdqa3FJdmZqaDdqYg$hhyC1jf2WjbgfD8Jp6GZE9Tg3IpsYpXKm2VWYOJq8LA");


	var_dump($authorId);