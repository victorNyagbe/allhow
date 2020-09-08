<?php

namespace App\Console\Commands;

use App\Role;
use Illuminate\Console\Command;

class addRoleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:role {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "This command help to add directly admin's role";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $role = Role::create([
            'name' => $this->argument('name')
        ]);

        return $this->info("Role ajouté : " . $role->name);
    }
}
