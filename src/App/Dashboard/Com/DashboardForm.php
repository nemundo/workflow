<?php

namespace Nemundo\Workflow\App\Dashboard\Com;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBoxGroup;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Workflow\App\Dashboard\Data\UserWidget\UserWidget;
use Nemundo\Workflow\App\Dashboard\Data\UserWidget\UserWidgetCount;
use Nemundo\Workflow\App\Dashboard\Data\UserWidget\UserWidgetDelete;
use Nemundo\Workflow\App\Dashboard\Data\Widget\WidgetReader;

class DashboardForm extends BootstrapForm
{

    /**
     * @var BootstrapCheckBoxGroup
     */
    private $widgetGroup;

    public function getContent()
    {

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = 'Widget';


        $userId = (new UserSessionType())->userId;

        $this->widgetGroup = new BootstrapCheckBoxGroup($this);

        $reader = new WidgetReader();
        $reader->addOrder($reader->model->widget);
        foreach ($reader->getData() as $widgetRow) {

            $checked=false;

            $count  =new UserWidgetCount();
            $count->filter->andEqual($count->model->widgetId,$widgetRow->id);
            $count->filter->andEqual($count->model->userId,$userId);

            if ($count->getCount() == 1) {
                $checked=true;
            }

            $this->widgetGroup->addItem($widgetRow->id, $widgetRow->widget,$checked);


        }


        return parent::getContent();

    }


    protected function onSubmit()
    {

        $userId = (new UserSessionType())->userId;

        $delete = new UserWidgetDelete();
        $delete->filter->andEqual($delete->model->userId, $userId);
        $delete->delete();


        foreach ($this->widgetGroup->getValueList() as $value) {

            $data = new UserWidget();
            $data->userId = $userId;
            $data->widgetId = $value;
            $data->save();

        }


    }

}