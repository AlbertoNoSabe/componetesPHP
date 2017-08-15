<?php

namespace Alberto;
use Alberto\SessionFileDriver;
use Alberto\SessionDriverInterface;

class SessionManager
{
    /**
     * @var \Alberto\SessionFileDriver
     */
    protected $driver;
    protected $data = array();

    /**
     * @param \Alberto\SessionFileDriver @driver
     */
    public function __construct(SessionDriverInterface $driver)
    {
        $this->driver = $driver;
        $this->load();
    }

    protected function load()
    {
        $this->data = $this->driver->load();
    }

    public function get($key)
    {
        return isset($this->data[$key])
            ? $this->data[$key]
            : null;
    }
}
