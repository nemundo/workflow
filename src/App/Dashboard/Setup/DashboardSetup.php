<?php

namespace Nemundo\Workflow\App\Dashboard\Setup;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Language\Translation;
use Nemundo\Workflow\App\Dashboard\Data\DashboardContentType\DashboardContentType;
use Nemundo\Workflow\App\Dashboard\Data\Widget\Widget;
use Nemundo\Workflow\App\Dashboard\Data\Widget\WidgetDelete;

// WidgetSetup
class DashboardSetup extends AbstractBaseClass
{


    public function addWidget(AbstractAdminWidget $widget) {


        if ($widget->widgetId == null) {
            (new Debug())->write('WidgetId is Null: '.$widget->getClassName());
        }

        $data = new Widget();
        $data->updateOnDuplicate=true;
        $data->id = $widget->widgetId;
        $data->widget = (new Translation())->getText( $widget->widgetTitle);
        $data->phpClass = $widget->getClassName();
        $data->save();

        return $this;

    }


    public function resetDashboard() {

        (new WidgetDelete())->delete();

    }

}