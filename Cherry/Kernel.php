<?php

namespace Cherry;

use Cherry\Routing\Router;

class Kernel
{
    private $_appRoot;

    public $router;
    public $logger;

    public function __construct($appRoot)
    {
        define('__ROOT__', $appRoot);

        $this->_appRoot = __ROOT__;

        $this->run();
    }

    public function run()
    {
        $this->_readConfig();

        $this->router = new Router();
        $this->logger = new Logger('app', LOGS_PATH);
    }

    private function _getConfig()
    {
        $config = file_get_contents(__ROOT__ . '/config/config.json')
            or die("Unable to open config file!");

        return json_decode($config, 1);
    }

    private function _validateConfig(array $config)
    {
        $neededKeys = [
            'ROUTES_FILE',
            'CONTROLLERS_PATH',
            'TEMPLATES_PATH',
            'LOGS_PATH'
        ];

        foreach ($neededKeys as $k)
        {
            if (!isset($config[$k])) {
                die("Parameter \"{$k}\" don't found in config file!");
            }
        }
    }

    private function _readConfig()
    {
        $config = $this->_getConfig();

        $this->_validateConfig($config);

        foreach ($config as $k => $v)
            define($k, __ROOT__ . '/' . $v);
    }
}