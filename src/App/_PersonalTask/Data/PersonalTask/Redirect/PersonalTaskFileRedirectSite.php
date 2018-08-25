<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\Redirect;
class PersonalTaskFileRedirectSite extends \Nemundo\Model\Redirect\AbstractRedirectFilenameSite {
public function loadSite() {
parent::loadSite();
$this->url = "personal-task-personal-task-file-redirect";
$model = new \Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskModel();
$this->model = $model->file->getExternalModel();
$this->type = $this->model->file;
}
public function registerSite() {
PersonalTaskRedirectConfig::$redirectPersonalTaskFileSite = $this;
}
}