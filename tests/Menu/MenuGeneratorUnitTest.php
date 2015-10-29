<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 29/10/15
 * Time: 01:14
 */

namespace tests\Menu;

use \Menu\Data\Item;
use \Menu\Data\ItemCollection;
use \Menu\MenuGenerator;

/**
 * Class MenuGeneratorUnitTest
 *
 * @package tests\Menu
 */
class MenuGeneratorUnitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    private function invokeMethod(&$object, $methodName, array $parameters = [])
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method     = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    public function testRenderMenuItemWithoutChildren()
    {
        $renderer = $this->getMockBuilder('\Menu\HtmlRenderer')
                         ->setMethods(['renderMenuItem', 'wrapMenuItem'])->getMock();
        $renderer->expects(static::once())->method('renderMenuItem')->willReturn('Item');
        $renderer->expects(static::once())->method('wrapMenuItem')->willReturn('<b>Item</b>');

        $menuGenerator = new MenuGenerator($renderer);

        $item   = new Item(
            [
                'title' => 'Test title',
                'url'   => 'Test url',
            ],
            0
        );
        $result = $this->invokeMethod($menuGenerator, 'renderMenuItem', [$item]);
        static::assertEquals('<b>Item</b>', $result);
    }


    public function testRenderMenuItemWithChildren()
    {
        $renderer = $this->getMockBuilder('\Menu\HtmlRenderer')
                        ->getMock();
        $renderer->expects(static::exactly(2))->method('renderMenuItem')->willReturn('Item');
        $renderer->expects(static::exactly(2))->method('wrapMenuItem')->will(
            static::returnCallback(function ($data) {return '<b>' . $data . '</b>';})
        );
        $renderer->expects(static::once())->method('wrapMenuLevel')->will(
            static::returnCallback(function ($data) {return '<p>' . $data . '</p>';})
        );

        $menuGenerator = new MenuGenerator($renderer);

        $item       = new Item(
            [
                'title' => 'Test title',
                'url'   => 'Test url',
            ],
            0
        );
        $children   = new ItemCollection(1);
        $children[] = new Item(
            [
                'title' => 'Test title 2',
                'url'   => 'Test url 2',
            ],
            1
        );
        $item->setChildren($children);
        $result = $this->invokeMethod($menuGenerator, 'renderMenuItem', [$item]);
        static::assertEquals('<b>Item<p><b>Item</b></p></b>', $result);
    }
}
