<?php
namespace Nemundo\Workflow\App\Wiki\Data\TextList;
use Nemundo\Model\View\ModelView;
class TextListView extends ModelView {
/**
* @var TextListModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TextListModel();
}
}