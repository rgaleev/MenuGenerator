<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 25/10/15
 * Time: 02:02
 */

namespace Menu;

use Menu\Data\Item;
use Menu\Data\ItemCollection;

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

    /**
     * @param Item $menuItem
     *
     * @return string
     */
    private function renderMenuItem(Item $menuItem)
    {
        $item = $this->renderer->renderMenuItem($menuItem);
        if ($menuItem->childrenCount > 0) {
            $item .= $this->renderMenuLevel($menuItem->children);
        }

        return $this->renderer->wrapMenuItem($item, $menuItem->level);
    }

    /**
     * @param ItemCollection $menuLevelConfig
     *
     * @return string
     */
    private function renderMenuLevel(ItemCollection $menuLevelConfig)
    {
        $menuLevel = '';
        foreach ($menuLevelConfig as $menuItem) {
            $menuLevel .= $this->renderMenuItem($menuItem);
        }

        return $this->renderer->wrapMenuLevel($menuLevel, $menuLevelConfig->level);
    }

    /**
     * @param array $input
     *
     * @return string
     */
    public function generateFromInput(array $input)
    {
        $config = $this->makeConfig($input);

        return $this->renderMenuLevel($config);
    }

    /**
     * @param array $itemData
     * @param int   $level
     *
     * @return Item
     */
    private function makeConfigItem(array $itemData, $level)
    {
        $item = new Item($itemData, $level);
        if (array_key_exists('children', $itemData)) {
            $children = $this->makeConfigLevel($itemData['children'], $level + 1);
            $item->setChildren($children);
        }

        return $item;
    }

    /**
     * @param array $levelData
     * @param int   $level
     *
     * @return ItemCollection
     */
    private function makeConfigLevel(array $levelData, $level)
    {
        $collection = new ItemCollection($level);
        foreach ($levelData as $itemData) {
            $collection[] = $this->makeConfigItem($itemData, $level);
        }

        return $collection;
    }

    /**
     * Makes proper menu config from initial array
     *
     * @param array $input
     *
     * @return ItemCollection
     */
    private function makeConfig(array $input)
    {
        return $this->makeConfigLevel($input, 0);
    }
}
