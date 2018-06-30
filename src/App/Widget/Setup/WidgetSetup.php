<?php

namespace Nemundo\Workflow\App\Widget\Setup;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Widget\Data\Widget\Widget;

class WidgetSetup extends AbstractBase
{

    public function addWidget(AbstractAdminWidget $widget)
    {


        $data = new Widget();
        $data->updateOnDuplicate = true;
        $data->widget = $widget->widgetTitle;
        $data->widgetClass = $widget->getClassName();
        $data->save();

    }

}