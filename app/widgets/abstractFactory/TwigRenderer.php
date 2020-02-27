<?php
namespace app\widgets\abstractFactory;

/**
 * Отрисовщик шаблонов Twig.
 */
class TwigRenderer implements TemplateRenderer
{
    public function render(string $templateString, array $arguments = []): string
    {
       // Specify our Twig templates location
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/tpl');

        // Instantiate our Twig
        $twig = new \Twig\Environment($loader);

        // return $twig->render($templateString, $arguments);

        debug($templateString);
        
        // Render our view
        return $twig->render('index.html.twig', $arguments);
    }
}