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
     * @param array $menuLevel
     * @param int $level
     *
     * @return string
     */
    public function renderMenuLevel(array $menuLevel, $level);
}
