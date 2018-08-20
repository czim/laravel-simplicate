<?php

namespace Czim\Simplicate\Data\Employee;

use Czim\Simplicate\Data\AbstractDataObject;

class Address extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $country;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string|null
     */
    protected $lineOne;

    /**
     * @var string|null
     */
    protected $lineTwo;

    /**
     * @var string|null
     */
    protected $postalCode;

    /**
     * @var string|null
     */
    protected $locality;

    /**
     * @var string|null
     */
    protected $countryCode;

    /**
     * @var string|null
     */
    protected $countryId;


    public function __construct(array $data)
    {
        $this->id          = array_get($data, 'id');
        $this->country     = array_get($data, 'country');
        $this->type        = array_get($data, 'type');
        $this->lineOne     = array_get($data, 'line_1');
        $this->lineTwo     = array_get($data, 'line_2');
        $this->postalCode  = array_get($data, 'postal_code');
        $this->locality    = array_get($data, 'locality');
        $this->countryCode = array_get($data, 'country_code');
        $this->countryId   = array_get($data, 'country_id');
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getLineOne(): ?string
    {
        return $this->lineOne;
    }

    public function getLineTwo(): ?string
    {
        return $this->lineTwo;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function getCountryId(): ?string
    {
        return $this->countryId;
    }

    public function toArray(): array
    {
        return [
            'id'           => $this->getId(),
            'country'      => $this->getCountry(),
            'type'         => $this->getType(),
            'line_1'       => $this->getLineOne(),
            'line_2'       => $this->getLineTwo(),
            'postal_code'  => $this->getPostalCode(),
            'locality'     => $this->getLocality(),
            'country_code' => $this->getCountryCode(),
            'country_id'   => $this->getCountryId(),
        ];
    }

}
