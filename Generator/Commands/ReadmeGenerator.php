<?php

namespace Bertshang\Porto\Generator\Commands;

use Bertshang\Porto\Generator\GeneratorCommand;
use Bertshang\Porto\Generator\Interfaces\ComponentsGenerator;
use Illuminate\Support\Str;

/**
 * Class ReadmeGenerator
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class ReadmeGenerator extends GeneratorCommand implements ComponentsGenerator
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'porto:generate:readme';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a README file for a Container';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $fileType = 'Readme';

    /**
     * The structure of the file path.
     *
     * @var  string
     */
    protected $pathStructure = '{container-name}/*';

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
    protected $stubName = 'readme.stub';

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
        return 'README';
    }

    public function getDefaultFileExtension()
    {
        return 'md';
    }
}
