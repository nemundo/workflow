<?php

namespace Nemundo\Workflow\App\UserConfig\Config;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractUserConfig extends AbstractBase
{

    /**
     * @var string
     */
    public $configId;

    /**
     * @var string|string[]
     */
    public $configLabel;

    /**
     * @var string
     */
    protected $defaultValue;


    abstract protected function loadUserConfig();

    abstract public function setValue($value);

    abstract public function getValue();

    public function __construct()
    {
        $this->loadUserConfig();
    }


}