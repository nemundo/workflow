<?php

namespace Nemundo\Workflow\App\Identification\Install;


use Nemundo\Admin\AppDesigner\Setup\OrmTypeSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Workflow\App\Identification\Model\IdentificationOrmModelType;

class IdentificationAppDesignerSetup extends AbstractScript
{

    public function run()
    {

        $setup = new OrmTypeSetup();
        $setup->addOrmType(new IdentificationOrmModelType());

    }

}