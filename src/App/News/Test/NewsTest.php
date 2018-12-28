<?php

namespace Nemundo\Workflow\App\News\Test;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Workflow\App\News\Content\Data\NewsContent;

class NewsTest extends AbstractScript
{

    protected function loadScript()
    {

        $this->consoleScript = true;
        $this->scriptName = 'news-test';

    }


    public function run()
    {

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 100;
        foreach ($loop->getData() as $number) {




        }


    }

}