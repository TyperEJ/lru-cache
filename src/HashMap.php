<?php

namespace EJLin\LruCache;

class HashMap
{
    protected $hashMap;

    public function __construct()
    {
        $this->hashMap = [];
    }

    public function put($key, $value)
    {
        $this->hashMap[$key] = $value;
    }

    public function destroy($key)
    {
        unset($this->hashMap[$key]);
    }

    public function get($key)
    {
        return $this->hashMap[$key] ?? null;
    }
}
