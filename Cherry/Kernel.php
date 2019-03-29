<?php
/**
 * The file contains application Kernel class.
 *
 * PHP version 5
 *
 * @category Library
 * @package  Cherry
 * @author   Temuri Takalandze <takalandzet@gmail.com>
 * @license  https://github.com/ABGEO07/cherry-core/blob/master/LICENSE MIT
 * @link     https://github.com/ABGEO07/cherry-core
 */

namespace Cherry;

use Cherry\Routing\Router;

/**
 * Application Kernel class.
 *
 * @category Library
 * @package  Cherry
 * @author   Temuri Takalandze <takalandzet@gmail.com>
 * @license  https://github.com/ABGEO07/cherry-core/blob/master/LICENSE MIT
 * @link     https://github.com/ABGEO07/cherry-core
 */
class Kernel
{
    private $_appRoot;

    public $router;
    public $logger;

    /**
     * Kernel constructor.
     *
     * @param string $appRoot Application root path.
     */
    public function __construct($appRoot)
    {
        define('__ROOT__', $appRoot);

        $this->_appRoot = __ROOT__;

        $this->run();
    }

    /**
     * Run application.
     *
     * @return void
     */
    public function run()
    {
        $this->_readConfig();

        $this->router = new Router();
        $this->logger = new Logger('app', LOGS_PATH);
    }

    /**
     * Read config from file.
     *
     * @return array
     */
    private function _getConfig()
    {
        $config = file_get_contents(__ROOT__ . '/config/config.json')
            or die("Unable to open config file!");

        return json_decode($config, 1);
    }

    /**
     * Check if needed keys isset in config file
     *
     * @param array $config Application Config
     *
     * @return void
     */
    private function _validateConfig(array $config)
    {
        $neededKeys = [
            'ROUTES_FILE',
            'CONTROLLERS_PATH',
            'TEMPLATES_PATH',
            'LOGS_PATH'
        ];

        foreach ($neededKeys as $k) {
            if (!isset($config[$k])) {
                die("Parameter \"{$k}\" don't found in config file!");
            }
        }
    }

    /**
     * Define application config values as constants.
     *
     * @return void
     */
    private function _readConfig()
    {
        $config = $this->_getConfig();

        $this->_validateConfig($config);

        foreach ($config as $k => $v) {
            define($k, __ROOT__ . '/' . $v);
        }
    }
}