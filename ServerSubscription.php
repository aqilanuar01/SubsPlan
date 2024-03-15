<?php

/*
|--------------------------------------------------------------------------
| OOP Practice
|--------------------------------------------------------------------------
|
| Problem Statement : You are developing a simplified server subscription for
| your customer.
| 
| Basic Plan : User is only allowed to subscribe only dedicated IP server.
| Pro Plan : User is allowed to subscribe multiple dedicated IP server.
|

| Below are simplified version of what user can do in Server Management Panel.
| Please write underlying Class and Functions necessary to make the Code Snippet below works.
|
| * Bonus Point for Proper File/Folder Architecture
| |- * Bonus Point if you use Composer to autoload file with proper Namespace.
| * Bonus Point for using abstract/interface for Plan's Class

 */

/**
 * OOP Server Management Panel Simplified Version.
 *
 * Please Execute PHP Statement's Below using your own Implementation.
 * You may do anything to let the code below work without changing anything.
 * 
 * 
 */
namespace App;

class User {    
  public $name;
  private $plan;

  public function subscribe(Plan $plan) {
      $this->plan = $plan;
  }

  public function unsubscribe() {
      $this->plan = null;
  }

  public function connectServer(Server $server) {
      if ($this->plan && $this->plan->canConnect()) {
          echo "{$this->name} connected to {$server->name}\n";
      } else {
          echo "{$this->name} cannot connect to {$server->name}\n";
      }
  }
}
class Server {
    public $name;
    public $ipAddress;
}

interface Plan {
  public function canConnect();
}

class BasicPlan implements Plan {
  public function canConnect() {
      return true;
  }
}

class ProPlan implements Plan {
  public function canConnect() {
      return true;
  }
}

print "\n\nOOP Practice !\n\n";

/*
 * Setting Up required details
 */
$user = new User();
$user->name = 'Haziq Zahari';

$server_1 = new Server();
$server_1->name = 'Server 1';
$server_1->ipAddress = '192.168.0.1';

$server_2 = new Server();
$server_2->name = 'Server 2';
$server_2->ipAddress = '192.168.0.2';

/*
 * Flow 1 - Basic Plan
 */

print "Flow #1 Basic Plan Subscription !\n\n";

$user->subscribe(new BasicPlan());

$user->connectServer($server_1);
$user->connectServer($server_2); // fail

/*
 * Flow 2 - Pro/Business Plan
 */

print "Flow #2 Upgrade Plan Subscription !\n\n";

// upgrade to pro/business plan to have access
// of connecting more than 1 server.
$user->subscribe(new ProPlan());
$user->connectServer($server_2); // success

/*
 * Flow 3 - Unsubscribe
 */

print "Flow #3 Unsubscribe Plan Subscription !\n\n";

// upgrade to pro/business plan to have access
// of connecting more than 1 server.
$user->unsubscribe();
$user->connectServer($server_2); // fail

 

