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

    private function renderItem($level, $url, $title, $childrenCount)
    {
        $childrenCountOutput = '';
        if ($childrenCount > 0) {
            $childrenCountOutput = " ($childrenCount)";
        }
        $result = $this->renderIndent($level) . "<a href=\"{$url}\">{$title}{$childrenCountOutput}</a>" . PHP_EOL;

        return $result;
    }

    /**
     * @param array $menuLevel
     * @param int $level
     *
     * @return string
     */
    public function renderMenuLevel(array $menuLevel, $level)
    {
        $result  = $this->renderLevelBegin($level);

        foreach ($menuLevel as $menuItem) {
            $result .= $this->renderMenuItem($menuItem, $level + 1);
        }

        $result .= $this->renderLevelEnd($level);

        return $result;
    }

    /**
     * @param array $menuItem
     * @param int $level
     *
     * @return string
     */
    public function renderMenuItem(array $menuItem, $level)
    {
        $result  = $this->renderItemBegin($level);
        $result .= $this->renderItem(
            $level + 1,
            $menuItem['url'],
            $menuItem['title'],
            isset($menuItem['children']) ? count($menuItem['children']) : 0
        );
        if (isset($menuItem['children'])) {
            $result .= $this->renderMenuLevel($menuItem['children'], $level + 1);
        }
        $result .= $this->renderItemEnd($level);
        return $result;
    }

}
