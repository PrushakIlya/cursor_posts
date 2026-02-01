<?php

namespace Framework;

class Container
{
    private array $bindings = [];
    private array $instances = [];

    public function bind(string $abstract, callable $factory): void
    {
        $this->bindings[$abstract] = $factory;
    }

    public function singleton(string $abstract, callable $factory): void
    {
        $this->bindings[$abstract] = $factory;
        $this->instances[$abstract] = null;
    }

    public function make(string $abstract)
    {
        if (isset($this->instances[$abstract]) && $this->instances[$abstract] !== null) {
            return $this->instances[$abstract];
        }

        if (!isset($this->bindings[$abstract])) {
            throw new \RuntimeException("No binding for: {$abstract}");
        }

        $instance = $this->bindings[$abstract]($this);

        if (array_key_exists($abstract, $this->instances)) {
            $this->instances[$abstract] = $instance;
        }

        return $instance;
    }

    public function has(string $abstract): bool
    {
        return isset($this->bindings[$abstract]);
    }
}
