<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    protected $repository;
    private $manager;

    public function __construct(
        EntityManagerInterface $manager, PropertyRepository $propertyRepository)
    {
        $this->repository = $propertyRepository;
    }

    /**
     * @Route("/property", name="property.index")
     */
    public function index()
    {
//        $manager = $this->getDoctrine()->getManager();
        $property = $this->repository->findAllVisible();
        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties',
        ]);
    }

    /**
     * @Route("/property/{id}-{slug}", name="property.show")
     * @param $slug
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($slug, $id)
    {
        $property = $this->repository->find($id);

        return $this->render('property/show.html.twig', [
            'property' => $property,
        ]);
    }
}
