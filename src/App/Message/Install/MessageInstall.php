<?php

namespace Nemundo\Workflow\App\Message\Install;

use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Content\Site\ContentTypeSite;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Message\ContentType\ImageContentType;
use Nemundo\Workflow\App\Message\ContentType\MessageContentType;
use Nemundo\Workflow\App\Message\ContentType\TextContentType;
use Nemundo\Workflow\App\Message\Data\MessageCollection;

class MessageInstall extends AbstractScript
{
    public function run()
    {


/*
        $setup = new ModelCollectionSetup();
        $setup->addCollection(new MessageCollection());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new TextContentType());
        $setup->addContentType(new ImageContentType());
        $setup->addContentType(new MessageContentType());*/


    }
}