<?php

namespace Nemundo\Workflow\App\ContentTemplate\Install;

use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateCollection;

class ContentTemplateInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ContentTemplateCollection());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new ImageTemplateContentType());
        $setup->addContentType(new LargeTextTemplateContentType());


    }

}