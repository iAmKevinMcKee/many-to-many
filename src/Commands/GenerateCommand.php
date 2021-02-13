<?php

namespace IAmKevinMcKee\ManyToMany\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class GenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'many-to-many {firstModel : one model in the hasMany relationship} {secondModel : the other model in the hasMany relationship}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a migration for the pivot table to create a hasMany relationship between these two models';

    private $files;

    /**
     * Create a new command instance.
     *
     * @param  Filesystem  $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $models = [
            $this->argument('firstModel'),
            $this->argument('secondModel'),
        ];
        sort($models, SORT_STRING);
        $first = Str::studly(Str::singular($models[0]));
        $second = Str::studly(Str::singular($models[1]));

        $newMigration = $this->files->get(__DIR__.'/../Stubs/migration.stub');
        $newMigration = str_replace('|UPPERFIRST|', $first, $newMigration);
        $newMigration = str_replace('|LOWERFIRST|', Str::snake($first), $newMigration);
        $newMigration = str_replace('|UPPERSECOND|', $second, $newMigration);
        $newMigration = str_replace('|LOWERSECOND|', Str::snake($second), $newMigration);

        $this->files->put(
            base_path('database/migrations/' . now()->format('Y_m_d_His') . '_create_many_to_many_pivot_for_'
                . Str::snake($first) . '_' . Str::snake($second) . '.php'),
            $newMigration
        );
        $this->line('we did it');
    }
}
