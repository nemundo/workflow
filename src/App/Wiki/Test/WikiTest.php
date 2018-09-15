<?php

namespace Nemundo\Workflow\App\Wiki\Test;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\Wiki\Content\Data\WikiPageContent;
use Nemundo\Workflow\App\Wiki\Content\Type\WikiPageContentType;
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


        $loop = new ForLoop();
        foreach ($loop->getData() as $number) {


            $type = new WikiPageContentType();
            $type->title =  'Titel ' . $number;
            $type->saveType();


            $textType = new LargeTextTemplateContentType();
            $textType->parentContentType = $type;
            $textType->text = 'Teaser ' . $number;
            $textType->saveType();



            /*
            $content = new WikiPageContent();
            $content->title = 'Titel ' . $number;
            $content->teaser = 'Teaser ' . $number;
            $content->save();*/

        }


    }

}