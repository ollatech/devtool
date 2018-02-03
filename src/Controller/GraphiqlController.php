<?php

namespace Olla\Devtool\Controller;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment as TwigEnvironment;

final class GraphiqlController
{
    /**
     * @var TwigEnvironment
     */
    private $twig;

    public function __construct() {
        $this->twig = $twig;
    }

    public function indexAction($schemaName = null)
    {
        return Response::create($this->twig->render($this->viewConfig->getTemplate(),
            [
                'endpoint' => $endpoint,
                'versions' => [
                    'graphiql' => $this->viewConfig->getJavaScriptLibraries()->getGraphiQLVersion(),
                    'react' => $this->viewConfig->getJavaScriptLibraries()->getReactVersion(),
                    'fetch' => $this->viewConfig->getJavaScriptLibraries()->getFetchVersion(),
                ],
            ]
        ));
    }
}