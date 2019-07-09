<?php

namespace Nemundo\Workflow\App\Dashboard\Setup;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Dashboard\Data\UserWidget\UserWidget;

class DashboardUserSetup extends AbstractBase
{

    /**
     * @var string
     */
    private $userId;

    public function __construct($userId)
    {
        $this->userId=$userId;
    }


    public function addWidget(AbstractAdminWidget $widget) {

        $data = new UserWidget();
        $data->ignoreIfExists=true;
        $data->userId = $this->userId;
$data->widgetId=$widget->widgetId;
$data->save();

return $this;

    }

}