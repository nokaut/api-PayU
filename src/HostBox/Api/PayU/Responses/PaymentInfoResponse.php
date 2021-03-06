<?php

namespace HostBox\Api\PayU\Responses;

use DateTime;


class PaymentInfoResponse extends Response
{

	const
		STATUS_NEW = 1,
		STATUS_CANCELLED = 2,
		STATUS_REJECTED = 3,
		STATUS_STARTED = 4,
		STATUS_AWAITING_COLLECTION = 5,
		STATUS_REJECT_DONE = 7,
		STATUS_ENDED = 99,
		STATUS_UNKNOWN = 888;


	/** @var int */
	protected $id;

	/** @var string */
	protected $orderId;

	/** @var number */
	protected $amount;

	/** @var string */
	protected $status;

	/** @var string */
	protected $payType;

	/** @var string */
	protected $payGwName;

	/** @var string */
	protected $desc;

	/** @var string */
	protected $desc2;

	/** @var DateTime */
	protected $create;

	/** @var DateTime */
	protected $init;

	/** @var DateTime */
	protected $sent;

	/** @var DateTime */
	protected $recv;

	/** @var DateTime */
	protected $cancel;

	/** @var string */
	protected $authFraud;


	/** @return number */
	public function getAmount()
	{
		return $this->amount;
	}

	/** @return string */
	public function getAuthFraud()
	{
		return $this->authFraud;
	}

	/** @return DateTime */
	public function getCancel()
	{
		return $this->cancel;
	}

	/** @return DateTime */
	public function getCreate()
	{
		return $this->create;
	}

	/** @return string */
	public function getDesc()
	{
		return $this->desc;
	}

	/** @return string */
	public function getDesc2()
	{
		return $this->desc2;
	}

	/** @return int */
	public function getId()
	{
		return $this->id;
	}

	/** @return DateTime */
	public function getInit()
	{
		return $this->init;
	}

	/** @return string */
	public function getOrderId()
	{
		return $this->orderId;
	}

	/** @return string */
	public function getPayGwName()
	{
		return $this->payGwName;
	}

	/** @return string */
	public function getPayType()
	{
		return $this->payType;
	}

	/** @return DateTime */
	public function getRecv()
	{
		return $this->recv;
	}

	/** @return DateTime */
	public function getSent()
	{
		return $this->sent;
	}

	/** @return string */
	public function getStatus()
	{
		return $this->status;
	}

	/** @inheritdoc */
	public function isSigValid($key2)
	{
		return ($this->getSig() == md5($this->getPosId() . $this->getSessionId() . $this->getOrderId() .
				$this->getStatus() . $this->getAmount() . $this->getDesc() . $this->getTs() . $key2)
		);
	}

}
