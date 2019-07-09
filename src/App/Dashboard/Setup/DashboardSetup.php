<?php

namespace Nemundo\Workflow\App\Dashboard\Setup;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\App\Dashboard\Data\DashboardContentType\DashboardContentType;
use Nemundo\Workflow\App\Dashboard\Data\Widget\Widget;

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
        $data->widget = $widget->widgetTitle;
        $data->phpClass = $widget->getClassName();
        $data->save();

        return $this;

    }



    /*
    public function addContentType(AbstractContentType $contentType)
    {

        $setup = new ContentTypeSetup();
        $setup->addContentType($contentType);


        $data = new DashboardContentType();
        $data->ignoreIfExists = true;
        $data->contentTypeId = $contentType->contentId;
        $data->save();

    }


    public function removeContentType(AbstractContentType $contentType)
    {

    }*/


}