<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Welcome_test extends TestCase
{
	public function test_index()
	{
		$output = $this->request('GET', 'welcome/index');
		$this->assertContains('<title>Welcome to CodeIgniter</title>', $output);
	}

	public function test_method_404()
	{
		$this->request('GET', 'welcome/method_not_exist');
		$this->assertResponseCode(404);
	}

	public function test_APPPATH()
	{
		$actual = realpath(APPPATH);
		$expected = realpath(__DIR__ . '/../../src/application');
		$this->assertEquals(
			$expected,
			$actual,
			'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
		);
	}

	public function test_run()
	{
		$output = $this->request('GET', 'welcome/run',['st'=>'20170914','et'=>'20170915']);
		$this->assertContains('some script access allowed', $output);
	}

    public function test_run_post()
    {
        $output = $this->request('POST', 'welcome/run_post',['st'=>'20170914','et'=>'20170915']);
        $this->assertContains('some script access allowed', $output);

        // 在这里停止，并将此测试标记为未完成。
        $this->markTestIncomplete(
            '此测试目前尚未实现。'
        );
    }

    public function test_function_exists()
    {
        if (function_exists('imap_open')) {
            echo "IMAP functions are available.<br />\n";
        } else {
            $this->markTestSkipped(
                'imap_open 函数不可用。'
            );
        }
    }
}
