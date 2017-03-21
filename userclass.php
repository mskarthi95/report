		

			<?php
			class user{
			var $id;
			var $uname;
			var $name;
			var $fccurl;
			var $apiurl;
			var $points;

			function __construct($id,$uname,$name){
			
			$this->id=$id;
			$this->uname=$uname;
			$this->name=$name;
			$this->fccurl="https://www.freecodecamp.com/".$uname;
			$this->apiurl="https://www.freecodecamp.com/api/users/about?username=".strtolower($uname);
			
			}

			function pointsFetcher(){
			try{
     
			//  Initiate curl
			$ch = curl_init();
			// Disable SSL verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Set the url
			curl_setopt($ch, CURLOPT_URL,$this->apiurl);
			$object=curl_exec($ch);
			// Closing
			curl_close($ch);

			
			$object=json_decode($object, true);
			
			if(isset($object["about"]["browniePoints"]))
			return $object["about"]["browniePoints"];
			else
			return 0;

			}
			catch(Exception $e)
			{

			}
    }
  }

 ?>
