<?php
/**
 * User: Roman Galeev <roman.galeev@lazada.com>
 * Date: 23/10/15
 * Time: 21:58
 */

use \Menu\InputGenerator;
use \Menu\MenuGenerator;

require_once 'autoloader.php';

$inputGenerator = new InputGenerator();
$input          = $inputGenerator->generate();
echo '<pre>';
//    \var_export($input);
$menuGenerator = new MenuGenerator();
$menu          = $menuGenerator->generateFromInput($input);
\var_export($menu);
