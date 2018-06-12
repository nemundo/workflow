<?php
namespace Nemundo\Workflow\App\Subscription\Install;
use Nemundo\Dev\Script\AbstractScript;
class SubscriptionInstall extends AbstractScript {
protected function loadScript() {
$this->scriptName = "subscription-install";
$this->consoleScript= true;
}
public function run() {
}
}