# LRU Cache for PHP
https://en.wikipedia.org/wiki/Cache_replacement_policies#LRU
## Usage

```php
use EJLin\LruCache\Cache;

$LRUCache = new Cache();

$LRUCache->put(1,1);
$LRUCache->put(2,2);
$LRUCache->get(1); // 1
$LRUCache->put(3,3);
$LRUCache->get(2); // -1 (not found)
$LRUCache->put(4,4);
$LRUCache->get(1); // -1 (not found)
$LRUCache->get(3); // 3
$LRUCache->get(4); // 4

$LRUCache->toArray(); // [4 => 4, 3 => 3];
```
