<?php

namespace Nemundo\Workflow\App\Survey\Type;


use Nemundo\App\Content\Type\AbstractSequenceContentType;

class SurveyTypeContentType extends AbstractSequenceContentType
{

    protected function loadData()
    {

        $this->name = 'Survey';
        $this->id = 'd2f1ea0a-a3a2-4dcd-85bb-57edbe182969';

        $this->startContentType = new UmfrageStartType();

    }






}