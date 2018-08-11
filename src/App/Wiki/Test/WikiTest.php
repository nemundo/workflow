<?php

namespace Nemundo\Workflow\App\Wiki\Test;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Workflow\App\Wiki\Content\Data\WikiPageContent;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageDelete;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowDelete;

class WikiTest extends AbstractScript
{

    protected function loadScript()
    {

        $this->scriptName = 'wiki-test';
        $this->consoleScript = true;

    }


    public function run()
    {

        (new WikiPageDelete())->delete();
        (new WorkflowDelete())->delete();

        $loop = new ForLoop();
        foreach ($loop->getData() as $number) {

            $content = new WikiPageContent();
            $content->title = 'Titel ' . $number;
            $content->teaser = 'Teaser ' . $number;
            $content->save();

        }


    }

}