<?php

namespace App\Core;

// A class responsible for accessing request-related data.
class Request
{
    private $uri;
    private $method;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->setUri();
        $this->setMethod();

        // handle json requests as $_POST variables
        if (empty($_POST)) {
            $_POST = json_decode(file_get_contents("php://input"), true) ?: [];
        }
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    public function setUri(): void
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // check if app is installed in subfolder
        if (($appSubfolder = Helper::getAppSubfolder()) !== false) {
            $replaceString = $appSubfolder . '/';

            // remove the subfolder from $url path before navigating to route
            $url = str_replace($replaceString, '', $url);
        }

        // Requests to /foo?bar=12 should be
        // redirected to /foo
        $this->uri = trim(
            $url, '/'
        );
    }

    public function setMethod(): void
    {
        $this->method = $_SERVER['REQUEST_METHOD'];;
    }

    /**
     * Return param value from $_GET or $_POST or $otherWise provided as param, if they don't exist
     * @param string $paramName
     * @param null $otherWise
     * @return null|mixed
     */
    public function getParamValue(string $paramName, $otherWise = NULL)
    {
        if ($this->getMethod() == 'GET' && isset($_GET[$paramName])) {
            return $_GET[$paramName];
        } else if ($this->getMethod() != 'GET' && isset($_POST[$paramName])) {
            return $_POST[$paramName];
        } else {
            return $otherWise;
        }
    }
}