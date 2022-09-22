<?php

namespace EJLin\LruCache;

class LinkedList
{
    protected $header;
    protected $tail;
    protected $count = 0;

    public function __construct()
    {
        $this->header = new Node('headerKey', 'headerValue');
        $this->tail = new Node('tailKey', 'tailValue');

        $this->header->setNext($this->tail);
        $this->tail->setPrev($this->header);
    }

    public function addNodeToHeader(Node $node)
    {
        $nextNode = $this->header->getNext();

        $node->setNext($nextNode);
        $this->header->setNext($node);

        $node->setPrev($this->header);
        $nextNode->setPrev($node);

        $this->count++;
    }

    public function removeNode(Node $node)
    {
        $prevNode = $node->getPrev();
        $nextNode = $node->getNext();

        $prevNode->setNext($nextNode);
        $nextNode->setPrev($prevNode);

        $this->count--;
    }

    public function toArray()
    {
        $output = [];

        $node = $this->header->getNext();

        while ($node->getNext() !== null)
        {
            $output[$node->getKey()] = $node->getValue();

            $node = $node->getNext();
        }

        return $output;
    }

    public function toReverseArray()
    {
        $output = [];

        $node = $this->tail->getPrev();

        while ($node->getPrev() !== null)
        {
            $output[$node->getKey()] = $node->getValue();

            $node = $node->getPrev();
        }

        return $output;
    }

    public function getLastNode()
    {
        return $this->tail->getPrev();
    }

    public function getCount()
    {
        return $this->count;
    }
}
