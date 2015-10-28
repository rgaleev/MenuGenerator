<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 25/10/15
 * Time: 22:39
 */

namespace Menu;

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
     * @param string $item
     * @param int $menuLevel
     *
     * @return string
     */
    public function wrapItem($item, $menuLevel)
    {
        $indentLevel = 2 * $menuLevel + 1;
        return $this->renderItemBegin($indentLevel) . $item . $this->renderItemEnd($indentLevel);
    }

    /**
     * @param string $item
     * @param int $menuLevel
     *
     * @return string
     */
    public function wrapLevel($item, $menuLevel)
    {
        $indentLevel = 2 * $menuLevel;
        return $this->renderLevelBegin($indentLevel) . $item . $this->renderLevelEnd($indentLevel);
    }

    /**
     * @param array $itemData
     * @param int $menuLevel
     *
     * @return string
     */
    public function renderItem(array $itemData, $menuLevel)
    {
        $childrenCount = array_key_exists('children', $itemData) ? count($itemData['children']) : 0;
        $childrenCountOutput = '';
        if ($childrenCount > 0) {
            $childrenCountOutput = " ($childrenCount)";
        }
        $indentLevel = 2 * $menuLevel + 2;
        $result = $this->renderIndent($indentLevel) . "<a href=\"{$itemData['url']}\">{$itemData['title']}{$childrenCountOutput}</a>" . PHP_EOL;

        return $result;
    }
}
