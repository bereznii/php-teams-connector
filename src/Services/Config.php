<?php

namespace Bereznii\TeamsConnector\Services;

use Bereznii\TeamsConnector\Exceptions\ConfigFileNotFoundException;

/**
 * Class Config
 * @package Bereznii\TeamsConnector\Services
 */
class Config
{
    /**
     * @var string config file name
     */
    const CONFIG_FILE_NAME = "teams";

    /**
     * @var array
     */
    private $config;

    /**
     * Config constructor.
     *
     * @throws ConfigFileNotFoundException
     */
    public function __construct()
    {
        $configPath = $this->configurationPath();

        $config_file = $configPath . '/' . self::CONFIG_FILE_NAME . '.php';

        if (!file_exists($config_file)) {
            throw new ConfigFileNotFoundException();
        }

        $this->config = require $config_file;
    }

    /**
     * Return the correct config directory path.
     *
     * @return  mixed|string
     */
    private function configurationPath()
    {
        // the config file of the package directory
        $config_path = __DIR__ . '/../Config';

        // check if this laravel specific function `config_path()` exist (means this package is used inside
        // a laravel framework). If so then load then try to load the laravel config file if it exist.
        if (function_exists('config_path')) {
            $config_path = config_path();
        }

        return $config_path;
    }

    /**
     * Return specific value from config array if key is given,
     * whole array otherwise.
     *
     * @param string|null $key
     * @return mixed
     */
    public function get(string $key = null)
    {
        if (isset($key)) {
            return $this->config[$key];
        }

        return $this->config;
    }
}
