<?php
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $testUser;
    
    protected function setUp()
    {
        parent::setUp();
        $this->testUser = new User('Józek', 'Wózek', 'jwozek@org.org', 'bumbum123');
    }
    public function testConstruct()
    {
        $this->assertInstanceOf(User::class, $this->testUser);    
        $this->assertEquals('Józek', $this->testUser->getName());
        $this->assertEquals('Wózek', $this->testUser->getSurname());
        $this->assertEquals('jwozek@org.org', $this->testUser->getEmail());
        $this->assertEquals('bumbum123', $this->testUser->getPassword());
    }
    public function testAddToDb()
    {
        $this->testUser->save();
        $this->assertTrue($this->testUser->getId() > 0);
    }
    public function testLogin()
    {
        $this->testUser->save();
        $loggedUserBad = User::login('jwozek@org.org', 'wrongpassword');
        $this->assertFalse($loggedUserBad);
        $loggedUserGood = User::login('jwozek@org.org', 'bumbum123');
        $this->assertEquals('Józek', $loggedUserGood->getName());
    }
    protected function tearDown()
    {
        $db = new Connection();
        $sql = 'TRUNCATE TABLE user';
        $db->query($sql);
        parent::tearDown();
    }
}
