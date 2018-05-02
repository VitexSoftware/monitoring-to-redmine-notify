<?php
namespace Icinga\Notifier;
/**
 * Description of Client
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Client extends \Redmine\Client
{
    /**
     * Initial Project identifier
     * @var string 
     */
    public $project = null;

    public function __construct($url)
    {
        parent::__construct(parse_url($url, PHP_URL_SCHEME).'://'.parse_url($url, PHP_URL_HOST).  ( parse_url($url, PHP_URL_PORT) ?  ':'.parse_url($url, PHP_URL_PORT) : '' ) .parse_url($url, PHP_URL_PATH) , parse_url($url, PHP_URL_USER), parse_url($url, PHP_URL_PASS));
        $query = parse_url($url, PHP_URL_QUERY);
        if(strlen($query)){
            $params = parse_str($query, $result);
            if(array_key_exists('project', $result)){
                $this->project = $result['project'];
            }
        }
    }
    
    
    
}
