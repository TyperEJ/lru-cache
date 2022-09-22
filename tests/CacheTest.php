<?php

namespace EJLin\LruCache\Tests;

use EJLin\LruCache\Cache;
use PHPUnit\Framework\TestCase;

class CacheTest extends TestCase
{
    public function testToArray()
    {
        $cache = new Cache(2);

        $cache->put('k1', 'v1');
        $cache->put('k2', 'v2');

        $array = $cache->toArray();

        $this->assertSame([
            'k2' => 'v2',
            'k1' => 'v1',
        ], $array);
    }

    public function testPut()
    {
        $cache = new Cache(2);

        $cache->put('k1', 'v1');

        $this->assertSame([
            'k1' => 'v1',
        ], $cache->toArray());
    }

    public function testGet()
    {
        $cache = new Cache(2);

        $cache->put('k1', 'v1');
        $cache->put('k2', 'v2');

        $value = $cache->get('k1');

        $this->assertEquals('v1', $value);
        $this->assertSame([
            'k1' => 'v1',
            'k2' => 'v2',
        ], $cache->toArray());
    }

    public function testPutOverCapacity()
    {
        $cache = new Cache(2);

        $cache->put('k1', 'v1');
        $cache->put('k2', 'v2');
        $cache->put('k3', 'v3');

        $this->assertEquals(-1, $cache->get('k1'));
        $this->assertEquals('v3', $cache->get('k3'));
    }

    public function testPutDuplicateKey()
    {
        $cache = new Cache(2);

        $cache->put('k1', 'v1');
        $cache->put('k2', 'v2');
        $cache->put('k1', 'v1.1');

        $this->assertSame([
            'k1' => 'v1.1',
            'k2' => 'v2',
        ],$cache->toArray());
    }
}