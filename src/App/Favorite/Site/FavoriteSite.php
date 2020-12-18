<?php

namespace Nemundo\Workflow\App\Favorite\Site;

use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\User\Type\UserSession;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Workflow\App\Favorite\Data\Favorite\Favorite;

class FavoriteSite extends AbstractSite
{

    /**
     * @var FavoriteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Favorite';
        $this->url = 'favorite';
        $this->menuActive = false;

        new FavoriteDeleteSite($this);
    }


    protected function registerSite()
    {
        FavoriteSite::$site = $this;
    }


    public function loadContent()
    {

        $data = new Favorite();
        $data->contentTypeId = (new ContentTypeParameter())->getValue();
        $data->dataId = (new DataIdParameter())->getValue();
        $data->userId = (new UserSession())->userId;
        $data->save();

        (new UrlReferer())->redirect();

    }

}