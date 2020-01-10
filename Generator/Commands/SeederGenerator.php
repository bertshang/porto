<?php

namespace Bertshang\Porto\Generator\Commands;

use Bertshang\Porto\Generator\GeneratorCommand;
use Bertshang\Porto\Generator\Interfaces\ComponentsGenerator;
use Illuminate\Support\Str;

/**
 * Class ActionGenerator
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class SeederGenerator extends GeneratorCommand implements ComponentsGenerator
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'porto:generate:seeder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Seeder class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $fileType = 'Seeder';

    /**
     * The structure of the file path.
     *
     * @var  string
     */
    protected $pathStructure = '{container-name}/Data/Seeders/*';

    /**
     * The structure of the file name.
     *
     * @var  string
     */
    protected $nameStructure = '{file-name}';

    /**
     * The name of the stub file.
     *
     * @var  string
     */
    protected $stubName = 'seeder.stub';

    /**
     * User required/optional inputs expected to be passed while calling the command.
     * This is a replacement of the `getArguments` function "which reads whenever it's called".
     *
     * @var  array
     */
    public $inputs = [
    ];

    /**
     * @return array
     */
    public function getUserInputs()
    {
        return [
            'path-parameters' => [
                'container-name' => $this->containerName,
            ],
            'stub-parameters' => [
                '_container-name' => Str::lower($this->containerName),
                'container-name' => $this->containerName,
                'class-name' => $this->fileName,
            ],
            'file-parameters' => [
                'file-name' => $this->fileName,
            ],
        ];
    }

    /**
     * Get the default file name for this component to be generated
     *
     * @return string
     */
    public function getDefaultFileName()
    {
        return $this->containerName . 'Seeder';
    }

}
