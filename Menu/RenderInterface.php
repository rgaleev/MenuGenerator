<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 25/10/15
 * Time: 22:37
 */

namespace Menu;

/**
 * Interface for menu renderer
 *
 * @package Menu
 */
interface RenderInterface
{
    /**
     * @param array $itemData
     * @param int $menuLevel
     *
     * @return string
     */
    public function renderItem(array $itemData, $menuLevel);

    /**
     * @param string $item
     * @param int $menuLevel
     *
     * @return string
     */
    public function wrapItem($item, $menuLevel);
}
