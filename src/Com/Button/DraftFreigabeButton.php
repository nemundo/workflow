<?php

namespace Nemundo\Workflow\Com\Button;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;
use Nemundo\Workflow\Site\WorkflowDraftFreigabeSite;

class DraftFreigabeButton extends AdminButton
{

    /**
     * @var string
     */
    public $statusChangeId;

    public function getHtml()
    {

        $this->content = 'Entwurf freigeben';
        $this->site = clone(WorkflowDraftFreigabeSite::$site);
        $this->site->addParameter(new WorkflowStatusChangeParameter($this->statusChangeId));

        return parent::getHtml();

    }

}