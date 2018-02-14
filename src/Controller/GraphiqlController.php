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

    public function __construct(TwigEnvironment $twig) {
        $this->twig = $twig;
    }

    public function indexAction($schemaName = null)
    {
        return Response::create($this->twig->render('@olladevtool/graphiql.html.twig',
            [
                'endpoint' => '',
                'versions' => [
                    'graphiql' => ''
                ],
            ]
        ));
    }
}