<?php

namespace Nemundo\Workflow\Model;


use Nemundo\Orm\Model\AbstractOrmModel;

class WorkflowOrmModel extends AbstractOrmModel
{

    protected function loadModel()
    {

        $this->label = 'Workflow';
        $this->className = 'Workflow';
        $this->namespace = 'Nemundo\Workflow\App\Workflow\Data\Workflow';

    }

}