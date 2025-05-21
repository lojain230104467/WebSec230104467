<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class AssignCustomerRole extends Command
{
    protected $signature = 'user:assign-customer {email}';
    protected $description = 'Assign Customer role to a user';

    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email {$email} not found.");
            return 1;
        }

        $user->assignRole('Customer');
        $this->info("Customer role assigned to {$user->name} successfully.");
        return 0;
    }
} 