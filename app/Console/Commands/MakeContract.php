<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeContract extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:contract {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new interface';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $contractContent = "<?php\n\nnamespace App\Contracts;\n\ninterface {$name} extends BaseContract\n{\n    // Add your service logic here\n}";

        $filePath = app_path("Contracts/{$name}.php");

        if (file_exists($filePath)) {
            $this->error("Contract {$name} already exists!");
            return;
        }

        file_put_contents($filePath, $contractContent);

        $this->info("Contract [app/Contracts/{$name}.php] created successfully!");
    }
}
