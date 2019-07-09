<?php

namespace Nemundo\Workflow\App\Dashboard\Com;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\JqueryUi\Sortable\JquerySortable;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Workflow\App\Dashboard\Data\UserWidget\UserWidgetReader;
use Nemundo\Workflow\App\Dashboard\Data\Widget\WidgetReader;
use Nemundo\Workflow\App\Dashboard\Site\DashboardSortableSite;


// JquerySortableDiv
// AbstractSortableSite

class DashboardContainer extends JquerySortable  // AbstractHtmlContainer
{



    public function getContent()
    {


        $this->tagName='div';
        $this->id = 'dashboard';

$this->sortableSite = DashboardSortableSite::$site;

        $reader = new UserWidgetReader();
        $reader->model->loadWidget();
        $reader->filter->andEqual($reader->model->userId,(new UserSessionType())->userId);
        $reader->addOrder($reader->model->itemOrder);
        foreach ($reader->getData() as $userWidgetRow) {
            $widget = $userWidgetRow->widget->getPhpClassObject();

            $this->addContainer($widget);
        }

        return parent::getContent();

    }

}