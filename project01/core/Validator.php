<?php

namespace Core;

use Exception;
use Core\Databases\DB;
use Core\Interfaces\ValidatorInterface;

class Validator implements ValidatorInterface
{
    private $messages = [];
    private static $self = null;

    public static function make($request, $rules, $messages, $attributes = [])
    {
        self::$self = new self();

        try {
            if (!empty($request) && is_array($request)) {

                if (!empty($rules)) {
                    foreach ($rules as $field => $ruleList) {
                        $ruleListArr = array_filter(explode('|', $ruleList));
                        if (!empty($ruleListArr)) {
                            foreach ($ruleListArr as $ruleItem) {

                                $ruleValue = null;

                                if (strpos($ruleItem, ':')!==false) {
                                    $ruleItemArr = array_filter(explode(':', $ruleItem));
                                    $ruleName = $ruleItemArr[0];
                                    $ruleValue = $ruleItemArr[1];
                                } else {
                                    $ruleName = $ruleItem;
                                }

                                //Xử lý rule required
                                if ($ruleName == 'required') {
                                    if (isset($request[$field]) && $request[$field] == '') {
                                        self::$self->setMessages($messages[$ruleName], $field, $attributes);
                                    }
                                }

                                if ($ruleName == 'min' && !empty($ruleValue)) {
                                    if (isset($request[$field]) && mb_strlen($request[$field], 'UTF-8') < $ruleValue) {
                                        self::$self->setMessages($messages[$ruleName], $field, $attributes, [
                                            ':min' => $ruleValue
                                        ]);
                                    }
                                }

                                if ($ruleName == 'max' && !empty($ruleValue)) {
                                    if (isset($request[$field]) && mb_strlen($request[$field], 'UTF-8') > $ruleValue) {
                                        self::$self->setMessages($messages[$ruleName], $field, $attributes, [
                                            ':max' => $ruleValue
                                        ]);
                                    }
                                }

                                if ($ruleName == 'email') {
                                    if (isset($request[$field]) && !filter_var($request[$field], FILTER_VALIDATE_EMAIL)) {
                                        self::$self->setMessages($messages[$ruleName], $field, $attributes);
                                    }
                                }

                                if ($ruleName == 'same' && !empty($ruleValue)) {
                                    if (isset($request[$field]) && isset($request[$ruleValue]) && $request[$ruleValue]!=$request[$field]) {
                                        self::$self->setMessages($messages[$ruleName], $field, $attributes, [
                                            ':same' => $attributes[$ruleValue] ?? $ruleValue
                                        ]);
                                    }
                                }

                                if ($ruleName == 'unique' && !empty($ruleValue) && isset($request[$field])) {
                                    $ruleValueArr = array_filter(explode(',', $ruleValue));
                                    if (!empty($ruleValueArr[0]) && !empty($ruleValueArr[1])) {
                                        $tableName = $ruleValueArr[0];
                                        $fieldName = $ruleValueArr[1];

                                        $sql = "SELECT * FROM $tableName WHERE $fieldName=?";

                                        $data  = [$request[$field]];



                                        if ($ruleValueArr[2]) {
                                            $ignoreValue = $ruleValueArr[2];

                                            $connection = config('database.connection_default');

                                            $config = config('database.'.$connection);


                                            $row = DB::first("SELECT GROUP_CONCAT(COLUMN_NAME) as `primary`
                                            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                                            WHERE
                                              TABLE_SCHEMA = '".$config['db_name']."'
                                              AND CONSTRAINT_NAME='PRIMARY'
                                              AND TABLE_NAME='$tableName'
                                            GROUP BY TABLE_NAME LIMIT 1");

                                            if (!empty($row)) {
                                                $primaryKey = $row['primary'];
                                            }


                                            $sql.=" AND $primaryKey != ?";
                                            $data[] = $ignoreValue;
                                        }

                                        $count = DB::count($sql, $data);

                                        if ($count > 0) {
                                            self::$self->setMessages($messages[$ruleName], $field, $attributes);
                                        }
                                    }
                                }
                            }
                        }
                    }

                    //Xử lý gán message cho session
                    if (!empty(self::$self->messages)) {
                        Session::put('validate_errors', self::$self->messages);

                        Session::put('validate_old', $request);
                    }


                }

            } else {
                throw new Exception('$request không đúng định dạng');
            }
        } catch(Exception $exception) {
            echo $exception->getMessage();
            die();
        }
        return self::$self;
    }

    public function passes()
    {
        return $this->isValidate();
    }

    public function fails()
    {
        return !$this->isValidate();
    }

    private function setMessages($messageTemplate, $field, $attributes, $variables = [])
    {
        $fieldTitle = !empty($attributes[$field]) ? $attributes[$field] : $field;
        $messageTemplate = str_replace(':attribute', $fieldTitle, $messageTemplate);
        if (!empty($variables)) {
            foreach ($variables as $key => $value) {
                $messageTemplate = str_replace($key, $value, $messageTemplate);
            }
        }
        self::$self->messages[$field][] = $messageTemplate;
    }

    private function isValidate()
    {
        return empty($this->messages);
    }

    public static function putError($field, $message)
    {
        self::$self->messages[$field][] = $message;

        Session::put('validate_errors', self::$self->messages);
    }
}
