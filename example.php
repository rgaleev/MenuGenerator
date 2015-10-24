<?php
/**
 * User: Roman Galeev <roman.galeev@lazada.com>
 * Date: 23/10/15
 * Time: 21:58
 */
namespace {
    require_once 'Helpers/TextHelper.php';
    require_once 'Menu/InputGenerator.php';
}

namespace Menu {
    $inputGenerator = new InputGenerator();
    $input          = $inputGenerator->generate();
    echo '<pre>';
    \var_export($input);
}
