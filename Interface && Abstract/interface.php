<?php
/**
 *
 */
interface mailService
{
  // code...
  public function send();
}

  class useGmail implements mailService
  {
    public function send()
    {
      echo "sending using Gmail";
    }
  }
  class useHotmail implements mailService
  {
    public function send()
    {
      echo "sending using hotmail";
    }
  }
  /**
   *
   */
  class Client
  {
    protected $service;
    public function __construct(mailService $service)
    {
      $this->service = $service;
    }
    public function submit()
    {
      $this->service->send();
    }

  }
  $client = new Client(new useHotmail);
  $client->submit();
  
?>
