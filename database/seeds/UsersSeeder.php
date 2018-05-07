<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$name  = 'admin';
    	$email = 'admin@test.com';
    	$user = User::where('email', $email)->first();
    	// if user doesn't exist create a new user instance
    	if(!$user){
    		$password = 'admin';
    		$this->createUser($name, $email, $password);
    	}
    }
	/**
     * Create new User Record
     * @param  string $name
     * @param  string $email
     * @param  string $password
     * @return Course
     */
    public function createUser($name, $email, $password)
    {
  		$user = User::create([
  			'name'     => $name,
  			'email'    => $email,
  			'password' => bcrypt($password)
  		]);

  		return $user;
    }
}