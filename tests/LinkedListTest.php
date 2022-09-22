<?php

namespace EJLin\LruCache\Tests;

use EJLin\LruCache\LinkedList;
use EJLin\LruCache\Node;
use PHPUnit\Framework\TestCase;

class LinkedListTest extends TestCase
{
    public function testGetCount()
    {
        $linkedList = new LinkedList();

        $linkedList->addNodeToHeader(new Node('k1', 'v1'));
        $linkedList->addNodeToHeader(new Node('k2', 'v2'));

        $this->assertEquals(2, $linkedList->getCount());
    }

    public function testToArray()
    {
        $linkedList = new LinkedList();

        $linkedList->addNodeToHeader(new Node('k1', 'v1'));
        $linkedList->addNodeToHeader(new Node('k2', 'v2'));
        $linkedList->addNodeToHeader(new Node('k3', 'v3'));

        $this->assertSame([
            'k3' => 'v3',
            'k2' => 'v2',
            'k1' => 'v1',
        ], $linkedList->toArray());
    }

    public function testToReverseArray()
    {
        $linkedList = new LinkedList();

        $linkedList->addNodeToHeader(new Node('k1', 'v1'));
        $linkedList->addNodeToHeader(new Node('k2', 'v2'));
        $linkedList->addNodeToHeader(new Node('k3', 'v3'));

        $this->assertSame([
            'k1' => 'v1',
            'k2' => 'v2',
            'k3' => 'v3',
        ], $linkedList->toReverseArray());
    }

    public function testGetLastNode()
    {
        $linkedList = new LinkedList();

        $node = new Node('k1', 'v1');

        $linkedList->addNodeToHeader($node);
        $linkedList->addNodeToHeader(new Node('k2', 'v2'));

        $this->assertEquals($node, $linkedList->getLastNode());
    }

    public function testPushNodeToHeader()
    {
        $linkedList = new LinkedList();

        $linkedList->addNodeToHeader(new Node('k1', 'v1'));

        $this->assertEquals(1, $linkedList->getCount());

        $linkedList->addNodeToHeader(new Node('k2', 'v2'));

        $this->assertEquals(2, $linkedList->getCount());
    }

    public function testRemoveNode()
    {
        $linkedList = new LinkedList();

        $node = new Node('k1', 'v1');

        $linkedList->addNodeToHeader($node);
        $linkedList->addNodeToHeader(new Node('k2', 'v2'));

        $linkedList->removeNode($node);

        $this->assertNotEquals($node, $linkedList->getLastNode());
        $this->assertEquals(1, $linkedList->getCount());
    }
}