<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 25/10/15
 * Time: 02:18
 */

namespace tests\Menu;

use \Menu\HtmlRenderer;
use \Menu\MenuGenerator;

/**
 * Class for testing MenuGenerator
 *
 * @package tests\Menu
 */
class MenuGeneratorIntegrationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array  $input
     * @param string $expectedResult
     *
     * @dataProvider provideDateForGenerateFromInput
     */
    public function testGenerateFromInputWithHtmlRenderer(array $input, $expectedResult)
    {
        $menuGenerator = new MenuGenerator(new HtmlRenderer());
        $result        = $menuGenerator->generateFromInput($input);
        static::assertEquals($expectedResult, $result);
    }

    /**
     * Data provider
     *
     * @return array
     */
    public function provideDateForGenerateFromInput()
    {
        return [
            'one parent'                                    => [
                'input'          => [
                    0 =>
                        [
                            'title' => 'Parent 1',
                            'url'   => 'parent-1',
                        ]
                ],
                'expectedResult' => <<<'RESULT'
<ul>
    <li>
        <a href="parent-1">Parent 1</a>
    </li>
</ul>

RESULT
            ],
            'two parents'                                   => [
                'input'          => [
                    0 =>
                        [
                            'title' => 'Parent 1',
                            'url'   => 'parent-1',
                        ],
                    1 =>
                        [
                            'title' => 'Parent 2',
                            'url'   => 'parent-2',
                        ],
                ],
                'expectedResult' => <<<'RESULT'
<ul>
    <li>
        <a href="parent-1">Parent 1</a>
    </li>
    <li>
        <a href="parent-2">Parent 2</a>
    </li>
</ul>

RESULT
            ],
            'parent with one child'                         => [
                'input'          => [
                    0 =>
                        [
                            'title'    => 'Parent 1',
                            'url'      => 'parent-1',
                            'children' => [
                                0 => [
                                    'title' => 'Level 1 child 1',
                                    'url'   => 'level-1-child-1',
                                ],
                            ]
                        ]
                ],
                'expectedResult' => <<<'RESULT'
<ul>
    <li>
        <a href="parent-1">Parent 1 (1)</a>
        <ul>
            <li>
                <a href="level-1-child-1">Level 1 child 1</a>
            </li>
        </ul>
    </li>
</ul>

RESULT
            ],
            'two parents with children in different levels' => [
                'input'          => [
                    0 =>
                        [
                            'title'    => 'Parent 1',
                            'url'      => 'parent-1',
                            'children' => [
                                0 => [
                                    'title' => 'Level 1 child 1',
                                    'url'   => 'level-1-child-1',
                                ],
                                1 => [
                                    'title'    => 'Level 1 child 2',
                                    'url'      => 'level-1-child-2',
                                    'children' => [
                                        0 => [
                                            'title' => 'Level 2 child 1',
                                            'url'   => 'level-2-child-1',
                                        ],
                                        1 => [
                                            'title' => 'Level 2 child 2',
                                            'url'   => 'level-2-child-2',
                                        ],
                                        2 => [
                                            'title'    => 'Level 2 child 3',
                                            'url'      => 'level-2-child-3',
                                            'children' => [
                                                0 => [
                                                    'title' => 'Level 3 child 1',
                                                    'url'   => 'level-3-child-1',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    1 =>
                        [
                            'title'    => 'Parent 2',
                            'url'      => 'parent-2',
                            'children' => [
                                0 => [
                                    'title' => 'Level 1 child 1',
                                    'url'   => 'level-1-child-1',
                                ],
                                1 => [
                                    'title' => 'Level 1 child 2',
                                    'url'   => 'level-1-child-2',
                                ],
                                2 => [
                                    'title' => 'Level 1 child 3',
                                    'url'   => 'level-1-child-3',
                                ],
                            ],
                        ],
                ],
                'expectedResult' => <<<'RESULT'
<ul>
    <li>
        <a href="parent-1">Parent 1 (2)</a>
        <ul>
            <li>
                <a href="level-1-child-1">Level 1 child 1</a>
            </li>
            <li>
                <a href="level-1-child-2">Level 1 child 2 (3)</a>
                <ul>
                    <li>
                        <a href="level-2-child-1">Level 2 child 1</a>
                    </li>
                    <li>
                        <a href="level-2-child-2">Level 2 child 2</a>
                    </li>
                    <li>
                        <a href="level-2-child-3">Level 2 child 3 (1)</a>
                        <ul>
                            <li>
                                <a href="level-3-child-1">Level 3 child 1</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="parent-2">Parent 2 (3)</a>
        <ul>
            <li>
                <a href="level-1-child-1">Level 1 child 1</a>
            </li>
            <li>
                <a href="level-1-child-2">Level 1 child 2</a>
            </li>
            <li>
                <a href="level-1-child-3">Level 1 child 3</a>
            </li>
        </ul>
    </li>
</ul>

RESULT
            ],
        ];
    }
}
