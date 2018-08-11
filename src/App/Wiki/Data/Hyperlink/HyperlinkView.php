<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
use Nemundo\Model\View\ModelView;
class HyperlinkView extends ModelView {
/**
* @var HyperlinkModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new HyperlinkModel();
}
}