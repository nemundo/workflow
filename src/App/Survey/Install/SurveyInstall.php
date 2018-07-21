<?php

namespace Nemundo\Workflow\App\Survey\Install;

use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Survey\Data\SurveyCollection;
use Nemundo\Workflow\App\Survey\Type\SurveyTypeContentType;
use Nemundo\Workflow\App\Survey\Type\UmfrageStartType;
use Nemundo\Workflow\App\Wiki\Setup\WikiContentTypeSetup;

class SurveyInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new SurveyCollection());

        $setup = new WikiContentTypeSetup();
        $setup->addContentType(new SurveyTypeContentType());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new UmfrageStartType());


    }
}