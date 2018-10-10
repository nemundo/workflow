<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
use Nemundo\Model\View\ModelView;
class ContentTextView extends ModelView {
/**
* @var ContentTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ContentTextModel();
}
}