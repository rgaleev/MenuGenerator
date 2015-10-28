<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 28/10/15
 * Time: 22:56
 */

namespace Menu\Data;

/**
 * Class representing collection of menu items
 *
 * @package Menu\Data
 *
 * @property int level
 */
class ItemCollection implements \ArrayAccess, \Countable, \Iterator
{
    /* @var ItemCollection */
    private $collection;

    private $level;

    public function __construct($level)
    {
        $this->level      = $level;
        $this->collection = [];
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function __isset($name)
    {
        return 'level' === $name;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return ('level' === $name) ? $this->{$name} : null;
    }

    /**
     * Whether a offset exists
     *
     * @param mixed $offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->collection);
    }

    /**
     * Offset to retrieve
     *
     * @param mixed $offset
     *
     * @return Item
     */
    public function offsetGet($offset)
    {
        return $this->collection[$offset];
    }

    /**
     * Offset to set
     *
     * @param mixed $offset
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (!($value instanceof Item)) {
            throw new \InvalidArgumentException('This collection should contain only Item elements');
        }
        if (null === $offset) {
            $this->collection[] = $value;
        } else {
            $this->collection[$offset] = $value;
        }
    }

    /**
     * Offset to unset
     *
     * @param mixed $offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->collection[$offset]);
    }

    /**
     * Count elements of an object
     *
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return count($this->collection);
    }

    /**
     * Return the current element
     *
     * @return Item
     */
    public function current()
    {
        return current($this->collection);
    }

    /**
     * Move forward to next element
     *
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        next($this->collection);
    }

    /**
     * Return the key of the current element
     *
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        key($this->collection);
    }

    /**
     * Checks if current position is valid
     *
     * @return boolean The return value will be casted to boolean and then evaluated.
     */
    public function valid()
    {
        return false !== current($this->collection);
    }

    /**
     * Rewind the Iterator to the first element
     *
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        reset($this->collection);
    }
}
