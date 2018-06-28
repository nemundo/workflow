<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class StreamTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var StreamTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new StreamTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}