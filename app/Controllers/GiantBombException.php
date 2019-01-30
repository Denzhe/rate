<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 4/26/2016
 * Time: 6:00 PM
 */
class GiantBombException extends Exception {
    /**
     * Redefine the exception so message isn't optional
     *
     * @param $message  string    message to set in exception
     * @param $code     integer   error code
     * @param $previous Exception previous Exception to save
     *
     * @return void
     */
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }
    /**
     * convert exception to string
     *
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}