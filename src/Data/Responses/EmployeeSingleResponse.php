<?php

namespace Czim\Simplicate\Data\Responses;

use Czim\Simplicate\Data\Employee\Employee;

/**
 * Class EmployeeSingleResponse
 *
 * @method Employee() getData()
 */
class EmployeeSingleResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Employee($data);
    }

}
