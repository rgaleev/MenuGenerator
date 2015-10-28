<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 28/10/15
 * Time: 22:29
 */

namespace Menu\Data;

/**
 * Class representing menu item
 *
 * @package Menu
 *
 * @property string         title
 * @property string         url
 * @property int            level
 * @property int            childrenCount
 * @property ItemCollection children
 */
class Item
{
    private $title;

    private $url;

    private $level;

    private $children;

    /**
     * @param array $itemData
     * @param int   $level
     */
    public function __construct(array $itemData, $level)
    {
        $this->title = $itemData['title'];
        $this->url   = $itemData['url'];
        $this->level = $level;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function __isset($name)
    {
        switch ($name) {
            case 'title':
            case 'url':
            case 'level':
            case 'children':
                return true;
                break;
            default:
                return false;
        }
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        switch ($name) {
            case 'title':
            case 'url':
            case 'level':
            case 'children':
                return $this->{$name};
                break;
            case 'childrenCount':
                return $this->getChildrenCount();
            default:
                return null;
        }
    }

    /**
     * @return int
     */
    private function getChildrenCount()
    {
        if (null === $this->children) {
            return 0;
        }

        return count($this->children);
    }

    /**
     * @param ItemCollection $children
     */
    public function setChildren(ItemCollection $children)
    {
        $this->children = $children;
    }
}
