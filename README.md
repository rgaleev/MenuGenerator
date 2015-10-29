# MenuGenerator

To generate a menu at first need to choose a renderer implementing **\Menu\RenderInterface** 
(only **\Menu\HtmlRenderer** exists yet).
Then to invoke it to **\Menu\MenuGenerator** and to call generateFromInput($config).
Config should be in the following format, level of nesting is not bounded:

    array(
    	'title' => '',
    	'url' => '',
    	'children' => array(
    	    array(
    	        'title' => '',
                'url' => '',
    	    ),
    	    array(
    	        'title' => '',
                'url' => '',
                'children' => array(...),
    	    ),
    	),
    );

Here is a class for generating test config **\Menu\InputGenerator**.
# Tests
Run unit tests with the command

    php tests/phpunit.phar --bootstrap autoloader.php --colors=always tests
