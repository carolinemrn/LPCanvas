<?php


namespace App\Controller;

use App\Entity\Plane;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PlaneController extends AbstractController
{
    public function planeList() {
        $planes = $this->getDoctrine()->getRepository(Plane::class)->findAll();
        return $this->json($planes);
    }

    public function getPlane(Plane $id) {
        $plane = $this->getDoctrine()->getRepository(Plane::class)->find($id);
        if (is_null($plane)) {
            return $this->json('not found', Response::HTTP_NOT_FOUND);
        }
        return $this->json($plane);
    }

    public function deletePlane(Plane $id) {
        $plane = $this->getDoctrine()->getRepository(Plane::class)->find($id);
        if (is_null($plane)) {
            return $this->json('not found', Response::HTTP_NOT_FOUND);
        }
        $this->getDoctrine()->getManager()->remove($plane);
        $this->getDoctrine()->getManager()->flush();
        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    public function addPlane(Request $request) {
        $plane = new Plane();
        $code = $request->query->get('code');
        $name = $request->query->get('name');
        $manufacturer = $request->query->get('manufacturer');
        $model = $request->query->get('model');
        $plane->setCode($code);
        $plane->setModel($model);
        $plane->setName($name);
        $plane->setManufacturer($manufacturer);
        $this->getDoctrine()->getManager()->persist($plane);
        $this->getDoctrine()->getManager()->flush();
        return $this->json($plane, Response::HTTP_CREATED);
    }

    public function editPlane(int $id, Request $request) {
        $plane = $this->getDoctrine()->getRepository(Plane::class)->find($id);
        if (is_null($plane)) {
            return $this->json('not found', Response::HTTP_NOT_FOUND);
        }
        $code = $request->query->get('code');
        $name = $request->query->get('name');
        $manufacturer = $request->query->get('manufacturer');
        $model = $request->query->get('model');
        if (isset($code)) $plane->setCode();
        if (isset($model)) $plane->setModel();
        if (isset($name)) $plane->setName();
        if (isset($manufacturer)) $plane->setManufacturer();
        $this->getDoctrine()->getManager()->persist($plane);
        $this->getDoctrine()->getManager()->flush();
        return $this->json($plane);
    }
}