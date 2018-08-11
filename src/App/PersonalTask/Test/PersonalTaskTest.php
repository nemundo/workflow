<?php

namespace Nemundo\Workflow\App\PersonalTask\Test;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\Debug\Debug;

class PersonalTaskTest extends AbstractScript
{


    public function run()
    {


        (new Debug())->write('Personal Task Test');

    }

}