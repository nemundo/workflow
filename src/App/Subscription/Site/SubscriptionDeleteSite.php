<?php

namespace Nemundo\Workflow\App\Subscription\Site;

use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\User\Type\UserSession;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Workflow\App\Subscription\Data\Subscription\SubscriptionDelete;

class SubscriptionDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var SubscriptionDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'subscription-delete';
        //$this->menuActive = false;
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
        $delete->filter->andEqual($delete->model->userId, (new UserSession())->userId);
        $delete->delete();

        (new UrlReferer())->redirect();

    }

}