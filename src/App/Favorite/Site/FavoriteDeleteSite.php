<?php

namespace Nemundo\Workflow\App\Favorite\Site;

use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Design\FontAwesome\Icon\DeleteIcon;
use Nemundo\Design\FontAwesome\Site\AbstractIconSite;
use Nemundo\User\Information\UserInformation;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Favorite\Data\Favorite\FavoriteDelete;
use Nemundo\Workflow\App\Favorite\Parameter\FavoriteParameter;
use Nemundo\Workflow\App\Subscription\Data\Subscription\Subscription;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Workflow\App\Subscription\Data\Subscription\SubscriptionDelete;

class FavoriteDeleteSite extends AbstractIconSite
{

    /**
     * @var FavoriteDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->icon = new DeleteIcon();
        $this->url = 'favorite-delete';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        FavoriteDeleteSite::$site = $this;
    }


    public function loadContent()
    {


        (new FavoriteDelete())->deleteById((new FavoriteParameter())->getValue());


        /*$delete = new FavoriteDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, (new ContentTypeParameter())->getValue());
        $delete->filter->andEqual($delete->model->dataId, (new DataIdParameter())->getValue());
        $delete->filter->andEqual($delete->model->userId, (new UserInformation())->getUserId());
        $delete->delete();*/

        (new UrlReferer())->redirect();

    }

}