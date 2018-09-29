<?php

namespace Nemundo\Workflow\App\RepeatingTask\Install;

use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Scheduler\Setup\SchedulerJobSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTaskCollection;
use Nemundo\Workflow\App\RepeatingTask\Job\RepeatingTaskImportJob;
use Nemundo\Workflow\App\RepeatingTask\Type\RepeatingTaskContentType;

class RepeatingTaskInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new RepeatingTaskCollection());

        $setup = new SchedulerJobSetup();
        $setup->addSchedulerJob(new RepeatingTaskImportJob());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new RepeatingTaskContentType());


    }
}