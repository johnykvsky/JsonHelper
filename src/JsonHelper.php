<?php

namespace johnykvsky\Utils;

class JsonHelper
{

    /**
     * Json encode/decode error messages
     *
     * @var array
     */
    protected static $messages = array(
        JSON_ERROR_NONE => 'No error has occurred',
        JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded',
        JSON_ERROR_STATE_MISMATCH => 'Invalid or malformed JSON',
        JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
        JSON_ERROR_SYNTAX => 'Syntax error',
        JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded'
    );

    /**
     * Encode data to json
     *
     * @param mixed $value Data to be encoded
     * @param mixed $options Json constants
     *
     * @return string|\Exception
     * @throws \Exception
     */
    public static function encode($value, $options = 0)
    {
        $result = json_encode($value, $options);

        $lastError = json_last_error();

        if ($lastError === JSON_ERROR_NONE) {
            return $result;
        }

        throw new \Exception(static::$messages[$lastError]);
    }

    /**
     * Decode from Json
     *
     * @param string $json Json string to be decoded
     * @param bool $assoc Should objects be converted to associative arrays
     *
     * @return mixed
     * @throws \Exception
     */
    public static function decode($json, $assoc = true)
    {
        if (!is_string($json)) {
            throw new \Exception(static::$messages[JSON_ERROR_STATE_MISMATCH]);
        }

        $result = json_decode($json, $assoc);

        $lastError = json_last_error();

        if ($lastError === JSON_ERROR_NONE) {
            return $result;
        }

        throw new \Exception(static::$messages[$lastError]);
    }

    /**
     * @param string $strJson JSON to be validated
     *
     * @return bool
     */
    public static function isValidJson($strJson)
    {
        if (!is_string($strJson)) {
            return false;
        }

        \json_decode($strJson);
        return (\json_last_error() === JSON_ERROR_NONE);
    }

    /**
     * @param string|array $item Data to replace lines
     *
     * @return bool
     */
    public static function convertNewLinesToCRLF($item)
    {
        if (is_string($item)) {
            return static::replaceNewLines($item);
        }

        if (is_array($item)) {
            array_walk_recursive($item, function (&$value, &$key) {
                if (is_string($key)) {
                    $key = static::replaceNewLines($key);
                }

                if (is_string($value)) {
                    $value = static::replaceNewLines($value);
                }
            });
        }

        return $item;
    }

    /**
     * @param string $string String for replacing new lines
     *
     * @return string
     */
    public static function replaceNewLines($string)
    {
        return preg_replace('~\R~u', "\r\n", $string);
    }
}
