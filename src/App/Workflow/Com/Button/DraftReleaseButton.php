<?php

namespace Nemundo\Workflow\App\Workflow\Com\Button;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Parameter\RedirectParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;
use Nemundo\Workflow\App\Workflow\Site\DraftReleaseSite;

class DraftReleaseButton extends AdminButton
{

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    public function getHtml()
    {

        $this->content = 'Entwurf freigeben';
        $this->site = clone(DraftReleaseSite::$site);
        $this->site->addParameter(new WorkflowParameter($this->workflowId));

        /*
        if ($this->redirectSite !== null) {
            $this->site->addParameter(new RedirectParameter($this->redirectSite->getUrl()));
        }*/

        return parent::getHtml();

    }

}