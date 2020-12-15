<?php

namespace Nemundo\Workflow\App\Favorite\Site;

use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Workflow\App\Favorite\Data\Favorite\FavoriteDelete;
use Nemundo\Workflow\App\Favorite\Parameter\FavoriteParameter;

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
        $delete->filter->andEqual($delete->model->userId, (new UserSessionType())->userId);
        $delete->delete();*/

        (new UrlReferer())->redirect();

    }

}