<?
// class Users {
//     public $username;
//     public $gender;
//     public $email;
//     public $birth;
//     function __construct($username, $email, $gender, $birth) {
//       $this->username = $username;
//       $this->email = $email;
//       $this->birth = $birth;
//       $this->gender = $gender;
//     }
//   }

  class Users
{
    public $username;
    public $email;
    public $birth;
    public $gender;

    function __construct($_username, $_email, $_birth, $_gender)
    {
        $this->username = $_username;
        $this->email = $_email;
        $this->birth = $_birth;
        $this->gender = $_gender;
    }

    public function __toString()
    {
        return 'Username: ' . $this->username . '<br /> Email: ' . $this->email . '<br /> Birth: ' . $this->birth . '<br />Gender: ' . $this->gender . '. <br />';
    }
}