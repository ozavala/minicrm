<?php



namespace App\Enums;

enum PermissionEnum:string
{
   const MANAGE_USERS ='manage_users';
   const DELETE_CLIENTS ='delete_clients';
   const DELETE_PROJECTS ='delete_projects';
   const DELETE_TASKS ='delete_tasks';
}
