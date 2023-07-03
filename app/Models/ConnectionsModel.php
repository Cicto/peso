<?php namespace App\Models;

use CodeIgniter\Model;
use \AllowDynamicProperties;

#[AllowDynamicProperties]
class ConnectionsModel extends Model{
  protected $table = 'chat_connections';
  protected $allowedFields = ['c_user_id', 'c_resource_id', 'c_name'];
 

}