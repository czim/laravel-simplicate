<?php

namespace Czim\Simplicate\Data\Responses;

use Czim\Simplicate\Data\Hours\Hours;
use Illuminate\Support\Collection;

/**
 * Class HoursListResponse
 *
 * @method Collection|Hours[] getData()
 */
class HoursListResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new Hours($item);
                },
                $data
            )
        );
    }

}
