<?php

namespace Nemundo\Workflow\App\Subscription\Site;

use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Subscription\Data\Subscription\Subscription;

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

        new SubscriptionDeleteSite($this);
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
        $data->userId = (new UserSessionType())->userId;
        $data->save();

        (new UrlReferer())->redirect();

    }

}