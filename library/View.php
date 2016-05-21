<?php
namespace Diwanee\Library;
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 12:50 PM
 */
class View
{
    public $content;


    /**
     * Render view file
     *
     * @param $templateFile
     * @param array $vars
     * @return string
     */
    public function render($templateFile, array $vars = array())
    {

        ob_start();
        $this->load_template('app/view/'.$templateFile.'.php', $vars);

        $this->content = ob_get_contents();

        ob_end_flush();
         return   $this->content;
       }

    /**
     * Load template
     *
     * @param $name
     * @param $vars
     */
    function load_template($name, $vars)
    {
        extract($vars);
        include $name;
    }
}