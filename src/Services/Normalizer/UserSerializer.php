<?php


namespace App\Services\Normalizer;


use App\Entity\User;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class UserSerializer implements ContextAwareNormalizerInterface
{

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof User;
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        return array(
            'id' => $object->id,
            'firstName' => $object->firstName,
            'lastName' => $object->lastName,
            'birthDate' => $object->birthDate->format('Y-m-d')
        );
    }
}