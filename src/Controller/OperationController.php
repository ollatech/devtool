<?php

namespace Olla\Devtool\Controller;

use Olla\Prisma\Metadata;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Twig\Environment as TwigEnvironment;

final class OperationController
{
    /**
     * @var TwigEnvironment
     */
    private $twig;

    private $metadata;

    public function __construct(TwigEnvironment $twig, Metadata $metadata) {
        $this->twig = $twig;
        $this->metadata = $metadata;
    }

    public function indexAction($schemaName = null)
    {
        $resource = $this->metadata->operations();
        return new JsonResponse(json_encode($resource), Response::HTTP_CREATED, $headers = array("Content-Type" => "application/json"), true);
    }
}