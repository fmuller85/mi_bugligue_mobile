<?php
/**
 * Created by PhpStorm.
 * User: Flo
 * Date: 11/04/14
 * Time: 16:08
 */

class BugTest extends PHPUnit_Framework_TestCase {
    public function testAssignToProduct()
    {
        $bug = new Bug();
        $bug->setCreated(new DateTime());
        $bug->setScreen(null);
        $bug->setDatelimite();
        // Arrange
        $product = new Money(1);

        // Assert
        $this->assertEquals(-1, $b->getAmount());
    }
}
 