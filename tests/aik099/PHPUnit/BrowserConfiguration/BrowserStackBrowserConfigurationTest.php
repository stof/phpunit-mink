<?php
/**
 * This file is part of the phpunit-mink library.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @copyright Alexander Obuhovich <aik.bold@gmail.com>
 * @link      https://github.com/aik099/phpunit-mink
 */

namespace tests\aik099\PHPUnit\BrowserConfiguration;


use Mockery as m;

class BrowserStackBrowserConfigurationTest extends ApiBrowserConfigurationTestCase
{

	const HOST = ':@hub.browserstack.com';

	/**
	 * Configures all tests.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		$this->browserConfigurationClass = 'aik099\\PHPUnit\\BrowserConfiguration\\BrowserStackBrowserConfiguration';

		parent::setUp();

		$this->setup['desiredCapabilities'] = array(
			'os' => 'Windows', 'os_version' => '7', 'version' => 10,
			'acceptSslCerts' => 'true',
		);
		$this->setup['host'] = 'UN:AK@hub.browserstack.com';
	}

	/**
	 * Test description.
	 *
	 * @return void
	 */
	public function testSetHostCorrect()
	{
		$browser = $this->createBrowserConfiguration(array(), false, true);

		$this->assertSame($browser, $browser->setHost('EXAMPLE_HOST'));
		$this->assertSame('A:B@hub.browserstack.com', $browser->getHost());
	}

	/**
	 * Desired capability data provider.
	 *
	 * @return array
	 */
	public function desiredCapabilitiesDataProvider()
	{
		return array(
			array(
				array('os' => 'os-name', 'os_version' => 'os-version'),
				array('os' => 'os-name', 'os_version' => 'os-version', 'acceptSslCerts' => 'true'),
			),
			array(
				array('acceptSslCerts' => 'false'),
				array('acceptSslCerts' => 'false', 'os' => 'Windows', 'os_version' => 'XP'),
			),
		);
	}

}
