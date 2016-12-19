<?php
class Utilities
{

    public static function sanitizeFilter($str) {
        return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5 );
    }


    public static function isEmail($string) {
        // $email_pattern = "/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/"; // easy pattern
        $email_pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/"; // more complicate pattern
        if (preg_match($email_pattern, $string)) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAge($string) {
        if (!is_numeric($string)) {
            return false;
        } else if (is_numeric($string) && ($string >= "80" || $string <= "13" || $string === "0")){
            return false;
        }  else if (is_numeric($string) && $string >= "14" && $string <= "79" && $string !== "0")
        {
            return true;
        }
    }

    public static function isUser($string)
    {
        if(preg_match('/^[a-zA-Z0-9]{3,}$/', $string)) {
            return true;
        }
        return false;
    }
    public static function isEmptyString($string) {
        if (strlen(trim($string)) === 0) {
            return true;
        } else {
            return false;
        }
    }
    public static function isPassword($password) {
        if (preg_match('/^(?=[^A-Z]*[A-Z])(?=[^a-z]*[a-z])(?=\D*\d).{5,}$/', $password))
        {
            return true;
        }
        return false;
    }

    public static function isSex($sex) {
        if ($sex == "male" || $sex == "female") {
            return true;
        }
        return false;
    }
}
