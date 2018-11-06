<?php
namespace Nemundo\Workflow\App\Subscription\Site;
use Nemundo\Web\Site\AbstractSite;
class CloudSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Cloud';
$this->url = 'cloud';
}
public function loadContent() {
}
}