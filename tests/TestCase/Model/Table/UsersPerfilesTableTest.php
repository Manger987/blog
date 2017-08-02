<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersPerfilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersPerfilesTable Test Case
 */
class UsersPerfilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersPerfilesTable
     */
    public $UsersPerfiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_perfiles',
        'app.users',
        'app.perfils'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersPerfiles') ? [] : ['className' => UsersPerfilesTable::class];
        $this->UsersPerfiles = TableRegistry::get('UsersPerfiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersPerfiles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
