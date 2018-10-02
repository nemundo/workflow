<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
class NotificationFilter extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var NotificationFilterModel
*/
protected $model;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new NotificationFilterModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$id = parent::save();
return $id;
}
}