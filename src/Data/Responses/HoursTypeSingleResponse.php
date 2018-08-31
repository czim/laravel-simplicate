<?php

namespace Czim\Simplicate\Data\Responses;

use Czim\Simplicate\Data\Hours\Type;

/**
 * Class HoursTypeSingleResponse
 *
 * @method Type getData()
 */
class HoursTypeSingleResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Type($data);
    }

}
