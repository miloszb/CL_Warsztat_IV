<?php
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testConstruct()
    {
        $tstU = new User('Józek', 'Wózek', 'jwozek@org.org', 'bumbum123');
        $this->assertInstanceOf(User::class, $tstU);    
        $this->assertEquals('Józek', $tstU->getName());
        $this->assertEquals('Wózek', $tstU->getSurname());
        $this->assertEquals('jwozek@org.org', $tstU->getEmail());
        $this->assertEquals('bumbum123', $tstU->getPassword());
    }
    public function testAddToDb()
    {
        $tstU = new User('Józek', 'Wózek', 'jwozek5@org.org', 'bumbum123');
        $tstU->save();
        $this->assertTrue($tstU->getId() != -1);
    }
    public function testLogin()
    {
        $tstU = User::login('jwozek@org.org', 'wrongpassword');
        $this->assertFalse($tstU);
        $tstU = User::login('jwozek@org.org', 'bumbum123');
        $this->assertEquals('Józek', $tstU->getName());
    }
}
