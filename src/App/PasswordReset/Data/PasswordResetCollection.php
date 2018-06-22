<?php
namespace Nemundo\Workflow\App\PasswordReset\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class PasswordResetCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest\PasswordResetRequestModel());
}
}