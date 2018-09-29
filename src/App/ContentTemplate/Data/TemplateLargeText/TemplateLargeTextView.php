<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
use Nemundo\Model\View\ModelView;
class TemplateLargeTextView extends ModelView {
/**
* @var TemplateLargeTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TemplateLargeTextModel();
}
}