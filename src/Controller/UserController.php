<?php


namespace App\Controller;

use App\Entity\User;
use App\Services\Normalizer\UserSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    function user($firstName, $lastName) {
        $user = new User(1, $firstName, $lastName, new \DateTime('1997-12-09'), new \DateTime());

        return $this->json($user);
    }

    function list() {
        $list = array();
        for ($i = 0; $i < 10; ++$i){
            array_push($list,  new User($i, 'papa', 'papa', new \DateTime('1997-12-09'), new \DateTime()));
        }
        return $this->json($list);
    }

    
}