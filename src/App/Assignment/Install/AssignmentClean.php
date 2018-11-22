<?php

namespace Nemundo\Workflow\App\Assignment\Install;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Assignment\Data\AssignmentCollection;

class AssignmentClean extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'assignment-clean';
    }


    public function run()
    {


        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new AssignmentCollection());

        (new AssignmentInstall())->run();


    }

}