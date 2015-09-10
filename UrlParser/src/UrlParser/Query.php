<?php


namespace UrlParser;

class Query
{
    public function get($name) {
        return $this->$name;
    }

    public function set($key, $value)
    {
        $this->$key = $value;
    }

    public function has($key)
    {
        return isset($this->toArray()[$key]);
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    public function toString()
    {
        return urldecode(http_build_query($this->toArray()));
    }

    /**
     * @return array|\ArrayIterator
     */
    public function getKeys()
    {
        $keys = new \ArrayIterator();
        foreach ($this as $row) {
            $keyExp = explode("=", $row);
            if (isset($keyExp[0])) {
                $keys[] = $keyExp[0];
            }
        }
        return $keys;
    }
}