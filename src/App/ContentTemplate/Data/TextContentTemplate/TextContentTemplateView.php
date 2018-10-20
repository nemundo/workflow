<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
use Nemundo\Model\View\ModelView;
class TextContentTemplateView extends ModelView {
/**
* @var TextContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TextContentTemplateModel();
}
}