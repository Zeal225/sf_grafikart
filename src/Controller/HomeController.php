<?php


namespace App\Controller;


use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController extends AbstractController
{
    /**
     * @var Environment
     */
    private $twig;
    protected $propertyRepo;

    public function __construct(Environment $twig, PropertyRepository $propertyRepo)
    {
        $this->twig = $twig;
        $this->propertyRepo = $propertyRepo;
    }

    public function index()
    {
//        $em = $this->getDoctrine()->getManager()->getRepository(PropertyRepository::class);
        $latest = $this->propertyRepo->findLatest();
        return $this->render('/pages/home.html.twig', [
            'properties'=>$latest
        ]);
    }
}
