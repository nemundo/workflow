<?php
namespace Nemundo\Workflow\App\Stream\Data\Stream;
use Nemundo\Model\Site\AbstractModelAdminSite;
class StreamAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var StreamModel
*/
public $model;

protected function loadSite() {
$this->model = new StreamModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}