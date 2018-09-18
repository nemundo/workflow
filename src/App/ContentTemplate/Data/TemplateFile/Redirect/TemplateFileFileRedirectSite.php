<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile\Redirect;
class TemplateFileFileRedirectSite extends \Nemundo\Model\Redirect\AbstractRedirectFilenameSite {
public function loadSite() {
parent::loadSite();
$this->url = "content-template-templatefile-file-redirect";
$this->model = new  \Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile\TemplateFileModel();
$this->type = $this->model->file;
}
public function registerSite() {
TemplateFileRedirectConfig::$redirectTemplateFileFileSite = $this;
}
}