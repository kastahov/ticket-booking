<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api/centrifugo/v1/message.proto

namespace Spiral\Shared\Services\Centrifugo\v1\DTO;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>api.centrifugo.v1.dto.InvalidateUserTokensRequest</code>
 */
class InvalidateUserTokensRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int64 expire_at = 1;</code>
     */
    protected $expire_at = 0;
    /**
     * Generated from protobuf field <code>string user = 2;</code>
     */
    protected $user = '';
    /**
     * Generated from protobuf field <code>int64 issued_before = 3;</code>
     */
    protected $issued_before = 0;
    /**
     * Generated from protobuf field <code>string channel = 4;</code>
     */
    protected $channel = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $expire_at
     *     @type string $user
     *     @type int|string $issued_before
     *     @type string $channel
     * }
     */
    public function __construct($data = NULL) {
        \Spiral\Shared\Services\Centrifugo\v1\GPBMetadata\Message::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int64 expire_at = 1;</code>
     * @return int|string
     */
    public function getExpireAt()
    {
        return $this->expire_at;
    }

    /**
     * Generated from protobuf field <code>int64 expire_at = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setExpireAt($var)
    {
        GPBUtil::checkInt64($var);
        $this->expire_at = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string user = 2;</code>
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Generated from protobuf field <code>string user = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setUser($var)
    {
        GPBUtil::checkString($var, True);
        $this->user = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 issued_before = 3;</code>
     * @return int|string
     */
    public function getIssuedBefore()
    {
        return $this->issued_before;
    }

    /**
     * Generated from protobuf field <code>int64 issued_before = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setIssuedBefore($var)
    {
        GPBUtil::checkInt64($var);
        $this->issued_before = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string channel = 4;</code>
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Generated from protobuf field <code>string channel = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setChannel($var)
    {
        GPBUtil::checkString($var, True);
        $this->channel = $var;

        return $this;
    }

}

