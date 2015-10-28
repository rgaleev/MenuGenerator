<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 23/10/15
 * Time: 21:58
 */

use \Menu\InputGenerator;
use \Menu\MenuGenerator;
use \Menu\HtmlRenderer;

require_once 'autoloader.php';

$inputGenerator = new InputGenerator();
$input          = $inputGenerator->generate();
$menuGenerator  = new MenuGenerator(new HtmlRenderer());
$menu           = $menuGenerator->generateFromInput($input);
\var_export($menu);
