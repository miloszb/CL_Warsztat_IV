<?php

/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 11.02.17
 * Time: 13:13
 */

class ConnectionTest  extends PHPUnit_Extensions_Database_TestCase
{
    protected function getConnection() { //26
        $conn = new PDO(
            $GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD']
        );
        return new PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection($conn, $GLOBALS['DB_DBNAME']);
    }
    protected function getDataSet() { //26
        return $this->createMySQLXMLDataSet('user_mysql.xml');
    }

    public function testCosTam()
    {
        $this->assertTrue(true);
    }

}