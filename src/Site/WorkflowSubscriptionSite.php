<?php

namespace Nemundo\Workflow\Site;


use Nemundo\User\Information\UserInformation;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Schleuniger\App\Application\Parameter\ApplicationTypeParameter;
use Schleuniger\App\Kvp\Notification\KvpApplicationType;
use Schleuniger\App\Kvp\Parameter\KvpParameter;
use Schleuniger\App\Notification\Data\Subscription\Subscription;
use Nemundo\Workflow\Parameter\WorkflowParameter;

class WorkflowSubscriptionSite extends AbstractSite
{

    /**
     * @var WorkflowSubscriptionSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'subscription';
        $this->menuActive = false;
    }

    protected function registerSite()
    {
        WorkflowSubscriptionSite::$site = $this;
    }


    public function loadContent()
    {

        $data = new Subscription();
        $data->userId = (new UserInformation())->getUserId();
        $data->applicationTypeId = (new ApplicationTypeParameter())->getValue();
        $data->workflowId = (new WorkflowParameter())->getValue();
        $data->save();

        (new UrlReferer())->redirect();

    }


}