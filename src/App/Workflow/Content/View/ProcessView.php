<?php

namespace Nemundo\Workflow\App\Workflow\Content\View;


use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;
use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Workflow\App\Workflow\Com\Layout\WorkflowLayout;
use Nemundo\Workflow\App\Workflow\Controller\WorkflowController;


// WorkflowProcessView
class ProcessView extends AbstractContentView
{

    /**
     * @var AbstractWorkflowProcess
     */
    public $contentType;


    public function getHtml()
    {

        $layout = new WorkflowLayout($this);

        $betaController = new WorkflowController($this->contentType);

        $betaController->getTitle($layout->header);
        $betaController->getMenu($layout->col1);
        $betaController->getForm($layout->col2);



        $betaController->getLogView($layout->col3);
        $betaController->getLogTable($layout->col3);


        return parent::getHtml();

    }

}