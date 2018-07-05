<?php

namespace Nemundo\Workflow\App\PersonalCalendar\Install;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\PersonalCalendar\Content\PersonalCalendarContentType;
use Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendarCollection;
use Nemundo\App\Content\Setup\ContentTypeSetup;

class PersonalCalendarInstall extends AbstractScript
{

    public function run()
    {


        $setup = new ModelCollectionSetup();
        $setup->addCollection(new PersonalCalendarCollection());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new PersonalCalendarContentType());

    }

}