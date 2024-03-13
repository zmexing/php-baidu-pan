<?php
/**
 * MultimediafileApi
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * xpan
 *
 * xpanapi
 *
 * The version of the OpenAPI document: 0.1
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use OpenAPI\Client\ApiException;
use OpenAPI\Client\Configuration;
use OpenAPI\Client\HeaderSelector;
use OpenAPI\Client\ObjectSerializer;

/**
 * MultimediafileApi Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class MultimediafileApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex)
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation xpanfilelistall
     *
     * This operation contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://pan.baidu.com
     *
     * @param  string $access_token access_token (required)
     * @param  string $path path (required)
     * @param  int $recursion recursion (required)
     * @param  string $web web (optional)
     * @param  int $start start (optional)
     * @param  int $limit limit (optional)
     * @param  string $order order (optional)
     * @param  int $desc desc (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string
     */
    public function xpanfilelistall($access_token, $path, $recursion, $web = null, $start = null, $limit = null, $order = null, $desc = null)
    {
        list($response) = $this->xpanfilelistallWithHttpInfo($access_token, $path, $recursion, $web, $start, $limit, $order, $desc);
        return $response;
    }

    /**
     * Operation xpanfilelistallWithHttpInfo
     *
     * This operation contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://pan.baidu.com
     *
     * @param  string $access_token (required)
     * @param  string $path (required)
     * @param  int $recursion (required)
     * @param  string $web (optional)
     * @param  int $start (optional)
     * @param  int $limit (optional)
     * @param  string $order (optional)
     * @param  int $desc (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function xpanfilelistallWithHttpInfo($access_token, $path, $recursion, $web = null, $start = null, $limit = null, $order = null, $desc = null)
    {
        $request = $this->xpanfilelistallRequest($access_token, $path, $recursion, $web, $start, $limit, $order, $desc);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('string' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'string', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'string';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation xpanfilelistallAsync
     *
     * This operation contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://pan.baidu.com
     *
     * @param  string $access_token (required)
     * @param  string $path (required)
     * @param  int $recursion (required)
     * @param  string $web (optional)
     * @param  int $start (optional)
     * @param  int $limit (optional)
     * @param  string $order (optional)
     * @param  int $desc (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function xpanfilelistallAsync($access_token, $path, $recursion, $web = null, $start = null, $limit = null, $order = null, $desc = null)
    {
        return $this->xpanfilelistallAsyncWithHttpInfo($access_token, $path, $recursion, $web, $start, $limit, $order, $desc)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation xpanfilelistallAsyncWithHttpInfo
     *
     * This operation contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://pan.baidu.com
     *
     * @param  string $access_token (required)
     * @param  string $path (required)
     * @param  int $recursion (required)
     * @param  string $web (optional)
     * @param  int $start (optional)
     * @param  int $limit (optional)
     * @param  string $order (optional)
     * @param  int $desc (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function xpanfilelistallAsyncWithHttpInfo($access_token, $path, $recursion, $web = null, $start = null, $limit = null, $order = null, $desc = null)
    {
        $returnType = 'string';
        $request = $this->xpanfilelistallRequest($access_token, $path, $recursion, $web, $start, $limit, $order, $desc);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'xpanfilelistall'
     *
     * This operation contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://pan.baidu.com
     *
     * @param  string $access_token (required)
     * @param  string $path (required)
     * @param  int $recursion (required)
     * @param  string $web (optional)
     * @param  int $start (optional)
     * @param  int $limit (optional)
     * @param  string $order (optional)
     * @param  int $desc (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function xpanfilelistallRequest($access_token, $path, $recursion, $web = null, $start = null, $limit = null, $order = null, $desc = null)
    {
        // verify the required parameter 'access_token' is set
        if ($access_token === null || (is_array($access_token) && count($access_token) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $access_token when calling xpanfilelistall'
            );
        }
        // verify the required parameter 'path' is set
        if ($path === null || (is_array($path) && count($path) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $path when calling xpanfilelistall'
            );
        }
        // verify the required parameter 'recursion' is set
        if ($recursion === null || (is_array($recursion) && count($recursion) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $recursion when calling xpanfilelistall'
            );
        }

        $resourcePath = '/rest/2.0/xpan/multimedia?method=listall&openapi=xpansdk';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $access_token,
            'access_token', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?: []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $path,
            'path', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?: []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $recursion,
            'recursion', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?: []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $web,
            'web', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?: []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $start,
            'start', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?: []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $limit,
            'limit', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?: []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $order,
            'order', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?: []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $desc,
            'desc', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?: []);




        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json; charset=UTF-8']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json; charset=UTF-8'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHosts = ["https://pan.baidu.com"];
        if ($this->hostIndex < 0 || $this->hostIndex >= sizeof($operationHosts)) {
            throw new \InvalidArgumentException("Invalid index {$this->hostIndex} when selecting the host. Must be less than ".sizeof($operationHosts));
        }
        $operationHost = $operationHosts[$this->hostIndex];

        $query = ObjectSerializer::buildQuery($queryParams);

        $separator = '?';
        if (strchr($resourcePath, "?") !== false) {
            $separator = '&';
        }
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "{$separator}{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation xpanmultimediafilemetas
     *
     * This operation contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://pan.baidu.com
     *
     * @param  string $access_token access_token (required)
     * @param  string $fsids fsids (required)
     * @param  string $thumb thumb (optional)
     * @param  string $extra extra (optional)
     * @param  string $dlink 下载地址。下载接口需要用到dlink。 (optional)
     * @param  string $path 查询共享目录或专属空间内文件时需要。共享目录格式： /uk-fsid（其中uk为共享目录创建者id， fsid对应共享目录的fsid）。专属空间格式：/_pcs_.appdata/xpan/。 (optional)
     * @param  int $needmedia needmedia (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string
     */
    public function xpanmultimediafilemetas($access_token, $fsids, $thumb = null, $extra = null, $dlink = null, $path = null, $needmedia = null)
    {
        list($response) = $this->xpanmultimediafilemetasWithHttpInfo($access_token, $fsids, $thumb, $extra, $dlink, $path, $needmedia);
        return $response;
    }

    /**
     * Operation xpanmultimediafilemetasWithHttpInfo
     *
     * This operation contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://pan.baidu.com
     *
     * @param  string $access_token (required)
     * @param  string $fsids (required)
     * @param  string $thumb (optional)
     * @param  string $extra (optional)
     * @param  string $dlink 下载地址。下载接口需要用到dlink。 (optional)
     * @param  string $path 查询共享目录或专属空间内文件时需要。共享目录格式： /uk-fsid（其中uk为共享目录创建者id， fsid对应共享目录的fsid）。专属空间格式：/_pcs_.appdata/xpan/。 (optional)
     * @param  int $needmedia (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function xpanmultimediafilemetasWithHttpInfo($access_token, $fsids, $thumb = null, $extra = null, $dlink = null, $path = null, $needmedia = null)
    {
        $request = $this->xpanmultimediafilemetasRequest($access_token, $fsids, $thumb, $extra, $dlink, $path, $needmedia);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('string' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'string', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'string';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation xpanmultimediafilemetasAsync
     *
     * This operation contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://pan.baidu.com
     *
     * @param  string $access_token (required)
     * @param  string $fsids (required)
     * @param  string $thumb (optional)
     * @param  string $extra (optional)
     * @param  string $dlink 下载地址。下载接口需要用到dlink。 (optional)
     * @param  string $path 查询共享目录或专属空间内文件时需要。共享目录格式： /uk-fsid（其中uk为共享目录创建者id， fsid对应共享目录的fsid）。专属空间格式：/_pcs_.appdata/xpan/。 (optional)
     * @param  int $needmedia (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function xpanmultimediafilemetasAsync($access_token, $fsids, $thumb = null, $extra = null, $dlink = null, $path = null, $needmedia = null)
    {
        return $this->xpanmultimediafilemetasAsyncWithHttpInfo($access_token, $fsids, $thumb, $extra, $dlink, $path, $needmedia)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation xpanmultimediafilemetasAsyncWithHttpInfo
     *
     * This operation contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://pan.baidu.com
     *
     * @param  string $access_token (required)
     * @param  string $fsids (required)
     * @param  string $thumb (optional)
     * @param  string $extra (optional)
     * @param  string $dlink 下载地址。下载接口需要用到dlink。 (optional)
     * @param  string $path 查询共享目录或专属空间内文件时需要。共享目录格式： /uk-fsid（其中uk为共享目录创建者id， fsid对应共享目录的fsid）。专属空间格式：/_pcs_.appdata/xpan/。 (optional)
     * @param  int $needmedia (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function xpanmultimediafilemetasAsyncWithHttpInfo($access_token, $fsids, $thumb = null, $extra = null, $dlink = null, $path = null, $needmedia = null)
    {
        $returnType = 'string';
        $request = $this->xpanmultimediafilemetasRequest($access_token, $fsids, $thumb, $extra, $dlink, $path, $needmedia);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'xpanmultimediafilemetas'
     *
     * This operation contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://pan.baidu.com
     *
     * @param  string $access_token (required)
     * @param  string $fsids (required)
     * @param  string $thumb (optional)
     * @param  string $extra (optional)
     * @param  string $dlink 下载地址。下载接口需要用到dlink。 (optional)
     * @param  string $path 查询共享目录或专属空间内文件时需要。共享目录格式： /uk-fsid（其中uk为共享目录创建者id， fsid对应共享目录的fsid）。专属空间格式：/_pcs_.appdata/xpan/。 (optional)
     * @param  int $needmedia (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function xpanmultimediafilemetasRequest($access_token, $fsids, $thumb = null, $extra = null, $dlink = null, $path = null, $needmedia = null)
    {
        // verify the required parameter 'access_token' is set
        if ($access_token === null || (is_array($access_token) && count($access_token) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $access_token when calling xpanmultimediafilemetas'
            );
        }
        // verify the required parameter 'fsids' is set
        if ($fsids === null || (is_array($fsids) && count($fsids) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $fsids when calling xpanmultimediafilemetas'
            );
        }

        $resourcePath = '/rest/2.0/xpan/multimedia?method=filemetas&openapi=xpansdk';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $access_token,
            'access_token', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?: []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fsids,
            'fsids', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?: []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $thumb,
            'thumb', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?: []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $extra,
            'extra', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?: []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $dlink,
            'dlink', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?: []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $path,
            'path', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?: []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $needmedia,
            'needmedia', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?: []);




        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json; UTF-8']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json; UTF-8'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHosts = ["https://pan.baidu.com"];
        if ($this->hostIndex < 0 || $this->hostIndex >= sizeof($operationHosts)) {
            throw new \InvalidArgumentException("Invalid index {$this->hostIndex} when selecting the host. Must be less than ".sizeof($operationHosts));
        }
        $operationHost = $operationHosts[$this->hostIndex];

        $query = ObjectSerializer::buildQuery($queryParams);

        $separator = '?';
        if (strchr($resourcePath, "?") !== false) {
            $separator = '&';
        }
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "{$separator}{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
