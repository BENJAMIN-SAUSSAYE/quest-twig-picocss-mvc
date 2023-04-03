<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class BaseController extends AbstractController
{
    public FilesystemLoader $loader;
    public Environment $twig;
    public function __construct()
    {
        $this->loader = new FilesystemLoader(ROOT . '/src/Views');
        $this->twig = new Environment($this->loader, ['debug' => true]);
        $this->twig->addExtension(new DebugExtension());
    }

    public function render(string $template, array $context = [])
    {
        if ($this->twig === null) {
            throw new \Exception('You cannot use the render method if the twig bundle is not available');
        }
        return $this->twig->render($template, $context);
    }
}
