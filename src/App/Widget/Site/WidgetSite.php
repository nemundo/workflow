<?php

namespace Nemundo\Workflow\App\Widget\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Widget\Data\WidgetType\WidgetTypeReader;

class WidgetSite extends AbstractSite
{


    protected function loadSite()
    {

        $this->title = 'Widget';
        $this->url = 'widget';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $reader = new WidgetTypeReader();

        foreach ($reader->getData() as $widgetTypeRow) {

            $widget = $widgetTypeRow->getWidgetTypeClassObject();

            $page->addCom($widget);


        }


        $page->render();



    }

}