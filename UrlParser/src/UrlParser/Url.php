<?php


namespace UrlParser;


class Url
{
    private $scheme;
    private $host;
    private $port;
    private $path;
    private $query;

    public function __construct($url)
    {
        $parsedUrl = parse_url($url);
        if (isset($parsedUrl['scheme'])) {
            $this->setScheme($parsedUrl['scheme']);
        }

        if (isset($parsedUrl['host'])) {
            $this->setHost($parsedUrl['host']);
        }

        if (isset($parsedUrl['port'])) {
            $this->setPort($parsedUrl['port']);
        }

        if (isset($parsedUrl['path'])) {
            $this->setPath($parsedUrl['path']);
        }

        $this->setQuery(new Query());
        if (isset($parsedUrl['query'])) {
            if ($parsedUrl['query'] != null) {
                parse_str($parsedUrl['query'], $queryArray);
                foreach ($queryArray as $key => $row) {
                    $this->getQuery()->set($key, $row);
                }

            }
        }
    }

    public function isValid($url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
            return true;
        } else {
            return false;
        }
    }


    public function toString()
    {
        $urlStr = "";
        $urlStr .= $this->getScheme()."://".$this->getHost().$this->getPath();
        if ($this->getPort() != null) {
            $urlStr .= ":".$this->getPort();
        }
        $urlStr .= "?".$this->getQuery()->toString();
        return $urlStr;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }


    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }


    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param Query $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return Query
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param mixed $scheme
     */
    public function setScheme($scheme)
    {
        $this->scheme = $scheme;
    }

    /**
     * @return mixed
     */
    public function getScheme()
    {
        return $this->scheme;
    }



}