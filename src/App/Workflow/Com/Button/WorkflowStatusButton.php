<?php

namespace Nemundo\Workflow\App\Workflow\Com\Button;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\App\Content\Site\Edit\ContentTypeEditSite;
use Nemundo\App\Content\Type\AbstractContentType;
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
    //public $dataId;

    public function getHtml()
    {

        $btn = new AdminButton($this);
        $btn->content = $this->workflowStatus->contentLabel;
        $btn->site = new Site();  // clone(ContentTypeEditSite::$site);
        $btn->site->addParameter(new ContentTypeParameter($this->workflowStatus->contentId));
        //$btn->site->addParameter(new DataIdParameter($this->contentType->dataId));

        return parent::getHtml();

    }

}