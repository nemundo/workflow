<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
use Nemundo\Model\Site\AbstractModelAdminSite;
class ProcessSubscriptionAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var ProcessSubscriptionModel
*/
public $model;

protected function loadSite() {
$this->model = new ProcessSubscriptionModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}