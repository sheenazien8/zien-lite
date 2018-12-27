<?php
include_once 'irequest.php';
class Request implements IRequest
{
    function __construct()
    {
        dump('construct request');
        $this->bootstrapSelf();
    }
    private function bootstrapSelf()
    {
        dump('bootstrapSelf');
        foreach($_SERVER as $key => $value){
            $this->{$this->toCamelCase($key)} = $value;
        }
    }

    private function toCamelCase($string)
    {
        $result = strtolower($string);

        preg_match_all('/_[a-z]/', $result, $matches);
        foreach($matches[0] as $match){
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }
        return $result;
    }

    public function getBody()
    {

    }
}
/*
    user

    home

    http_cache_control

    http_pragma

    http_upgrade_insecure_requests

    http_cookie

    http_connection

    http_accept_encoding

    http_accept_language

    http_accept

    http_user_agent

    http_host

    redirect_status

    server_name

    server_port

    server_addr

    remote_port

    remote_addr

    server_software

    gateway_interface

    request_scheme

    server_protocol

    document_root

    document_uri

    request_uri

    script_name

    script_filename

    content_length

    content_type

    request_method

    query_string

    fcgi_role

    php_self

    request_time_float

    request_time
*/
