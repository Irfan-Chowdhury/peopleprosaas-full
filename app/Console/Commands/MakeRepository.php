<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    public function handle()
    {
        $name = $this->argument('name');
        $baseName = str_replace('Repository', '', $name);

        $contractName = "{$baseName}Contract";
        $RepositoryName = "{$baseName}Repository";

        if(config('database.connections.peopleprosaas_landlord')) {
            $modelPath = "App\Models\Landlord\\{$baseName}";
        }else {
            $modelPath = "App\Models\{$baseName}";
        }

        // $repositoryContent = "<?php\n\nnamespace App\Repositories;\n\nuse App\Contracts\\{$contractName};\nuse $modelPath;\n\nclass {$RepositoryName} extends BaseRepository implements {$contractName}\n{\n    protected \$model;\n\n    public function __construct(Social \$model)\n    {\n        \$this->\$model = \$model;\n        parent::__construct(\$this->\$model);\n    }\n}";
        $repositoryContent = $this->formatOfContent($contractName, $modelPath, $RepositoryName, $baseName);

        $filePath = app_path("Repositories/{$RepositoryName}.php");

        if (file_exists($filePath)) {
            $this->error("Repository {$RepositoryName} already exists!");
            return;
        }

        file_put_contents($filePath, $repositoryContent);

        $this->info("Repository [app/Repositories/{$RepositoryName}.php] created successfully!");
    }

    public function formatOfContent($contractName, $modelPath, $RepositoryName, $baseName)
    {
return
"<?php

namespace App\Repositories;

use App\Contracts\\{$contractName};
use $modelPath;

class {$RepositoryName} extends BaseRepository implements {$contractName}
{
    protected \$model;

    public function __construct({$baseName} \$model)
    {
        \$this->\$model = \$model;
        parent::__construct(\$this->\$model);
    }
}";
    }
}
