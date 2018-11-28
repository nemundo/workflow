<?php
namespace Nemundo\Workflow\App\Store\Data\TextStore;
use Nemundo\Model\Id\AbstractModelIdValue;
class TextStoreId extends AbstractModelIdValue {
/**
* @var TextStoreModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextStoreModel();
}
}