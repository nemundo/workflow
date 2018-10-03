<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File\Redirect;
class FileFileRedirectSite extends \Nemundo\Model\Redirect\AbstractRedirectFilenameSite {
public function loadSite() {
parent::loadSite();
$this->url = "workflow-template-file-file-redirect";
$this->model = new  \Nemundo\Workflow\App\WorkflowTemplate\Data\File\FileModel();
$this->type = $this->model->file;
}
public function registerSite() {
FileRedirectConfig::$redirectFileFileSite = $this;
}
}