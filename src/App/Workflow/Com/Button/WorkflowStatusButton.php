<?php

namespace Nemundo\Workflow\App\Workflow\Com\Button;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Web\Site\Site;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class WorkflowStatusButton extends AbstractHtmlContainerList
{

    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;

    /**
     * @var string
     */
    public $label;


    public function getHtml()
    {

        $label = $this->label;

        if ($label == null) {
            $label = $this->workflowStatus->contentLabel;
        }

        $btn = new AdminButton($this);
        $btn->content = $label;
        $btn->site = new Site();
        $btn->site->addParameter(new ContentTypeParameter($this->workflowStatus->contentId));

        return parent::getHtml();

    }

}