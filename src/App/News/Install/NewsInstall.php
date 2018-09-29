<?php

namespace Nemundo\Workflow\App\News\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\News\Application\NewsApplication;
use Nemundo\Workflow\App\News\Content\Type\BreakingNewsContentType;
use Nemundo\Workflow\App\News\Content\Type\CommentContentType;
use Nemundo\Workflow\App\News\Content\Type\NewsContentType;
use Nemundo\Workflow\App\News\Data\NewsCollection;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\Workflow\App\News\Test\NewsTest;


class NewsInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new NewsApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new NewsCollection());

        $setup = new ContentTypeSetup();
      /*  $setup->addContentType(new NewsContentType());
        $setup->addContentType(new CommentContentType());
        $setup->addContentType(new BreakingNewsContentType());*/

        $setup = new ScriptSetup();
        $setup->application = new NewsApplication();
        $setup->addScript(new NewsTest());


    }
}