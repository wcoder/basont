<?php

use Illuminate\Auth\UserProviderInterface;
use Illuminate\Auth\UserInterface;

class UserStaticAuthProvider implements UserProviderInterface
{
    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveById($identifier)
    {
        $user = new User();
        if ($identifier === 'admin')
        {
            $user->password = Hash::make(Config::get('auth.admin.password'));
        }
        return $user;
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        $user = new User();
        if (isset($credentials['password']))
        {
            $user = $this->retrieveById('admin');
        }
        return $user;
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Auth\UserInterface  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserInterface $user, array $credentials)
    {
        if (isset($credentials['password']))
        {
            return Hash::check($credentials['password'], $user->password);
        }
        return false;
    }

	/**
	 * Retrieve a user by by their unique identifier and "remember me" token.
	 *
	 * @param  mixed $identifier
	 * @param  string $token
	 * @return \Illuminate\Auth\UserInterface|null
	 */
	public function retrieveByToken($identifier, $token)
	{
		// TODO: Implement retrieveByToken() method.
	}

	/**
	 * Update the "remember me" token for the given user in storage.
	 *
	 * @param  \Illuminate\Auth\UserInterface $user
	 * @param  string $token
	 * @return void
	 */
	public function updateRememberToken(UserInterface $user, $token)
	{
		// TODO: Implement updateRememberToken() method.
	}
}