<?php

namespace EJLin\LruCache\Tests;

use EJLin\LruCache\Node;
use PHPUnit\Framework\TestCase;

class NodeTest extends TestCase
{
    public function testGetKey()
    {
        $node = new Node('k1', 'v1');

        $this->assertEquals('k1', $node->getKey());
    }

    public function testGetValue()
    {
        $node = new Node('k1', 'v1');

        $this->assertEquals('v1', $node->getValue());
    }

    public function testNextAccessors()
    {
        $node = new Node('k1', 'v1');
        $node2 = new Node('k2', 'v2');

        $node->setNext($node2);
        $this->assertEquals($node2, $node->getNext());

        $node3 = new Node('k3', 'v3');

        $node->setNext($node3);
        $this->assertEquals($node3, $node->getNext());
    }

    public function testPrevAccessors()
    {
        $node = new Node('k1', 'v1');
        $node2 = new Node('k2', 'v2');

        $node->setPrev($node2);
        $this->assertEquals($node2, $node->getPrev());

        $node3 = new Node('k3', 'v3');

        $node->setPrev($node3);
        $this->assertEquals($node3, $node->getPrev());
    }
}