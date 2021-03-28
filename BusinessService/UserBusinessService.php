<?php
use BusinessService\UserDataService;

require_once 'UserDataService.php';

class UserBusinessService
{
    function getAllUsers()
    {
        $service = new UserDataService();
        return $service->getAllUsers();
    }
    
    function newUser($user)  
    {
        $service = new UserDataService();
        return $service->makeNew($user);
    }
    
    function getUserByID($id)
    {
        $service = new UserDataService();
        return $service->findByID($id);
    }
    
    function updateUser($user, $ID)
    {
        $service = new UserDataService();
        return $service->updateUserInfo($user, $ID);
    }
    
    function banUserID($ID)
    {
        $service = new UserDataService();
        return $service->banUser($ID);
    }
    
    function unbanUserID($ID)
    {
        $service = new UserDataService();
        return $service->unbanUser($ID);
    }
    
    function deleteUserID($ID)
    {
        $service = new UserDataService();
        return $service->deleteUser($ID);
    }
}

?>