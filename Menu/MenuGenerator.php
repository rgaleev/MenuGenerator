<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 25/10/15
 * Time: 02:02
 */

namespace Menu;

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
     * @param array $input
     *
     * @return string
     */
    public function generateFromInput(array $input)
    {
        return $this->renderer->renderMenuLevel($input, 0);
    }
}
