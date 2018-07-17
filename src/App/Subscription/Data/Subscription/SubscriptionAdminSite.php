<?php
namespace Nemundo\Workflow\App\Subscription\Data\Subscription;
use Nemundo\Model\Site\AbstractModelAdminSite;
class SubscriptionAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var SubscriptionModel
*/
public $model;

protected function loadSite() {
$this->model = new SubscriptionModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}