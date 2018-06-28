<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
use Nemundo\Model\Site\AbstractModelAdminSite;
class StreamGroupAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var StreamGroupModel
*/
public $model;

protected function loadSite() {
$this->model = new StreamGroupModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}