<?php
  /*  error_reporting(0);

    require_once ('../../admin/config/ajax_config.php');
    require_once ('../../admin/config/ajax_server.php');
	
	*/
		//$id = $_POST['id'];
  
     error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig2.php';
	
		$imgFile1 = $_FILES['user_image1']['name'];
		$tmp_dir1 = $_FILES['user_image1']['tmp_name'];
		$imgSize1 = $_FILES['user_image1']['size'];
      
   
		$imgFile2 = $_FILES['user_image2']['name'];
		$tmp_dir2 = $_FILES['user_image2']['tmp_name'];
		$imgSize2 = $_FILES['user_image2']['size'];
    
     
		$imgFile3 = $_FILES['user_image3']['name'];
		$tmp_dir3 = $_FILES['user_image3']['tmp_name'];
		$imgSize3 = $_FILES['user_image3']['size'];
    
    
		$imgFile4 = $_FILES['user_image4']['name'];
		$tmp_dir4 = $_FILES['user_image4']['tmp_name'];
		$imgSize4 = $_FILES['user_image4']['size'];
		
		$imgFile5 = $_FILES['user_image5']['name'];
		$tmp_dir5 = $_FILES['user_image5']['tmp_name'];
		$imgSize5 = $_FILES['user_image5']['size'];
    
		
		
		  
		
			$upload_dir1 = 'ban1/'; // upload directory
	
			$imgExt1 = strtolower(pathinfo($imgFile1,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions1 = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic1 = rand(1000,1000000).".".$imgExt1;
				
			// allow valid image file formats
			if(in_array($imgExt1, $valid_extensions1)){			
				// Check file size '5MB'
				if($imgSize1 < 5000000)				{
					move_uploaded_file($tmp_dir1,$upload_dir1.$userpic1);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
			
         
			$upload_dir2 = 'ban2/'; // upload directory
	
			$imgExt2 = strtolower(pathinfo($imgFile2,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions2 = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic2 = rand(1000,1000000).".".$imgExt2;
				
			// allow valid image file formats
			if(in_array($imgExt2, $valid_extensions2)){			
				// Check file size '5MB'
				if($imgSize2 < 5000000)				{
					move_uploaded_file($tmp_dir2,$upload_dir2.$userpic2);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
          
			$upload_dir3 = 'ban3/'; // upload directory
	
			$imgExt3 = strtolower(pathinfo($imgFile3,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions3 = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic3 = rand(1000,1000000).".".$imgExt3;
				
			// allow valid image file formats
			if(in_array($imgExt3, $valid_extensions3)){			
				// Check file size '5MB'
				if($imgSize3 < 5000000)				{
					move_uploaded_file($tmp_dir3,$upload_dir3.$userpic3);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
           
			$upload_dir4 = 'ban4/'; // upload directory
	
			$imgExt4 = strtolower(pathinfo($imgFile4,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions4 = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic4 = rand(1000,1000000).".".$imgExt4;
				
			// allow valid image file formats
			if(in_array($imgExt4, $valid_extensions4)){			
				// Check file size '5MB'
				if($imgSize4 < 5000000)				{
					move_uploaded_file($tmp_dir4,$upload_dir4.$userpic4);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
            
			$upload_dir5 = 'ban5/'; // upload directory
	
			$imgExt5 = strtolower(pathinfo($imgFile5,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions5 = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic5 = rand(1000,1000000).".".$imgExt5;
				
			// allow valid image file formats
			if(in_array($imgExt5, $valid_extensions5)){			
				// Check file size '5MB'
				if($imgSize5 < 5000000)				{
					move_uploaded_file($tmp_dir5,$upload_dir5.$userpic5);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
           
		
		   $stmt1 = $DB_con->prepare('DELETE * FROM market_run');
           $stmt1->execute();
		   
		
			$stmt = $DB_con->prepare('INSERT INTO market_run(ban1,ban2,ban3,ban4,ban5) VALUES(:upic1,:upic2, :upic3,:upic4, :upic5)');
			$stmt->bindParam(':upic1',$userpic1);
			$stmt->bindParam(':upic2',$userpic2);
			$stmt->bindParam(':upic3',$userpic3);
			$stmt->bindParam(':upic4',$userpic4);
			$stmt->bindParam(':upic5',$userpic5);
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:2;market.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		
	
?>