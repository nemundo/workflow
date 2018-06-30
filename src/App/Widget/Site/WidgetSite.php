<?php

namespace Nemundo\Workflow\App\Widget\Site;


use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Widget\Data\Widget\WidgetListBox;
use Nemundo\Workflow\App\Widget\Data\Widget\WidgetReader;
use Nemundo\Workflow\App\Widget\Data\WidgetType\WidgetTypeReader;
use Nemundo\Workflow\App\Widget\Parameter\WidgetParameter;


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


        $form = new SearchForm($page);

        $widgetListBox = new WidgetListBox($form);
        $widgetListBox->name = (new WidgetParameter())->getParameterName();
        $widgetListBox->submitOnChange = true;
        $widgetListBox->value = $widgetListBox->getValue();


        if ($widgetListBox->getValue() !== '') {


            $widgetRow = (new WidgetReader())->getRowById($widgetListBox->getValue());

            $widget = $widgetRow->getWidgetClassObject();
            $page->addCom($widget);


        }


        $page->render();


    }

}