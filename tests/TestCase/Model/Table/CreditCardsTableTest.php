<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CreditCardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CreditCardsTable Test Case
 */
class CreditCardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CreditCardsTable
     */
    public $CreditCards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.credit_cards',
        'app.restaurants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CreditCards') ? [] : ['className' => CreditCardsTable::class];
        $this->CreditCards = TableRegistry::get('CreditCards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CreditCards);

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
}
