<?php
//use PHPUnit\Framework\TestCase;
//use PHPUnit\Extensions\Database\TestCase;

class UserTest extends PHPUnit_Extensions_Database_TestCase
{
    
//    protected function setUp()
//    {
//        parent::setUp();
//        $this->testUser = new User('Józek', 'Wózek', 'jwozek@org.org', 'bumbum123');
//    }
    public function getConnection()
    {
        $pdo = new PDO(
                $GLOBALS['DB_DSN'],
                $GLOBALS['DB_USER'],
                $GLOBALS['DB_PASSWD']
        );
        return $this->createDefaultDBConnection($pdo, $GLOBALS['DB_DBNAME']);
    }
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(__DIR__ . '/../user_flat.xml');
    }
    
    public function testConstruct()
    {
        $testUser = new User();
        $testUser->get(1); 
        $this->assertInstanceOf(User::class, $testUser);    
        $this->assertEquals('Jozek', $testUser->getName());
        $this->assertEquals('Wozek', $testUser->getSurname());
        $this->assertEquals('jwozek@org.org', $testUser->getEmail());
    }
    public function testLogin()
    {
        $loggedUserBad = User::login('jwozek@org.org', 'wrongpassword');
        $this->assertFalse($loggedUserBad);
        $loggedUserGood = User::login('jwozek@org.org', 'bumbum123');
        $this->assertEquals('Jozek', $loggedUserGood->getName());
    }
    public function testAddToDb()
    {
        
        $testUser = new User('Koka', 'Kola', 'coke@coke.com', 'kokakola789');
        $testUser->save();
        $this->assertTrue($testUser->getId() == 3);
    }
//    protected function tearDown()
//    {
//        $db = new Connection();
//        $sql = 'TRUNCATE TABLE user';
//        $db->query($sql);
//        parent::tearDown();
//    }
}
