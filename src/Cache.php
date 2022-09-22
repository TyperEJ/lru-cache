<?php

namespace EJLin\LruCache;

class Cache
{
    protected $hashMap;
    protected $linkedList;
    protected $capacity;

    public function __construct($capacity)
    {
        $this->hashMap = new HashMap();
        $this->linkedList = new LinkedList();
        $this->capacity = $capacity;
    }

    public function put($key, $value)
    {
        $node = new Node($key, $value);

        $this->putNode($node);

        if ($this->linkedList->getCount() > $this->capacity) {
            $this->removeLastNode();
        }
    }

    protected function removeNode(Node $node)
    {
        $this->hashMap->destroy($node->getKey());

        $this->linkedList->removeNode($node);
    }

    protected function removeLastNode()
    {
        $lastNode = $this->linkedList->getLastNode();

        $this->removeNode($lastNode);
    }

    protected function putNode(Node $node)
    {
        if ($dupKeyNode = $this->hashMap->get($node->getKey())) {
            $this->linkedList->removeNode($dupKeyNode);
        }

        $this->linkedList->addNodeToHeader($node);

        $this->hashMap->put($node->getKey(), $node);
    }

    public function toArray()
    {
        return $this->linkedList->toArray();
    }

    public function get($key)
    {
        $node = $this->hashMap
            ->get($key);

        if (is_null($node)) return -1;

        $this->removeNode($node);

        $this->putNode($node);

        return $node->getValue();
    }
}
