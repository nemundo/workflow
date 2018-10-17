<?php
namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;
use Nemundo\Model\View\ModelView;
class LargeTextStoreView extends ModelView {
/**
* @var LargeTextStoreModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new LargeTextStoreModel();
}
}