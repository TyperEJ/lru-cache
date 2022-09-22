<?php

namespace EJLin\LruCache;

class Node
{
    protected $prev;
    protected $next;
    protected $key;
    protected $value;

    public function __construct($key, $value, $prev = null, $next = null)
    {
        $this->key = $key;

        $this->value = $value;

        $this->prev = $prev;

        $this->next = $next;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setNext(Node $node)
    {
        $this->next = $node;
    }

    public function setPrev(Node $node)
    {
        $this->prev = $node;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function getPrev()
    {
        return $this->prev;
    }
}
