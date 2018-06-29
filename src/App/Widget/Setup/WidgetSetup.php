<?php

namespace Nemundo\Workflow\App\Widget\Setup;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Widget\Data\WidgetType\WidgetType;

class WidgetSetup extends AbstractBase
{

    public function addWidget(AbstractAdminWidget $widget)
    {


        $data = new WidgetType();
        $data->updateOnDuplicate = true;
        $data->widgetTypeClass = $widget->getClassName();
        $data->save();

    }

}