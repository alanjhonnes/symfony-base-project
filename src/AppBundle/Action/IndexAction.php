<?php
/**
 * Created by PhpStorm.
 * User: alanjhonnes
 * Date: 3/18/16
 * Time: 12:37 AM
 */

namespace AppBundle\Action;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Twig_Environment;

class IndexAction
{
    /**
     * @var Twig_Environment
     */
    private $twig;
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * IndexAction constructor.
     * @param Twig_Environment $twig
     * @param SerializerInterface $serializer
     */
    public function __construct(\Twig_Environment $twig, SerializerInterface $serializer)
    {
        $this->twig = $twig;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/action", name="action.index")
     */
    function __invoke()
    {
        return new Response($this->serializer->serialize(['user' => ['id' => 2, 'name' => 'alan']], 'json'));
    }


}