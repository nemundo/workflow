<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Dev\App\AbstractApp;
use Nemundo\User\Information\UserInformation;
use Schleuniger\App\Application\Parameter\ApplicationTypeParameter;
use Schleuniger\App\Application\Type\AbstractWorkflowApplication;
use Schleuniger\App\Notification\Data\Subscription\SubscriptionCount;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\WorkflowSubscriptionSite;
use Schleuniger\Com\Button\SchleunigerButton;

class SubscriptionButton extends AbstractHtmlContainerList
{

    /**
     * @var AbstractWorkflowApplication
     */
    public $applicationType;

    /**
     * @var string
     */
    public $workflowId;

    public function getHtml()
    {


        $count = new SubscriptionCount();
        $count->filter->andEqual($count->model->applicationTypeId, $this->applicationType->applicationId);
        $count->filter->andEqual($count->model->workflowId, $this->workflowId);
        $count->filter->andEqual($count->model->userId, (new UserInformation())->getUserId());

        if ($count->getCount() == 0) {
            $button = new SchleunigerButton($this);
            $button->content = 'Abonnieren';
            $button->site = WorkflowSubscriptionSite::$site;
            $button->site->addParameter(new WorkflowParameter($this->workflowId));
            $button->site->addParameter(new ApplicationTypeParameter($this->applicationType->applicationId));

        } else {
            $p = new Paragraph($this);
            $p->content = 'Du bist Abonnent';
        }



        return parent::getHtml();
    }

}