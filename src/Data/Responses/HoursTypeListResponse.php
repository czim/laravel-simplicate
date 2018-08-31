<?php

namespace Czim\Simplicate\Data\Responses;

use Czim\Simplicate\Data\Hours\Type;
use Illuminate\Support\Collection;

/**
 * Class HoursTypeListResponse
 *
 * @method Collection|Type[] getData()
 */
class HoursTypeListResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new Type($item);
                },
                $data
            )
        );
    }

}
