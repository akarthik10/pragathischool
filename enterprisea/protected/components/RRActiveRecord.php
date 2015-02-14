<?php

/**
-------------------------
GNU GPL COPYRIGHT NOTICES
-------------------------
This file is part of Open-School.

Open-School is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Open-School is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Open-School.  If not, see <http://www.gnu.org/licenses/>.*/

/**
 * $Id$
 *
 * @author Open-School team <contact@Open-School.org>
 * @link http://www.Open-School.org/
 * @copyright Copyright &copy; 2009-2014 wiwo inc.
 * @Rajith Ramachandran, rajith@wiwoinc.com
 * @license http://www.Open-School.org/
 */
 
//::Rajith:: SaaS
class RRActiveRecord extends CActiveRecord
{
   
    
	
	//saving model->tenant to all tables automatic ::::Rajith::::
	public function beforeSave()
    {
		if($this->tenant==NULL or $this->tenant==''){
			$tenant = $this->getTenant();
			$this->tenant = $tenant;
		}
		return parent::beforeSave();
	}
	
	//Find only tenant match by default Rajith
	public function defaultScope()
    {
		
			$tenant = $this->getTenant();	
			return array(
			'condition'=> "tenant=:tenant",
			'params' => array(":tenant"=>$tenant));
		
	}
	
	
	//Find only tenant match by default ::::Rajith::::
	/*public function beforeFind()
	{
		$tenant = $this->getTenant();
		
		$criteria = new CDbCriteria;
		$criteria->condition = "tenant=:tenant";
		$criteria->params = array(":tenant"=>$tenant);
		
		$this->dbCriteria->mergeWith($criteria);
		parent::beforeFind();
    }*/
	
	
	
	//before deletion check for the ownership ::Rajith::
	//not working for deleteAllByAttributes
	public function beforeDelete()
    {
		
			    $tenant = $this->getTenant();
                if ($this->tenant == $tenant)
                {
                        return true;
                        
                }
                else
                {
                        
                        return false; // prevent actual DELETE query from being run

                }
    }
	
	
	
	public function getTenant()
	{
		
		
		if(isset($_REQUEST['id'])){
			
			//Change this Mysql query with YII activerecord method - Rajith
			
			$connect = mysql_connect("localhost","studypro_multisc","LOOGuu*@@67#Hi") or die("not connecting");
			mysql_select_db("studypro_multischool") or die("no db");
			
			$centerdata	=	mysql_query('SELECT `tenant` FROM `center` WHERE `id`='.$_REQUEST['id']);
			
			if(mysql_num_rows($centerdata)){
				$row	=	mysql_fetch_assoc($centerdata);
				return $row['tenant'];
			}
		}
		else if(isset(Yii::app()->session['center_id']))
		{
			//Change this Mysql query with YII activerecord method - Rajith
			
			$connect = mysql_connect("localhost","studypro_multisc","LOOGuu*@@67#Hi") or die("not connecting");
			mysql_select_db("studypro_multischool") or die("no db");
			
			$centerdata	=	mysql_query('SELECT `tenant` FROM `center` WHERE `id`='.Yii::app()->session['center_id']);
			
			if(mysql_num_rows($centerdata)){
				$row	=	mysql_fetch_assoc($centerdata);
				return $row['tenant'];
			}
		}
		else{
			if($this->tenant!=NULL){
				return $this->tenant;
			}
		}
	}
	 
	
}