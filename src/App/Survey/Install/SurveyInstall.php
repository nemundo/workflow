<?php

namespace Nemundo\Workflow\App\Survey\Install;

use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Survey\Content\Type\Survey1ContentType;
use Nemundo\Workflow\App\Survey\Content\Type\Survey2ContentType;
use Nemundo\Workflow\App\Survey\Content\Type\Survey3ContentType;
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

        //$setup = new WikiContentTypeSetup();
        //$setup->addContentType(new SurveyTypeContentType());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new Survey1ContentType());
        $setup->addContentType(new Survey2ContentType());
        $setup->addContentType(new Survey3ContentType());


        //$setup->addContentType(new UmfrageStartType());


    }
}