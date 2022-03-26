<?php
# TIMEZONE SETUP
date_default_timezone_set('America/Bogota');
# COMPOSE MAGIC
require_once 'vendor\autoload.php';
# IMPORT MONOLOG
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\LineFormatter;

# MAIN CLASS
class Binnacle{
        
    function register($type) {

        # VARIABLES
        $app_name = 'MAPS';
        $dir = 'storage/monolog/'. date('Ym') .'/'. date('YmdH') .'.log';
    
        $log = new Logger($app_name);
        $formatter = new LineFormatter(null, null, false, true);
        $noticeHandler = new StreamHandler($dir, Logger::NOTICE);
        $noticeHandler->setFormatter($formatter);    
        $log->pushHandler($noticeHandler);

        switch ($type) {

            case 'notice':
                echo "Notice Logged Successfully \n";
                $log->notice('Notice in event');
                break;

            case 'warning':
                echo "Warning Logged Successfully \n";
                $log->warning('Warning in event');
                break;

            case 'error':
                echo "Error Logged Successfully \n";
                $log->error('Error in event');
                break;
            
            default:
                break;
        }
        
    }
    
}




