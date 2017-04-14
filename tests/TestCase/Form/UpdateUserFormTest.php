<?php
namespace App\Test\TestCase\Form;

use App\Form\UpdateUserForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\UpdateUserForm Test Case
 */
class UpdateUserFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\UpdateUserForm
     */
    public $UpdateUser;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->UpdateUser = new UpdateUserForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UpdateUser);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
