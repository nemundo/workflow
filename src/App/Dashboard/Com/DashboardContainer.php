<?php

namespace Nemundo\Workflow\App\Dashboard\Com;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Workflow\App\Dashboard\Data\UserWidget\UserWidgetReader;
use Nemundo\Workflow\App\Dashboard\Data\Widget\WidgetReader;

class DashboardContainer extends AbstractHtmlContainer
{

    public function getContent()
    {

        $reader = new UserWidgetReader();
        $reader->model->loadWidget();
        $reader->filter->andEqual($reader->model->userId,(new UserSessionType())->userId);
        foreach ($reader->getData() as $userWidgetRow) {
            $widget = $userWidgetRow->widget->getPhpClassObject();
            $this->addContainer($widget);
        }

        return parent::getContent();

    }

}