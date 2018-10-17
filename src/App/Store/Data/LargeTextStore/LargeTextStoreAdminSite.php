<?php
namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;
use Nemundo\Model\Site\AbstractModelAdminSite;
class LargeTextStoreAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var LargeTextStoreModel
*/
public $model;

protected function loadSite() {
$this->model = new LargeTextStoreModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}