<?php

declare(strict_types=1);

use Pest\Mutate\Cache\FileStore;

beforeEach(function (): void {
    $this->cache = new FileStore(sys_get_temp_dir().DIRECTORY_SEPARATOR.'testing');

    $this->key = sprintf('pest-mutate-test-%s', random_int(0, mt_getrandmax()));
});

it('can store a value in the cache', function (): void {
    $value = random_int(0, mt_getrandmax());
    expect($this->cache->set($this->key, $value))
        ->toBeTrue();

    expect($this->cache->get($this->key))
        ->toBe($value);
});

it('returns null as default if key does not exist', function (): void {
    expect($this->cache->get($this->key))
        ->toBeNull();
});

it('returns the given default value if key does not exist', function (): void {
    expect($this->cache->get($this->key, 'bar'))
        ->toBe('bar');
});

it('can determine if a value exists in the cache', function (): void {
    expect($this->cache->has($this->key))
        ->toBeFalse();

    $this->cache->set($this->key, 'foo');

    expect($this->cache->has($this->key))
        ->toBeTrue();
});

it('can retrieve a value added with a ttl', function (): void {
    $value = random_int(0, mt_getrandmax());
    expect($this->cache->set($this->key, $value, 10))
        ->toBeTrue();

    expect($this->cache->get($this->key))
        ->toBe($value);
});

it('can retrieve a value added with a ttl as DateInterval', function (): void {
    $value = random_int(0, mt_getrandmax());
    expect($this->cache->set($this->key, $value, new DateInterval('PT10S')))
        ->toBeTrue();

    expect($this->cache->get($this->key))
        ->toBe($value);
});

it('retrieves the default value if the cache has expired', function (): void {
    $value = random_int(0, mt_getrandmax());
    expect($this->cache->set($this->key, $value, -1))
        ->toBeTrue();

    expect($this->cache->has($this->key))
        ->toBeTrue();

    expect($this->cache->get($this->key))
        ->toBeNull();

    expect($this->cache->has($this->key))
        ->toBeFalse();
});

it('can delete a value from the cache', function (): void {
    $value = random_int(0, mt_getrandmax());
    expect($this->cache->set($this->key, $value))
        ->toBeTrue();

    expect($this->cache->get($this->key))
        ->toBe($value);

    $this->cache->delete($this->key);

    expect($this->cache->get($this->key))
        ->toBeNull();
});

it('can delete all values from the cache', function (): void {
    $value = random_int(0, mt_getrandmax());
    expect($this->cache->set($this->key, $value))
        ->toBeTrue();

    expect($this->cache->get($this->key))
        ->toBe($value);

    expect($this->cache->clear())
        ->toBeTrue();

    expect($this->cache->get($this->key))
        ->toBeNull();
});

it('can store multiple values in the cache', function (): void {
    $value1 = random_int(0, mt_getrandmax());
    $value2 = random_int(0, mt_getrandmax());
    expect($this->cache->setMultiple(['a' => $value1, 'b' => $value2]))
        ->toBeTrue();

    expect($this->cache->get('a'))
        ->toBe($value1);

    expect($this->cache->get('b'))
        ->toBe($value2);

    expect($this->cache->getMultiple(['a', 'b']))
        ->toBe(['a' => $value1, 'b' => $value2]);
});

it('returns null as default if any key does not exist', function (): void {
    expect($this->cache->setMultiple(['a' => 1, 'b' => 2]))
        ->toBeTrue();

    expect($this->cache->getMultiple(['a', 'b', 'c']))
        ->toBe(['a' => 1, 'b' => 2, 'c' => null]);
});

it('returns the default value if any key does not exist', function (): void {
    expect($this->cache->setMultiple(['a' => 1, 'b' => 2]))
        ->toBeTrue();

    expect($this->cache->getMultiple(['a', 'b', 'c'], 99))
        ->toBe(['a' => 1, 'b' => 2, 'c' => 99]);
});

it('can delete multiple values', function (): void {
    expect($this->cache->setMultiple(['a' => 1, 'b' => 2, 'c' => 3]))
        ->toBeTrue();

    expect($this->cache->deleteMultiple(['b', 'c']))
        ->toBeTrue();

    expect($this->cache->getMultiple(['a', 'b', 'c']))
        ->toBe(['a' => 1, 'b' => null, 'c' => null]);
});

it('uses a directory in the system temp directory by default', function (): void {
    $cache = new FileStore;

    expect($cache->directory())
        ->toBe(sys_get_temp_dir().DIRECTORY_SEPARATOR.'pest-mutate-cache');
});

it('can use a custom directory', function (): void {
    $cache = new FileStore(sys_get_temp_dir().DIRECTORY_SEPARATOR.'testing');

    expect($cache->directory())
        ->toBe(sys_get_temp_dir().DIRECTORY_SEPARATOR.'testing');
});
