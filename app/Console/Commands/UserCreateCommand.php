<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UserCreateCommand extends Command
{
    protected $signature = 'user:create';

    protected $description = 'Create a new user from CLI';

    public function handle(): void
    {
        if (config('app.env') === 'production' && ! $this->confirm('You are in production mode. Are you sure you want to continue?')) {
            return;
        }

        $this->info('Creating a new user...');

        $name = $this->ask('Name');
        $email = $this->ask('Email');
        $password = $this->secret('Password');
        $password_confirmation = $this->secret('Confirm password');
        $admin = $this->confirm('Is this user an admin?');

        $this->info('Name: '.$name);
        $this->info('Email: '.$email);
        $this->info('Password: '.$password);
        $this->info('Password confirmation: '.$password_confirmation);
        $this->info('Admin: '.$admin);

        if ($password !== $password_confirmation) {
            $this->error('Passwords do not match!');

            return;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'admin' => $admin,
        ]);

        $this->info('User with name '.$user->name.'created successfully.');
    }
}
