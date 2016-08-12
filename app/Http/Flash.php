<?php
namespace App\Http;


class Flash
{
	
	/**
	 * @param string $title
	 * @param string $message
	 * @param string $level
	 * @param string $key
	 */
	protected function create($title, $message, $level, $key = 'flash_message')
	{
		session()->flash($key, [
			'title' => $title,
			'message' => $message,
			'level' => $level
		]);
	}
	
	/**
	 * @param string $title
	 * @param string $message
	 */
	public function info($title, $message)
	{
		return $this->create($title, $message, 'info');
	}
	
	/**
	 * @param string $title
	 * @param string $message
	 */
	public function success($title, $message)
	{
		return $this->create($title, $message, 'success');
	}
	
	/**
	 * @param string $title
	 * @param string $message
	 */
	public function error($title, $message)
	{
		return $this->create($title, $message, 'error');
	}
	
	/**
	 * @param string $title
	 * @param string $message
	 * @param string $level
	 */
	public function overlay($title, $message, $level = 'success')
	{
		return $this->create($title, $message, $level, 'flash_message_overlay');
	}
}