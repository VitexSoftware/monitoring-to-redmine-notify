<?php

namespace Icinga\Notifier;

use Icinga\Notifier\Client;

require_once dirname(__DIR__).'/vendor/autoload.php';

$target = getenv('ICINGA_CONTACTADDRESS1');

if(empty($target)){
    die("Set ICINGA_CONTACTADDRESS1 enviroment variable to Redmine URL  https://access@server?project=projectname\n");
}
    
$client = new Client($target);


$result = $client->issue->create([
    'project_id' => $client->project,
    'subject' => getenv('ICINGA_HOSTCHECKCOMMAND').' '.getenv('ICINGA_HOSTALIAS'),
    'description' => getenv('ICINGA_HOSTOUTPUT')
    ]);
