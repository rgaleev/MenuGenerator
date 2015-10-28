<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 25/10/15
 * Time: 22:37
 */

namespace Menu;

use Menu\Data\Item;

/**
 * Interface for menu renderer
 *
 * @package Menu
 */
interface RenderInterface
{
    /**
     * @param Item $item
     *
     * @return string
     */
    public function renderMenuItem(Item $item);

    /**
     * @param string $menuItem
     * @param int    $level
     *
     * @return string
     */
    public function wrapMenuItem($menuItem, $level);

    /**
     * @param string $menuLevel
     * @param int    $level
     *
     * @return string
     */
    public function wrapMenuLevel($menuLevel, $level);
}
