<?php

namespace Nemundo\Workflow\App\News\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\News\Content\CommentContentType;
use Nemundo\Workflow\App\News\Content\NewsContentType;
use Nemundo\Workflow\App\News\Data\NewsCollection;
use Nemundo\Workflow\Content\Setup\ContentTypeSetup;
use Nemundo\Workflow\Setup\WorkflowStatusSetup;

class NewsInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new NewsCollection());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new NewsContentType());
        $setup->addContentType(new CommentContentType());


    }
}