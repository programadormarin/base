<?php
namespace hmarinjr\BaseProject\Application\Action;

use \Lcobucci\ActionMapper2\Routing\Annotation\Route;
use \Lcobucci\ActionMapper2\Routing\Controller;
use \hmarinjr\BaseProject\Application\View\Pages\Contact as ContactForm;
use \hmarinjr\BaseProject\Application\View\Main;

class Contact extends Controller
{
    /**
     * @Route("/", methods={"GET"})
     */
    public function displayForm()
    {
        return Main::create(new ContactForm(), $this->application);
    }
}