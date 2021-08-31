<?php

namespace app\common\log;

use Yii;
use yii\helpers\VarDumper;
use yii\log\FileTarget;
use yii\log\Logger;

class AppLogTarget extends FileTarget
{

    public $microtime = true;

    /**
     * 格式化日志格式
     *
     * @param array $message
     *
     * @return string
     */
    public function formatMessage($message): string
    {
        list($text, $level, $category, $timestamp) = $message;
        $level = Logger::getLevelName($level);
        if (!is_string($text)) {
            if ($text instanceof \Throwable || $text instanceof \Exception) {
                $text = (string)$text;
            } else {
                $text = VarDumper::export($text);
            }
        }
        $basePathArray = explode(DIRECTORY_SEPARATOR, Yii::$app->basePath);
        $end           = array_pop($basePathArray);
        $extra         = [
            'file' => 'UNKNOWN',
            'line' => 0,
        ];
        if (isset($message[4]) && (is_array($message[4]) || is_object($message[4]))) {
            foreach ($message[4] as $trace) {
                $extra = [
                    'file' => $end . str_replace(Yii::$app->basePath, '', $trace['file']),
                    'line' => $trace['line'] ?? 0,
                ];
            }
        }
        return sprintf("%s %s %s:%s %s - %s", $this->getTime($timestamp), strtoupper($level), basename($extra['file']),
            $extra['line'], Yii::$app->params['traceId'] ?? uniqid(), $text);
    }
}
