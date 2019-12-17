<?php


namespace App\Controller;


use App\Entity\Pilot;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PilotController extends AbstractController
{
    public function pilotList() {
        $pilots = $this->getDoctrine()->getRepository(Pilot::class)->findAll();
        return $this->json($pilots);
    }

    public function getPilot(Pilot $id) {
        $pilot = $this->getDoctrine()->getRepository(Pilot::class)->find($id);
        return $this->json($pilot);
    }

    public function deletePilot(Pilot $id) {
        $pilot = $this->getDoctrine()->getRepository(Pilot::class)->find($id);
        $this->getDoctrine()->getManager()->remove($pilot);
        $this->getDoctrine()->getManager()->flush();
        return $this->json(null);
    }

}