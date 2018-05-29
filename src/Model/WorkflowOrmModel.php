<?php

namespace Nemundo\Workflow\Model;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Workflow\Data\Workflow\WorkflowExternalType;

class WorkflowOrmModel extends AbstractOrmModel
{


    protected function loadModel()
    {

        $this->label = 'Workflow';
        //$this->tableName = 'app_model';
        $this->className = 'Workflow';
        $this->namespace = 'Nemundo\Workflow\Data\Workflow';



    }

}