<?php

namespace TheCareerAcademy\Includes;

class Redis
{
	private static $instance = null;
	private $redis;

	private function __construct()
	{
		$this->redis = new \Redis();
		$this->redis->connect(WP_REDIS_HOST, WP_REDIS_PORT);
		$this->redis->auth(WP_REDIS_PASSWORD);
	}

	public static function getInstance()
	{
		if (self::$instance === null) {
			self::$instance = new self();
		}

		return self::$instance->redis;
	}
}
