<?php

namespace Olla\Devtool\Controller;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment as TwigEnvironment;

final class SwaggerController
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
        $swagger_data = [
            'title' => 'swagger',
            'description' => 'Swagger documentation',
            'formats' => ['json'],
        ];
        $swagger_data['url'] = 'api/v1';
        $swagger_data['specs'] = [
            'api/v1' => [
                'get' => [
                    
                ]
            ]
        ];
        return Response::create($this->twig->render('@olladevtool/swagger.html.twig',
            [
                'swagger_data' => $swagger_data
            ]
        ));
    }
}