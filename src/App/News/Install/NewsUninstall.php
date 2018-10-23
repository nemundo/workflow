<?php

namespace Nemundo\Workflow\App\News\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\News\Application\NewsApplication;
use Nemundo\Workflow\App\News\Content\Type\BreakingNewsContentType;
use Nemundo\Workflow\App\News\Content\Type\CommentContentTypeModelTree;
use Nemundo\Workflow\App\News\Content\Type\NewsContentType;
use Nemundo\Workflow\App\News\Data\News\NewsReader;
use Nemundo\Workflow\App\News\Data\NewsCollection;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\Workflow\App\News\Test\NewsTest;


class NewsUninstall extends AbstractScript
{

    public function run()
    {


        $reader = new NewsReader();
        foreach ($reader->getData() as $newsRow) {

            $newsType = new NewsContentType($newsRow->id);
            $newsType->deleteType();

        }


        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new NewsCollection());


    }
}