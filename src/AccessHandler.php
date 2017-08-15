<?php

namespace Alberto;

use Alberto\Authenticator;

class AccessHandler
{
    /**
     * @var \Alberto\AuthenticatorInterface
     */
    protected $auth;

    /**
     * @param \Alberto\AuthenticatorInterface $auth
     */
    public function __construct(Authenticator $auth)
    {
        $this->auth = $auth;
    }


    public function check($role)
    {
        return $this->auth->check() && $this->auth->user()->role === $role;
    }
}
