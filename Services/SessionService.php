<?php

namespace Services;

/**
 * Handles the interaction between the application and PHP session
 *
 * Class SessionService
 * @package Services
 */
class SessionService
{
    /**
     * SessionService constructor.
     */
    public function __construct()
    {
        session_start(); // Gets the current session or start a new one
    }

    /**
     * Set a session variable
     *
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get the value of a session variable
     *
     * @param $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = false)
    {
        return $_SESSION[$key] ?? $default;
    }
}
