<?php

namespace EJLin\LruCache\Tests;

use EJLin\LruCache\HashMap;
use PHPUnit\Framework\TestCase;

class HashMapTest extends TestCase
{
    public function testPutAndGet()
    {
        $hashMap = new HashMap();

        $hashMap->put('k1','v1');

        $this->assertEquals('v1',$hashMap->get('k1'));

        $hashMap->put('k2','v2');

        $this->assertEquals('v2',$hashMap->get('k2'));
    }

    public function testDestroy()
    {
        $hashMap = new HashMap();

        $hashMap->put('k1','v1');
        $hashMap->put('k2','v2');

        $hashMap->destroy('k1');

        $this->assertNull($hashMap->get('k1'));
    }
}