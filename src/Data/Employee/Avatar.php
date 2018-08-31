<?php

namespace Czim\Simplicate\Data\Employee;

use Czim\Simplicate\Data\AbstractDataObject;
use Illuminate\Support\Arr;

class Avatar extends AbstractDataObject
{

    /**
     * @var string|null
     */
    protected $urlSmall;

    /**
     * @var string|null
     */
    protected $urlLarge;

    /**
     * @var string
     */
    protected $initials;

    /**
     * @var string
     */
    protected $color;


    public function __construct(array $data)
    {
        $this->urlSmall = Arr::get($data, 'url_small');
        $this->urlLarge = Arr::get($data, 'url_large');
        $this->initials = Arr::get($data, 'initials');
        $this->color    = Arr::get($data, 'color');
    }


    public function getUrlSmall(): ?string
    {
        return $this->urlSmall;
    }

    public function getUrlLarge(): ?string
    {
        return $this->urlLarge;
    }

    public function getInitials(): string
    {
        return $this->initials;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function toArray(): array
    {
        return [
            'url_small' => $this->getUrlSmall(),
            'url_large' => $this->getUrlLarge(),
            'initials'  => $this->getInitials(),
            'color'     => $this->getColor(),
        ];
    }

}
