<?php

namespace Nemundo\Workflow\App\Calendar\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Calendar\Data\CalendarCollection;

class CalendarInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new CalendarCollection());


    }
}