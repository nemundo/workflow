<?php

namespace Nemundo\Workflow\App\Workflow\Controller;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Type\Process\AbstractWorkflowProcess;
use Nemundo\Core\Base\AbstractBase;

class WorkflowController extends AbstractBase
{

    /**
     * @var AbstractWorkflowProcess
     */
    public $process;



    public function getTitleCom($parentItem = null) {


        $title = new AdminTitle($parentItem);
        $title->content = $this->process->getSubject();


        return $title;

    }




}