<?php

namespace Nemundo\Workflow\App\Workflow\Filter;


use Nemundo\Db\Filter\Filter;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\App\Identification\Type\UsergroupIdentificationType;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowModel;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;

class WorkflowFilter extends Filter
{


    // all, open, closed
    public $status;



    public function addProcessFilter(AbstractProcess $process)
    {

        $model = new WorkflowModel();


        $this->andEqual($model->processId, $process->contentId);

    }


    public function addUsergroupFilter(AbstractUsergroup $usergroup) {

        $model = new WorkflowModel();

        $this->andEqual($model->identificationTypeId, (new UsergroupIdentificationType())->id);
        $this->andEqual($model->identificationId, $usergroup->id);

    }



}