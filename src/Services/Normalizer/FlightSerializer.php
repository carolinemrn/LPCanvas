<?php


namespace App\Services\Normalizer;


use App\Entity\Flight;
use Symfony\Component\Serializer\Exception\CircularReferenceException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\LogicException;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class FlightSerializer implements ContextAwareNormalizerInterface
{

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof Flight;
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        return array(
            'id' => $object->id,
            'departureDatetime' => $object->departureDatetime,
            'arrivalDeparture' => $object->arrivalDeparture,
            'arrivalAirport' => $object->arrivalAirport,
            'departureAirport' => $object->departureAirport,
            'mainPilot' => $object->mainPilot
        );
    }
}