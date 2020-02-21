<?php
/**
 * Created by PhpStorm.
 * User: adriano
 * Date: 30/07/18
 * Time: 22:18
 */

namespace App\Entities\Users;

class ValidationUser
{
    const RULE_USER = [
       	'name' => 'required',
    	'email' => 'required|email|unique:users',
    	'password' => 'required|min:6|confirmed'
    ];
}