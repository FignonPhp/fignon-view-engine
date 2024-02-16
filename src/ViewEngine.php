<?php

namespace Fignon\Extra;

/**
 * View Engine Interface.
 *
 * All view engine to be plugable to Fignon Framework must wrapped by a class implementing
 * this interface.
 *
 * So, for new view engine, you just need to implement this interface and register it
 * and register it in the app.php file of your project.
 *
 * Fignon need just the init and render functions to work.
 */
interface ViewEngine
{
    /**
     * This function is used to initialize the view engine.
     *
     * @param string $templatePath The path to the templates
     * @param string $templateCachedPath The path to the cached templates
     * @param array $options Other non common to all view engine options when to initialize
     * @throws \Fignon\Error\TunnelError If the template path or cached path is not set
     * @return void
     */
    public function init(string $templatePath = null, string $templateCachedPath = null, array $options = []): ViewEngine;


    /**
     * This function is used to render the html(or whatever your view engine send) which will be used as the response body.
     *
     * @param string $viewPath The path to the view file
     * @param array $locals The variables to be used in the view. This is an associative array
     * @param array $options Other non common to all view engine options when to render
     * Note: All variables set into $app->locals will be available in the view
     * @throws \Fignon\Error\TunnelError If $viewPath is empty or $locals is not an array
     * @return void
     */
    public function render(string $viewPath = '', $locals = [], array $options = []): ?string;
}
