<?php

namespace App\Console\Commands;

use App\Language;
use Illuminate\Console\Command;

class AddLanguageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:language';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command help to add directly language';

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
        $name = $this->ask('Saisir le nom de la langue');

        if ($this->confirm('voulez-vous enregistrer cette langue ?')) {

            $language = Language::create([
                'name' => $name
            ]);

            return $this->info('Langue ajoutée : ' . $language->name);

        }
    }
}
