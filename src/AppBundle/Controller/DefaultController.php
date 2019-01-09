<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Afdeling;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $afdeling = $this->getDoctrine()->getManager()->getRepository(Afdeling::class)->findAll();
        return $this->render("default/index.html.twig", [
            'afdeling' => $afdeling
        ]);
    }

    /**
     *  @Route("/create", name="create")
     */

     public function createAction()
     {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new User();
        $product->setUsername('thetimonator');
        $product->setPassword('twat');
        $product->setNaam('Timo');
        $product->setSalaris(15.50);
        $product->setRoles("ROLE_USER");

        $entityManager->persist($product);

        $entityManager->flush();

        return new Response('Saved new user with id '.$product->getId());
     }

     /**
      *  @Route("/update/{userID}", name="update")
      */

      public function updateAction($userID)
      {
          $entityManager = $this->getDoctrine()->getManager();
          $user = $entityManager->getRepository(User::class)->find($userID);

          if (!$user) {
              throw $this->createNotFoundException(
                  'No user found for id '.$userID
              );
          }

          $afdeling = $entityManager->getRepository(Afdeling::class)->findOneBy(
              array('naam' => 'Personeel')
          );

          $user->setAfdeling($afdeling);
          $entityManager->flush();

          return $this->redirectToRoute('homepage');


      }
}
