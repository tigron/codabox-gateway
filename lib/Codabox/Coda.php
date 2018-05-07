<?php
/**
 * Coda class
 *
 * @author Christophe Gosiau <christophe@tigron.be>
 * @author Gerry Demaret <gerry@tigron.be>
 * @author David Vandemaele <david@tigron.be>
 */
namespace Tigron\Codabox;

class Coda {
	use \Skeleton\Object\Model;

	/**
	 * Get unprocessed
	 *
	 * @access public
	 * @return array $codas
	 */
	public static function get_unprocessed() {
		$data = [
			'call' => 'getUnprocessed',
		];
		Tigron\Codabox\Client\Json::call('/coda', $data);
	}



}
