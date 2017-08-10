<?php
// tests/AppBundle/Functional/MinkSetup.php
 
namespace Tests\AppBundle\Functional;
 
trait MinkSetup
{
    private $minkBaseUrl;
    private $minkSession;
 
    /**
     * @before
     */
    public function setupMinkSession()
    {
        $this->minkBaseUrl = 'https://www.stackoverflow.com';
        //$this->minkBaseUrl = 'http://192.168.0.2'
 
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');
        $this->minkSession = new \Behat\Mink\Session($driver);
        $this->minkSession->start();
    }
 
    public function getCurrentPage()
    {
        return $this->minkSession->getPage();
    }
 
    public function getCurrentPageContent()
    {
        return $this->getCurrentPage()->getContent();
    }
 
    public function visit($url)
    {
        $this->minkSession->visit($this->minkBaseUrl . $url);
    }
 
    public function login($user, $pass){
        $this->minkSession->visit($this->minkBaseUrl . '/###');  // Login link.
        $page = $this->getCurrentPage();
 
        $page->fillField('login[email]', $user); // Enter username.
        $page->fillField('login[password]', $pass); // Enter password.
        $page->pressButton('Here we go');
		echo 'succeded';
        $content = $this->getCurrentPageContent();
        $this->assertContains('logout', $content);   // Check that 'logout' exists.
    }
 
    /**
     * @afterClass
     */
    public function logout(){
        $page = $this->getCurrentPage();
        $page->clickLink('logout');
    }
}