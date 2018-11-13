<?php

namespace Nemundo\Workflow\App\Subscription\Site;

use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Subscription\Data\Subscription\Subscription;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Workflow\App\Subscription\Data\Subscription\SubscriptionDelete;

class SubscriptionDeleteSite extends AbstractSite
{

    /**
     * @var SubscriptionDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'subscription-delete';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        SubscriptionDeleteSite::$site = $this;
    }


    public function loadContent()
    {

        $delete = new SubscriptionDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, (new ContentTypeParameter())->getValue());
        $delete->filter->andEqual($delete->model->dataId, (new DataIdParameter())->getValue());
        $delete->filter->andEqual($delete->model->userId, (new UserSessionType())->userId);
        $delete->delete();

        (new UrlReferer())->redirect();

    }

}