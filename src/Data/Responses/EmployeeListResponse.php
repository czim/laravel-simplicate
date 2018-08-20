<?php

namespace Czim\Simplicate\Data\Responses;

use Czim\Simplicate\Data\Employee\Employee;
use Illuminate\Support\Collection;

/**
 * Class EmployeeListResponse
 *
 * @method Collection|Employee[] getData()
 */
class EmployeeListResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new Employee($item);
                },
                $data
            )
        );
    }

}
