<?php
namespace Nemundo\Workflow\App\Dashboard\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class DashboardCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Dashboard\Data\UserWidget\UserWidgetModel());
$this->addModel(new \Nemundo\Workflow\App\Dashboard\Data\Widget\WidgetModel());
}
}