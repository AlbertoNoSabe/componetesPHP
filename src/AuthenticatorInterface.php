<?php

namespace Alberto;

interface AuthenticatorInterface
{
    /**
     * @return boolean
     */
    public function check();

    /**
     * return \Alberto\User
     */
    public function user();
}
