<?php

namespace Framework\Controllers;

use Framework\Container;
use Framework\View\SmartyFactory;

abstract class Controller
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function view(string $name, array $data = []): string
    {
        $smarty = SmartyFactory::create();
        $smarty->assign($data);

        $template = str_replace('.', '/', $name) . '.tpl';

        return $smarty->fetch($template);
    }
}
