<?php

namespace Nemundo\Workflow\App\Wiki\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Wiki\Application\WikiApplication;
use Nemundo\Workflow\App\Wiki\Content\Type\TextListType;
use Nemundo\Workflow\App\Wiki\Content\Type\WikiPageContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiCollection;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\Workflow\App\Wiki\Test\WikiTest;


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
        $setup->addContentType(new TextListType());


        //$setup = new WikiContentTypeSetup();
        //$setup->addContentType(new TextContentType());
        //$setup->addContentType(new ImageContentType());
       /*  $setup->addContentType(new ImageTemplateContentType());
        $setup->addContentType(new LargeTextTemplateContentType());
        $setup->addContentType(new PersonalTaskProcess());
        $setup->addContentType(new TitleChangeContentType());*/

        //$setup->addContentType(new ChangeRequestProcess());

        //$setup->addContentType(new MailContentType());
        /*$setup->addContentType(new HyperlinkContentType());
        $setup->addContentType(new WikiContentType());
        $setup->addContentType(new WikiNewsContentType());*/


        $setup = new ScriptSetup();
        $setup->addScript(new WikiTest());


    }
}