<?php
/**
 * User: Roman Galeev <roman.galeev@lazada.com>
 * Date: 23/10/15
 * Time: 21:58
 */
namespace {
    require_once 'Helpers/TextHelper.php';
    require_once 'Menu/InputGenerator.php';
}

namespace Menu {
    $inputGenerator = new InputGenerator();
    $input          = $inputGenerator->generate();
    echo '<pre>';
    \var_export($input);

    $input = [
        0 =>
            [
                'title'    => 'Parent 1',
                'url'      => 'parent-1',
                'children' =>
                    [
                        0 =>
                            [
                                'title'    => 'Level 2 child 1',
                                'url'      => 'level-2-child-1',
                                'children' =>
                                    [
                                        0 =>
                                            [
                                                'title'    => 'Level 3 child 1',
                                                'url'      => 'level-3-child-1',
                                                'children' =>
                                                    [
                                                        0 =>
                                                            [
                                                                'title' => 'Level 4 child 1',
                                                                'url'   => 'level-4-child-1',
                                                            ],
                                                        1 =>
                                                            [
                                                                'title' => 'Level 4 child 2',
                                                                'url'   => 'level-4-child-2',
                                                            ],
                                                    ],
                                            ],
                                        1 =>
                                            [
                                                'title' => 'Level 3 child 2',
                                                'url'   => 'level-3-child-2',
                                            ],
                                        2 =>
                                            [
                                                'title' => 'Level 3 child 3',
                                                'url'   => 'level-3-child-3',
                                            ],
                                        3 =>
                                            [
                                                'title'    => 'Level 3 child 4',
                                                'url'      => 'level-3-child-4',
                                                'children' =>
                                                    [
                                                        0 =>
                                                            [
                                                                'title'    => 'Level 4 child 1',
                                                                'url'      => 'level-4-child-1',
                                                                'children' =>
                                                                    [
                                                                        0 =>
                                                                            [
                                                                                'title' => 'Level 5 child 1',
                                                                                'url'   => 'level-5-child-1',
                                                                            ],
                                                                        1 =>
                                                                            [
                                                                                'title'    => 'Level 5 child 2',
                                                                                'url'      => 'level-5-child-2',
                                                                                'children' =>
                                                                                    [
                                                                                        0 =>
                                                                                            [
                                                                                                'title' => 'Level 6 child 1',
                                                                                                'url'   => 'level-6-child-1',
                                                                                            ],
                                                                                        1 =>
                                                                                            [
                                                                                                'title' => 'Level 6 child 2',
                                                                                                'url'   => 'level-6-child-2',
                                                                                            ],
                                                                                    ],
                                                                            ],
                                                                        2 =>
                                                                            [
                                                                                'title' => 'Level 5 child 3',
                                                                                'url'   => 'level-5-child-3',
                                                                            ],
                                                                    ],
                                                            ],
                                                    ],
                                            ],
                                        4 =>
                                            [
                                                'title'    => 'Level 3 child 5',
                                                'url'      => 'level-3-child-5',
                                                'children' =>
                                                    [
                                                        0 =>
                                                            [
                                                                'title' => 'Level 4 child 1',
                                                                'url'   => 'level-4-child-1',
                                                            ],
                                                        1 =>
                                                            [
                                                                'title' => 'Level 4 child 2',
                                                                'url'   => 'level-4-child-2',
                                                            ],
                                                        2 =>
                                                            [
                                                                'title'    => 'Level 4 child 3',
                                                                'url'      => 'level-4-child-3',
                                                                'children' =>
                                                                    [
                                                                        0 =>
                                                                            [
                                                                                'title' => 'Level 5 child 1',
                                                                                'url'   => 'level-5-child-1',
                                                                            ],
                                                                    ],
                                                            ],
                                                    ],
                                            ],
                                    ],
                            ],
                        1 =>
                            [
                                'title'    => 'Level 2 child 2',
                                'url'      => 'level-2-child-2',
                                'children' =>
                                    [
                                        0 =>
                                            [
                                                'title' => 'Level 3 child 1',
                                                'url'   => 'level-3-child-1',
                                            ],
                                        1 =>
                                            [
                                                'title' => 'Level 3 child 2',
                                                'url'   => 'level-3-child-2',
                                            ],
                                    ],
                            ],
                        2 =>
                            [
                                'title'    => 'Level 2 child 3',
                                'url'      => 'level-2-child-3',
                                'children' =>
                                    [
                                        0 =>
                                            [
                                                'title'    => 'Level 3 child 1',
                                                'url'      => 'level-3-child-1',
                                                'children' =>
                                                    [
                                                        0 =>
                                                            [
                                                                'title' => 'Level 4 child 1',
                                                                'url'   => 'level-4-child-1',
                                                            ],
                                                        1 =>
                                                            [
                                                                'title'    => 'Level 4 child 2',
                                                                'url'      => 'level-4-child-2',
                                                                'children' =>
                                                                    [
                                                                        0 =>
                                                                            [
                                                                                'title' => 'Level 5 child 1',
                                                                                'url'   => 'level-5-child-1',
                                                                            ],
                                                                        1 =>
                                                                            [
                                                                                'title'    => 'Level 5 child 2',
                                                                                'url'      => 'level-5-child-2',
                                                                                'children' =>
                                                                                    [
                                                                                        0 =>
                                                                                            [
                                                                                                'title' => 'Level 6 child 1',
                                                                                                'url'   => 'level-6-child-1',
                                                                                            ],
                                                                                    ],
                                                                            ],
                                                                        2 =>
                                                                            [
                                                                                'title' => 'Level 5 child 3',
                                                                                'url'   => 'level-5-child-3',
                                                                            ],
                                                                    ],
                                                            ],
                                                        2 =>
                                                            [
                                                                'title' => 'Level 4 child 3',
                                                                'url'   => 'level-4-child-3',
                                                            ],
                                                        3 =>
                                                            [
                                                                'title' => 'Level 4 child 4',
                                                                'url'   => 'level-4-child-4',
                                                            ],
                                                    ],
                                            ],
                                        1 =>
                                            [
                                                'title' => 'Level 3 child 2',
                                                'url'   => 'level-3-child-2',
                                            ],
                                        2 =>
                                            [
                                                'title' => 'Level 3 child 3',
                                                'url'   => 'level-3-child-3',
                                            ],
                                    ],
                            ],
                    ],
            ],
        1 =>
            [
                'title'    => 'Parent 2',
                'url'      => 'parent-2',
                'children' =>
                    [
                        0 =>
                            [
                                'title' => 'Level 2 child 1',
                                'url'   => 'level-2-child-1',
                            ],
                        1 =>
                            [
                                'title' => 'Level 2 child 2',
                                'url'   => 'level-2-child-2',
                            ],
                        2 =>
                            [
                                'title' => 'Level 2 child 3',
                                'url'   => 'level-2-child-3',
                            ],
                        3 =>
                            [
                                'title' => 'Level 2 child 4',
                                'url'   => 'level-2-child-4',
                            ],
                    ],
            ],
        2 =>
            [
                'title'    => 'Parent 3',
                'url'      => 'parent-3',
                'children' =>
                    [
                        0 =>
                            [
                                'title'    => 'Level 2 child 1',
                                'url'      => 'level-2-child-1',
                                'children' =>
                                    [
                                        0 =>
                                            [
                                                'title' => 'Level 3 child 1',
                                                'url'   => 'level-3-child-1',
                                            ],
                                        1 =>
                                            [
                                                'title'    => 'Level 3 child 2',
                                                'url'      => 'level-3-child-2',
                                                'children' =>
                                                    [
                                                        0 =>
                                                            [
                                                                'title'    => 'Level 4 child 1',
                                                                'url'      => 'level-4-child-1',
                                                                'children' =>
                                                                    [
                                                                        0 =>
                                                                            [
                                                                                'title' => 'Level 5 child 1',
                                                                                'url'   => 'level-5-child-1',
                                                                            ],
                                                                        1 =>
                                                                            [
                                                                                'title' => 'Level 5 child 2',
                                                                                'url'   => 'level-5-child-2',
                                                                            ],
                                                                    ],
                                                            ],
                                                    ],
                                            ],
                                    ],
                            ],
                        1 =>
                            [
                                'title' => 'Level 2 child 2',
                                'url'   => 'level-2-child-2',
                            ],
                    ],
            ],
        3 =>
            [
                'title'    => 'Parent 4',
                'url'      => 'parent-4',
                'children' =>
                    [
                        0 =>
                            [
                                'title' => 'Level 2 child 1',
                                'url'   => 'level-2-child-1',
                            ],
                        1 =>
                            [
                                'title' => 'Level 2 child 2',
                                'url'   => 'level-2-child-2',
                            ],
                    ],
            ],
    ];
}
