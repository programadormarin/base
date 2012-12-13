<?php
namespace hmarinjr\BaseProject\Application\View\Pages;

use \hmarinjr\BaseProject\Application\View\Main;
use \Lcobucci\DisplayObjects\Core\UIComponent;

class Index extends UIComponent
{
    public function __construct()
    {
        Main::appendScript('http://widgets.twimg.com/j/2/widget.js');
        Main::appendScript($this->getBaseUrl() . '/js/twitter.box.js');
    }
}