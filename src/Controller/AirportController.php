<?php


namespace App\Controller;


use App\Entity\Airport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AirportController extends AbstractController
{
    public function airportList() {
        $airports = $this->getDoctrine()->getRepository(Airport::class)->findAll();
        return $this->json($airports);
    }

    public function getAirport(Airport $id) {
        $airport = $this->getDoctrine()->getRepository(Airport::class)->find($id);
        return $this->json($airport);
    }

    public function deleteAirport(Airport $id) {
        $airport = $this->getDoctrine()->getRepository(Airport::class)->find($id);
        $this->getDoctrine()->getManager()->remove($airport);
        $this->getDoctrine()->getManager()->flush();
        return $this->json(null);
    }


}