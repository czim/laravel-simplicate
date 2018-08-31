<?php

namespace Czim\Simplicate\Data\Employee;

use Czim\Simplicate\Data\AbstractDataObject;
use Illuminate\Support\Arr;

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
        $this->id          = Arr::get($data, 'id');
        $this->country     = Arr::get($data, 'country');
        $this->type        = Arr::get($data, 'type');
        $this->lineOne     = Arr::get($data, 'line_1');
        $this->lineTwo     = Arr::get($data, 'line_2');
        $this->postalCode  = Arr::get($data, 'postal_code');
        $this->locality    = Arr::get($data, 'locality');
        $this->countryCode = Arr::get($data, 'country_code');
        $this->countryId   = Arr::get($data, 'country_id');
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
