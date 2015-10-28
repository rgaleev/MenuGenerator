<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 25/10/15
 * Time: 02:02
 */

namespace Menu;

/**
 * Generates menu code
 *
 * @package Menu
 */
class MenuGenerator
{
    /**
     * @var RenderInterface
     */
    private $renderer;

    /**
     * @param RenderInterface $menuRenderer
     */
    public function __construct(RenderInterface $menuRenderer)
    {
        $this->setRenderer($menuRenderer);
    }

    /**
     * @param RenderInterface $menuRenderer
     */
    public function setRenderer(RenderInterface $menuRenderer)
    {
        $this->renderer = $menuRenderer;
    }

    private function renderMenuItem($menuItem, $level)
    {
        $item = $this->renderer->renderItem($menuItem, $level);
        if (array_key_exists('children', $menuItem)) {
            $item .= $this->renderMenuLevel($menuItem['children'], $level + 1);
        }

        return $this->renderer->wrapItem($item, $level);
    }

    private function renderMenuLevel($menuLevel, $level)
    {
        $result = '';
        foreach ($menuLevel as $menuItem) {
            $result .= $this->renderMenuItem($menuItem, $level);
        }
        return $this->renderer->wrapLevel($result, $level);
    }

    /**
     * @param array $input
     *
     * @return string
     */
    public function generateFromInput(array $input)
    {
        return $this->renderMenuLevel($input, 0);
    }
}
