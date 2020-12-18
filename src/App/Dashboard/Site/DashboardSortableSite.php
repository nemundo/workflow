<?php

namespace Nemundo\Workflow\App\Dashboard\Site;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Request\Post\MultiplePostRequest;
use Nemundo\User\Type\UserSession;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Dashboard\Data\UserWidget\UserWidget;
use Nemundo\Workflow\App\Dashboard\Data\UserWidget\UserWidgetDelete;
use Nemundo\Workflow\App\Dashboard\Setup\DashboardUserSetup;

class DashboardSortableSite extends AbstractSite
{

    /**
     * @var DashboardSortableSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'sortable';
   $this->menuActive = false;

   DashboardSortableSite::$site=$this;

    }


    public function loadContent()
    {

        $userId = (new UserSession())->userId;

        $delete = new UserWidgetDelete();
        $delete->filter->andEqual($delete->model->userId, $userId);
        $delete->delete();

        $itemOrder=0;


        foreach ((new MultiplePostRequest('item'))->getValueList() as $value) {

            $data = new UserWidget();
            $data->ignoreIfExists = true;
            $data->userId = $userId;
            $data->widgetId = $value;
            $data->itemOrder=$itemOrder;
            $data->save();

            $itemOrder++;

        }


    }

}