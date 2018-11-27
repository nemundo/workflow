<?php

namespace Nemundo\Workflow\App\ContentTemplate\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\ContentTemplate\Application\ContentTemplateApplication;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\TemplateFileType;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\YouTubeType;
use Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateCollection;
use Nemundo\Workflow\App\ContentTemplate\Type\Comment\CommentType;

class ContentTemplateInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new ContentTemplateApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ContentTemplateCollection());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new ImageTemplateContentType());
        $setup->addContentType(new LargeTextTemplateContentType());
        $setup->addContentType(new CommentType());
        $setup->addContentType(new TemplateFileType());
        $setup->addContentType(new YouTubeType());


    }

}