<?php

namespace Nemundo\Workflow\App\Workflow\Com\Button;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Site\DraftReleaseSite;

class DraftReleaseButton extends AdminButton
{

    /**
     * @var string
     */
    public $workflowId;


    protected function loadCom()
    {

        $this->content = 'Entwurf freigeben';

    }


    public function getHtml()
    {

        $this->site = clone(DraftReleaseSite::$site);
        $this->site->addParameter(new WorkflowParameter($this->workflowId));

        return parent::getHtml();

    }

}