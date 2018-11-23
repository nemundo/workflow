<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
class UserConfigRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var UserConfigModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $userConfig;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->userConfig = $this->getModelValue($model->userConfig);
}
}