<?php
/**
 * Created by PhpStorm.
 * User: huanld
 * Date: 9/27/18
 * Time: 8:06 AM
 */

namespace Model;

class Atm
{
    public $id;
    public $targetId;
    public $sourceId;
    public $amount;
    public $content;
    public $datetime;
    public $success;

    public function __construct($id, $targetId, $sourceId, $amount, $content, $datetime, $success)
    {
        $this->id = $id;
        $this->targetId = $targetId;
        $this->sourceId = $sourceId;
        $this->amount = $amount;
        $this->content = $content;
        $this->datetime = $datetime;
        $this->success = $success;

    }

}