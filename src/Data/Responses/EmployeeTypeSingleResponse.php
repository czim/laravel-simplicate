<?php

namespace Czim\Simplicate\Data\Responses;

use Czim\Simplicate\Data\Employee\Type;

/**
 * Class EmployeeTypeSingleResponse
 *
 * @method Type getData()
 */
class EmployeeTypeSingleResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Type($data);
    }

}
