<?
class Users {
    public $username;
    public $gender;
    public $email;
    public $birth;
    public $role;
    function __construct($username, $email, $gender, $birth) {
      $this->username = $username;
      $this->email = $email;
      $this->birth = $birth;
      $this->gender = $gender;
      $this->role="user";
    }
    public function getRole():string
    {
        return $this->role;
    }
  }