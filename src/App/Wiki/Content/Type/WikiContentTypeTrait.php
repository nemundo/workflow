<?php


namespace Nemundo\Workflow\App\Wiki\Content\Type;


use Nemundo\Core\Debug\Debug;

trait WikiContentTypeTrait
{


    protected function saveWikiContent()
    {


        (new Debug())->write($this->dataId);

        exit;


    }


}