<?php

$minhaString = "minha string é essa";

if(preg_match('/ /', $minhaString)) :
	echo "string found";
else : 
	echo "string not found";
endif;
