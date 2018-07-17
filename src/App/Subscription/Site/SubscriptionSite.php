<?php

namespace Nemundo\Workflow\App\Subscription\Site;

use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\User\Information\UserInformation;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Subscription\Data\Subscription\Subscription;
use Nemundo\Workflow\Parameter\DataIdParameter;

class SubscriptionSite extends AbstractSite
{

    /**
     * @var SubscriptionSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Subscription';
        $this->url = 'subscription';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        SubscriptionSite::$site = $this;
    }


    public function loadContent()
    {

        $data = new Subscription();
        $data->contentTypeId = (new ContentTypeParameter())->getValue();
        $data->dataId = (new DataIdParameter())->getValue();
        $data->userId = (new UserInformation())->getUserId();
        $data->save();

        (new UrlReferer())->redirect();

    }

}