<?php

namespace App\Services\Normalizer;

use App\Entity\Airport;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class AirportSerializer implements ContextAwareNormalizerInterface {

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof Airport;
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        return array(
            'id' => $object->id,
            'code' => $object->code,
            'name' => $object->name
        );
    }
}