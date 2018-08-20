<?php

namespace Czim\Simplicate\Services;

use Czim\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Czim\Simplicate\Contracts\Services\SimplicateClientInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class SimplicateClient implements SimplicateClientInterface
{

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var int
     */
    protected $offset = 0;

    /**
     * @var int|null
     */
    protected $limit;

    /**
     * @var array
     */
    protected $filter = [];

    /**
     * @var string|null
     */
    protected $sort;

    /**
     * @var bool
     */
    protected $sortDescending = false;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * The response class to cast the result as.
     *
     * @var string|null
     */
    protected $responseClass;


    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }


    /**
     * @param int $offset
     * @return $this
     */
    public function offset(int $offset): SimplicateClientInterface
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function limit(int $limit): SimplicateClientInterface
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @param array $filter
     * @return $this
     */
    public function filter(array $filter): SimplicateClientInterface
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @param string $sort
     * @return $this
     */
    public function sort(string $sort): SimplicateClientInterface
    {
        $this->sort = trim($sort);

        if (starts_with($sort, '-')) {
            $this->sortDescending = true;
            $this->sort           = substr($sort, 1);
        }

        return $this;
    }

    /**
     * Sort next call in descending order.
     *
     * @return $this
     */
    public function descending(): SimplicateClientInterface
    {
        $this->sortDescending = true;

        return $this;
    }

    public function get(string $path): SimplicateResponseInterface
    {
        return $this->call('GET', $path);
    }

    public function post(string $path, array $body): SimplicateResponseInterface
    {
        return $this->call('POST', $path, $body);
    }

    public function put(string $path, array $body): SimplicateResponseInterface
    {
        return $this->call('PUT', $path, $body);
    }

    public function delete(string $path): SimplicateResponseInterface
    {
        return $this->call('DELETE', $path);
    }

    /**
     * @param string $class
     * @return $this
     */
    public function responseClass(string $class): SimplicateClientInterface
    {
        $this->responseClass = $class;

        return $this;
    }


    protected function call(string $method, $path, array $body = null)
    {
        $options = $this->options;

        if ($body !== null) {
            $options['body'] = $body;
        }

        $options['query'] = $this->collectQueryParameters();

        try {
            $response = $this->client->request($method, $path, $options);

        } catch (GuzzleException $e) {

            $this->resetFluentState();

            // todo
            throw $e;
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 && $statusCode >= 300) {
            // todo
            // problem response (might have plaintext contents)

            $this->resetFluentState();

            throw new \Exception('Service error ' . $statusCode);
        }

        if ($this->responseClass === null) {

            $this->resetFluentState();

            return $response->getBody()->getContents();
        }

        $this->resetFluentState();

        return $this->makeReponse($response);
    }

    protected function collectQueryParameters(): array
    {
        $query = [];

        if ($this->offset > 0) {
            $query['offset'] = $this->offset;
        }

        if ($this->limit > 0) {
            $query['limit'] = $this->limit;
        }

        if ($this->sort) {
            $query['sort'] = ($this->sortDescending ? '-' : '') . $this->sort;
        }

        if ( ! empty($this->filter)) {
            $query['q'] = $this->filter;
        }

        return $query;
    }

    protected function makeReponse(ResponseInterface $response): SimplicateResponseInterface
    {
        // The response should be JSON.
        try {
            $responseArray = json_decode($response->getBody()->getContents(), true);

        } catch (\Throwable $e) {
            // todo
            // error handling
            $responseArray = [];
        }

        $class = $this->responseClass;

        return new $class(
            array_get($responseArray,'data'),
            array_get($responseArray,'errors'),
            array_get($responseArray,'debug')
        );
    }

    /**
     * Resets the fluent-set state in preparation for the next call.
     */
    protected function resetFluentState(): void
    {
        $this->offset         = 0;
        $this->limit          = null;
        $this->filter         = [];
        $this->sort           = null;
        $this->sortDescending = false;
        $this->options        = [];
    }

}
