<?php

namespace Nemundo\Workflow\App\Task\Item;


// AbstractItem
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Workflow\App\Task\Data\Task\TaskUpdate;


class TaskItem extends AbstractBaseClass
{


    private $dataId;

    public function __construct($dataId)
    {
        $this->dataId = $dataId;
    }


    public function changeDeadline()
    {


    }


    public function archiveTask()
    {


        $update = new TaskUpdate();
        $update->archive = true;
        //$update->filter->andEqual($update->model->contentTypeId, (new Task))
        $update->filter->andEqual($update->model->dataId, $this->dataId);
        $update->update();


    }


}