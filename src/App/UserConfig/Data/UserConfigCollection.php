<?php
namespace Nemundo\Workflow\App\UserConfig\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class UserConfigCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\UserConfig\Data\UserConfigText\UserConfigTextModel());
$this->addModel(new \Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId\UserConfigUniqueIdModel());
$this->addModel(new \Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber\UserConfigNumberModel());
$this->addModel(new \Nemundo\Workflow\App\UserConfig\Data\UserConfig\UserConfigModel());
$this->addModel(new \Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo\UserConfigYesNoModel());
}
}