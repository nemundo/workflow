<?php

namespace Nemundo\Workflow\App\Wiki\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\Message\ContentType\ImageContentType;
use Nemundo\Workflow\App\Message\ContentType\TextContentType;
use Nemundo\Workflow\App\PersonalTask\Process\PersonalTaskProcess;
use Nemundo\Workflow\App\Wiki\Application\WikiApplication;
use Nemundo\Workflow\App\Wiki\Collection\WikiContentTypeCollection;
use Nemundo\Workflow\App\Wiki\Content\Type\WikiPageContentType;
use Nemundo\Workflow\App\Wiki\ContentType\HyperlinkContentType;
use Nemundo\Workflow\App\Wiki\ContentType\MailContentType;
use Nemundo\Workflow\App\Wiki\ContentType\WikiPageContainer;
use Nemundo\Workflow\App\Wiki\ContentType\WikiNewsContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiCollection;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\Workflow\App\Wiki\Setup\WikiContentTypeSetup;
use Schleuniger\App\ChangeRequest\Process\ChangeRequestProcess;

class WikiInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new WikiCollection());

        $setup = new ApplicationSetup();
        $setup->addApplication(new WikiApplication());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new WikiPageContentType());


        $setup = new WikiContentTypeSetup();
        //$setup->addContentType(new TextContentType());
        //$setup->addContentType(new ImageContentType());
        $setup->addContentType(new ImageTemplateContentType());
        $setup->addContentType(new LargeTextTemplateContentType());
        $setup->addContentType(new PersonalTaskProcess());

        //$setup->addContentType(new ChangeRequestProcess());



        //$setup->addContentType(new MailContentType());
        /*$setup->addContentType(new HyperlinkContentType());
        $setup->addContentType(new WikiContentType());
        $setup->addContentType(new WikiNewsContentType());*/


    }
}