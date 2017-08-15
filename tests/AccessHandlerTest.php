<?php

use PHPUnit\Framework\TestCase;

use Alberto\AccessHandler as Access;
use Alberto\Authenticator as Auth;
use Alberto\AuthenticatorInterface;
use Alberto\User;

class AccessHandlerTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function test_grant_access()
    {
        $access = new Access($this->getAuthenticatorMock());
        $this->assertTrue(
            $access->check('admin')
        );
    }

    public function test_deny_access()
    {
        $access = new Access($this->getAuthenticatorMock());
        $this->assertFalse(
            $access->check('editor')
        );
    }

    protected function getAuthenticatorMock()
    {
        $user = Mockery::mock(User::class);
        $user->role = 'admin';

        //no es obligatoria una interface (AuthenticatorInterface) para poder correr mockery
        $auth = Mockery::mock(Auth::class);
        $auth->shouldReceive('check')
            ->once()
            ->andReturn(true);

        $auth->shouldReceive('user')
            ->once()
            ->andReturn($user);

        return $auth;
    }
}
