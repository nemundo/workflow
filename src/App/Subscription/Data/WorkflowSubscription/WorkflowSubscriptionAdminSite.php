<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
use Nemundo\Model\Site\AbstractModelAdminSite;
class WorkflowSubscriptionAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var WorkflowSubscriptionModel
*/
public $model;

protected function loadSite() {
$this->model = new WorkflowSubscriptionModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}