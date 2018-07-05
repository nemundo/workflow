<?php

namespace Nemundo\App\Content\Item;


use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Debug\Debug;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Com\View\WorkflowModelView;
use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;

class DataContentItem extends AbstractContentItem
{

    /**
     * @var AbstractDataContentType
     */
    public $contentType;

    public function getHtml()
    {

        $model = $this->contentType->getModel();

        $view = new WorkflowModelView($this);
        $view->model = $model;
        $view->dataId = $this->dataId;

        return parent::getHtml();

    }

}