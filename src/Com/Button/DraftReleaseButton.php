<?php

namespace Nemundo\Workflow\Com\Button;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;
use Nemundo\Workflow\Site\Release\DraftReleaseSite;

class DraftReleaseButton extends AdminButton
{

    /**
     * @var string
     */
    public $workflowId;


    public function getHtml()
    {

        $this->content = 'Entwurf freigeben';
        $this->site = clone(DraftReleaseSite::$site);
        $this->site->addParameter(new WorkflowParameter($this->workflowId));

        return parent::getHtml();

    }

}