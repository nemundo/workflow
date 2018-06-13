<?php
namespace Nemundo\Workflow\App\Subscription\Install;
use Nemundo\App\Script\Type\AbstractScript;
class SubscriptionInstall extends AbstractScript {
protected function loadScript() {
$this->scriptName = "subscription-install";
$this->consoleScript= true;
}
public function run() {
}
}