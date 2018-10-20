<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
use Nemundo\Model\View\ModelView;
class FileContentTemplateView extends ModelView {
/**
* @var FileContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new FileContentTemplateModel();
}
}