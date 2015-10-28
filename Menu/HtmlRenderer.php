<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 25/10/15
 * Time: 22:39
 */

namespace Menu;
use Menu\Data\Item;

/**
 * Renders menu as HTML
 *
 * @package Menu
 */
class HtmlRenderer implements RenderInterface
{
    const INDENT = '    ';

    private function renderIndent($level)
    {
        $result = '';
        for ($i = 0; $i < $level; $i++) {
            $result .= self::INDENT;
        }

        return $result;
    }

    private function renderLevelBegin($level)
    {
        $result = $this->renderIndent($level) . '<ul>' . PHP_EOL;

        return $result;
    }

    private function renderLevelEnd($level)
    {
        $result = $this->renderIndent($level) . '</ul>' . PHP_EOL;

        return $result;
    }

    private function renderItemBegin($level)
    {
        $result = $this->renderIndent($level) . '<li>' . PHP_EOL;

        return $result;
    }

    private function renderItemEnd($level)
    {
        $result = $this->renderIndent($level) . '</li>' . PHP_EOL;

        return $result;
    }

    /**
     * @param string $menuItem
     * @param int $level
     *
     * @return string
     */
    public function wrapMenuItem($menuItem, $level)
    {
        $indentLevel = 2 * $level + 1;
        return $this->renderItemBegin($indentLevel) . $menuItem . $this->renderItemEnd($indentLevel);
    }

    /**
     * @param string $menuLevel
     * @param int    $level
     *
     * @return string
     */
    public function wrapMenuLevel($menuLevel, $level)
    {
        $indentLevel = 2 * $level;
        return $this->renderLevelBegin($indentLevel) . $menuLevel . $this->renderLevelEnd($indentLevel);
    }

    /**
     * @param Item $item
     *
     * @return string
     */
    public function renderMenuItem(Item $item)
    {
        $childrenCountOutput = '';
        if ($item->childrenCount > 0) {
            $childrenCountOutput = " ($item->childrenCount)";
        }
        $indentLevel = 2 * $item->level + 2;
        $result = $this->renderIndent($indentLevel) . "<a href=\"{$item->url}\">{$item->title}{$childrenCountOutput}</a>" . PHP_EOL;

        return $result;
    }
}
