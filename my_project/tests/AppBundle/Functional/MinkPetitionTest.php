<?php
// tests/AppBundle/Functional/MinkPetitionTest.php
namespace Tests\AppBundle\Functional;
 require 'vendor/autoload.php';
  require 'MinkSetup.php';
//namespace Tests\AppBundle\Functional;
 
use PHPUnit\Framework\TestCase;
 
class MinkPetitionTest extends TestCase
{
    use MinkSetup;
 
    public function testSubmitPage(){
        $this->login('#', '#'); // Login first.
 
        $this->visit('/submitPetStuSearch'); // Go to submit search
        $page = $this->getCurrentPage(); // Get the page.
        $page->fillField('form_ban_id', '1234');
        $page->pressButton('form_find_student');
 
        $content = $this->getCurrentPageContent();   // Get page content.
        $this->assertContains('<u>No Petitions</u> exist for Some User Student ID: 1234', $content);
    }
}
$client = new MinkPetitionTest();
$client->testSubmitPage();