<?php
namespace Nemundo\Workflow\App\Favorite\Data\Favorite;
class Favorite extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var FavoriteModel
*/
protected $model;

/**
* @var string
*/
public $contentTypeId;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $userId;

public function __construct() {
parent::__construct();
$this->model = new FavoriteModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$id = parent::save();
return $id;
}
}