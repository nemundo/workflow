<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate\Redirect;
class FileContentTemplateFileRedirectSite extends \Nemundo\Model\Redirect\AbstractRedirectFilenameSite {
public function loadSite() {
parent::loadSite();
$this->url = "content-template-filecontenttemplate-file-redirect";
$this->model = new  \Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate\FileContentTemplateModel();
$this->type = $this->model->file;
}
public function registerSite() {
FileContentTemplateRedirectConfig::$redirectFileContentTemplateFileSite = $this;
}
}