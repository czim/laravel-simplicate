<?php

namespace Czim\Simplicate\Services;

use Czim\Simplicate\Contracts\Services\SimplicateClientInterface;
use Czim\Simplicate\Contracts\Services\SimplicateDomainInterface;

trait FluentPassthruToClient
{

    /**
     * @param int $offset
     * @return SimplicateDomainInterface|$this
     */
    public function offset(int $offset)
    {
        $this->getClient()->offset($offset);

        return $this;
    }

    /**
     * @param int $limit
     * @return SimplicateDomainInterface|$this
     */
    public function limit(int $limit)
    {
        $this->getClient()->limit($limit);

        return $this;
    }

    /**
     * @param array $filter
     * @return SimplicateDomainInterface|$this
     */
    public function filter(array $filter)
    {
        $this->getClient()->filter($filter);

        return $this;
    }

    /**
     * @param string $sort
     * @return SimplicateDomainInterface|$this
     */
    public function sort(string $sort)
    {
        $this->getClient()->sort($sort);

        return $this;
    }

    /**
     * Sort next call in descending order.
     *
     * @return SimplicateDomainInterface|$this
     */
    public function descending()
    {
        $this->getClient()->descending();

        return $this;
    }

    abstract protected function getClient(): SimplicateClientInterface;

}
