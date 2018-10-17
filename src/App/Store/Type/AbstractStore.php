<?php

namespace Nemundo\Workflow\App\Store\Type;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractStore extends AbstractBase
{

    /**
     * @var string
     */
    protected $storeId;

    /**
     * @var string
     */
    public $storeName;

    /**
     * @var string
     */
    protected $defaultValue;


    abstract protected function loadStore();

    abstract public function setValue($value);

    abstract public function getValue();

    public function __construct()
    {
        $this->loadStore();
    }


}