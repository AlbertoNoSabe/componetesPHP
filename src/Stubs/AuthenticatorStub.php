<?php

namespace Alberto\Stubs;

use Alberto\User;
use Alberto\AuthenticatorInterface;

class AuthenticatorStub implements AuthenticatorInterface
{
    /**
     * @var $logged
     */
    protected $logged;
    public function __construct($logged = true)
    {
        $this->logged = $logged;
    }

    public function user()
    {
        return new User([
            'role' => 'admin'
        ]);
    }

    /**
     * @return boolean
     */
    public function check()
    {
        return $this->logged;
    }
}
