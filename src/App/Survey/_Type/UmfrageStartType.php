<?php

namespace Nemundo\Workflow\App\Survey\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Survey\Data\UmfrageStart\UmfrageStartModel;

class UmfrageStartType extends AbstractContentType
{

    protected function loadData()
    {

        $this->name = 'Umfrage Start';
        $this->id = '6fb1a0a6-0dc2-46a5-8c15-761e645e9198';
        $this->modelClass = UmfrageStartModel::class;


    }

}