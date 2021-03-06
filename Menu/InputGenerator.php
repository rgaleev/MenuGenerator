<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 23/10/15
 * Time: 23:26
 */

namespace Menu;

use Helpers\TextHelper;

class InputGenerator
{
    private static $config = [
        [
            [
                [
                  [],
                  [],
                ],
                [],
                [],
                [
                    [
                        [],
                        [
                            [],
                            [],
                        ],
                        [],
                    ],
                ],
                [
                    [],
                    [],
                    [
                        [],
                    ],
                ],
            ],
            [
                [],
                [],
            ],
            [
                [
                    [],
                    [
                        [],
                        [
                            [],
                        ],
                        [],
                    ],
                    [],
                    [],
                ],
                [],
                [],
            ],
        ],
        [
            [],
            [],
            [],
            [],
        ],
        [
            [
                [],
                [
                    [
                        [],
                        [],
                    ],
                ],
            ],
            [],
        ],
        [
            [],
            [],
        ],
    ];


    public function generate()
    {
        $num = 0;
        $result = [];

        foreach (self::$config as $item) {
            $result[] = $this->generateItem($item, 1, ++$num);
        }

        return $result;
    }

    private function generateItem(array $item, $level, $num)
    {
        $title = 1 === $level ? "Parent {$num}" : "Level {$level} child {$num}";
        $result = [
            'title' => $title,
            'url'   => TextHelper::urlFormat($title),
        ];
        if (0 !== count($item)) {
            $children = [];
            $cnt = 0;
            foreach ($item as $child) {
                $children[] = $this->generateItem($child, $level + 1, ++$cnt);
            }
            $result['children'] = $children;
        }

        return $result;
    }

}
