<?php
class UserMap extends BaseMap{
    const USER = 'user';


    public function auth($login,$password){
        $login = $this->db->quote($login);
$res = $this->db->query("SELECT user.user_id,
user.name as fio, "
. "user.pass, role.sys_name, role.name
FROM user "
. "INNER JOIN role ON
user.role_id=role.role_id "
. "WHERE user.login = $login");
$user = $res->fetch(PDO::FETCH_OBJ);
if ($user) {
if (password_verify($password, $user->pass))
{
return $user;
}
}
return null;
    }
    public function findById($id=null){
        if ($id) {
$res = $this->db->query("SELECT user_id, name, login, pass, role_id"
. "FROM user WHERE user_id = $id");
$user = $res->fetchObject("User");
if ($user) {
return $user;
}
}
return new User();
    }
    
    public function arrRoles(){
   $res = $this->db->query("SELECT role_id AS id, name AS
value FROM role");
return $res->fetchAll(PDO::FETCH_ASSOC);     
    }
 }
