<?php

namespace Nemundo\Workflow\App\Message\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;
use Nemundo\Workflow\App\Message\Application\MessageApplication;
use Nemundo\Workflow\App\Message\ContentType\MessageContentType;
use Nemundo\Workflow\App\Message\Data\MessageCollection;
use Nemundo\Workflow\App\Message\Usergroup\MessageUsergroup;
use Nemundo\Workflow\App\Notification\Setup\NotificationFilterSetup;

class MessageInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new MessageApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new MessageCollection());

        $setup = new ContentTypeSetup();
        //$setup->addContentType(new TextContentType());
        //$setup->addContentType(new ImageContentType());
        $setup->addContentType(new MessageContentType());


        $setup = new NotificationFilterSetup();
        $setup->addContentType(new MessageContentType());


        $setup = new UsergroupSetup();
        $setup->addUsergroup(new MessageUsergroup());

    }
}