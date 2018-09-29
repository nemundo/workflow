<?php

namespace Nemundo\Workflow\App\Stream\Script;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Workflow\App\Stream\Data\Stream\StreamDelete;

class StreamDeleteScript extends AbstractScript
{

    protected function loadScript()
    {
        $this->scriptName = 'stream-delete';
        $this->consoleScript = true;
    }


    public function run()
    {

        (new StreamDelete())->delete();

    }

}