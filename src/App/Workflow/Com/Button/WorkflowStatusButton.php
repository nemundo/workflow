<?php

namespace Nemundo\Workflow\App\Workflow\Com\Button;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Web\Site\Site;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class WorkflowStatusButton extends AbstractHtmlContainer
{

    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;

    /**
     * @var string
     */
    public $label;


    public function getContent()
    {

        $label = $this->label;

        if ($label == null) {
            $label = $this->workflowStatus->contentLabel;
        }

        $btn = new AdminSiteButton($this);
        $btn->content = $label;
        $btn->site = new Site();
        $btn->site->addParameter(new ContentTypeParameter($this->workflowStatus->contentId));

        return parent::getContent();

    }

}