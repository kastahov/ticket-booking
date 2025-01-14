<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api/centrifugo/v1/message.proto

namespace Spiral\Shared\Services\Centrifugo\v1\DTO;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>api.centrifugo.v1.dto.Int32Value</code>
 */
class Int32Value extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 value = 1;</code>
     */
    protected $value = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $value
     * }
     */
    public function __construct($data = NULL) {
        \Spiral\Shared\Services\Centrifugo\v1\GPBMetadata\Message::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 value = 1;</code>
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Generated from protobuf field <code>int32 value = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkInt32($var);
        $this->value = $var;

        return $this;
    }

}

