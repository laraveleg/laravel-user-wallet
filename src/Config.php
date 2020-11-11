<?php

namespace LaravelEG\UserWallet;

class Config implements \ArrayAccess
{
    private $container = [];

    public function __construct() {
        // Get config from laravel
        $config = config('laraveleg.userwallet');

        // Set from larave config in container
        $this->container = $config;
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}