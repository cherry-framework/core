<?php
/**
 * The file contains ControllerTrait.
 *
 * PHP version 5
 *
 * @category Library
 * @package  Cherry
 * @author   Temuri Takalandze <takalandzet@gmail.com>
 * @license  https://github.com/ABGEO07/cherry-core/blob/master/LICENSE MIT
 * @link     https://github.com/ABGEO07/cherry-core
 */

namespace Cherry\Controller;

use Cherry\HttpUtils\Response;
use Cherry\Templating\Templater;

/**
 * Trait for Cherry Controllers.
 *
 * @category Library
 * @package  Cherry
 * @author   Temuri Takalandze <takalandzet@gmail.com>
 * @license  https://github.com/ABGEO07/cherry-core/blob/master/LICENSE MIT
 * @link     https://github.com/ABGEO07/cherry-core
 */
trait ControllerTrait
{
    /**
     * Render the template.
     *
     * @param string $template Template filename for rendering
     * @param array  $args     Arguments for passing in template
     *
     * @return Response
     */
    protected function render($template, $args = [])
    {
        $te = new Templater(TEMPLATES_PATH);

        $content = $te->render($template, $args);

        echo $content;

        return $content;
    }
}