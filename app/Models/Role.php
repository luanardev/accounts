<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    /**
     * Default Roles
     *
     */
    const ADMIN = 'Administrator';
    const DEVELOPER = 'Developer';
    const STAFF = 'Staff';
    const STUDENT = 'Student';
    const ALUMNUS = 'Alumnus';
    const GUEST = 'Guest';

    /**
     * @return boolean
     */
    public function isAdmin(): bool
    {
        return strtolower($this->name) == strtolower(static::ADMIN);
    }
	
	/**
     * @return boolean
     */
    public function isDeveloper(): bool
    {
        return strtolower($this->name) == strtolower(static::DEVELOPER);
    }
	
	/**
     * @return boolean
     */
    public function isStaff(): bool
    {
        return strtolower($this->name) == strtolower(static::STAFF);
    }
	
	/**
     * @return boolean
     */
    public function isStudent(): bool
    {
        return strtolower($this->name) == strtolower(static::STUDENT);
    }
	
	/**
     * @return boolean
     */
    public function isAlumnus(): bool
    {
        return strtolower($this->name) == strtolower(static::ALUMNUS);
    }
	
	/**
     * @return boolean
     */
    public function isGuest(): bool
    {
        return strtolower($this->name) == strtolower(static::GUEST);
    }

}
