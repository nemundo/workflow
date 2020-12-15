<?php

namespace Nemundo\Workflow\App\Subscription\Site\Delete;

use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Workflow\App\Subscription\Data\Subscription\SubscriptionDelete;
use Nemundo\Workflow\App\Subscription\Parameter\SubscriptionParameter;

class MySubscriptionDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var MySubscriptionDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'my-subscription-delete';
        //$this->menuActive = false;
    }


    protected function registerSite()
    {
      MySubscriptionDeleteSite::$site = $this;
    }


    public function loadContent()
    {

        (new SubscriptionDelete())->deleteById((new SubscriptionParameter())->getValue());
        (new UrlReferer())->redirect();

    }

}