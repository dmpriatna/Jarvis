<?php

class Request implements IRequest
{
    function __construct()
    {
        foreach($_SERVER as $key => $val) {
            $this->{$this->toCamelCase($key)} = $val;
        }
    }

    public function Body()
    {
        if($this->requestMethod == "GET") return;
        if($this->requestMethod == "POST") {
            $body = array();
            foreach($_POST as $key => $val) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            return $body;
        }
    }

    private function toCamelCase($source)
    {
        $result = strtolower($source);
        preg_match_all('/_[a-z]/', $result, $matches);
        foreach($matches[0] as $match) {
            $key = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $key, $result);
        }
        return $result;
    }
}

interface IRequest
{
    public function Body();
}
