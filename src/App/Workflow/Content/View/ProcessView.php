<?php

namespace Nemundo\Workflow\App\Workflow\Content\View;


use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Web\Site\Site;
use Nemundo\Workflow\App\Workflow\Com\Layout\WorkflowLayout;
use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;
use Nemundo\Workflow\App\Workflow\Controller\WorkflowController;


// WorkflowProcessView
class ProcessView extends AbstractProcessView
{


    /**
     * @var AbstractWorkflowProcess
     */
    public $contentType;


    public function getContent()
    {

        $layout = new WorkflowLayout($this);

        $betaController = new WorkflowController($this->contentType);

        $betaController->getTitle($layout->header);
        $betaController->getMenu($layout->col1);

        $form = $betaController->getForm($layout->col2);
        if ($form !==null) {
        $form->redirectSite = $this->redirectSite;
        }

        $betaController->getLogView($layout->col3);
        $betaController->getLogTable($layout->col3);


        return parent::getContent();

    }

}