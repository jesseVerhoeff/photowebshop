<?php


class AdminAddController extends Controller {

	function render(){

		$template=new Template;
		echo $template->render('admin/addProduct.htm');
	}

	function addProduct($f3)
	{


		ob_start();

		$target_dir = "./uploads/";
		$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		// Check if image file is a actual image or fake image

		if (isset($_FILES['fileToUpload'])) {
			$mime = $_FILES['fileToUpload']['type'];
			if (strstr($mime, "video/")) {
				$filetype = "video";
			} else if (strstr($mime, "image/")) {
				$filetype = "image";
			} else if (strstr($mime, "audio/")) {
				$filetype = "audio";
			}
		}


		var_dump($target_file);

		if($filetype == "image"){

			if (isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if ($check !== false) {

					//echo "File is an image - " . $check["mime"] . ".";

					$uploadOk = 1;

				} else {

					//	echo "File is not an image.";

					$uploadOk = 0;

				}

			}


			// Check file size

			if ($_FILES['fileToUpload']["size"] > 500000) {

				//echo "Sorry, your file is too large.";

				$uploadOk = 0;
			}

			// Allow certain file formats

			if ($imageFileType != "jpg" && $imageFileType != "PNG" && $imageFileType != "jpeg"
				&& $imageFileType != "gif"
			) {

				//	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

				$uploadOk = 0;
			}


			// Check if $uploadOk is set to 0 by an error
			$temp = explode(".", $_FILES["file"]["name"]);

			$photoLink = round(microtime(true)) . '.' . end($temp) . $imageFileType;
			$newfilename = $target_dir . round(microtime(true)) . '.' . end($temp) . $imageFileType;


			if ($uploadOk == 0) {

				//	echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file

			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfilename)) {


					//		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

				} else {

					//		echo "Sorry, there was an error uploading your file.";

				}

			}

			$productName = $this->f3->get('POST.productName');
			$productDescription = $this->f3->get('POST.productDescription');
			$productPrice = $this->f3->get('POST.productPrice');
			$productLink = $photoLink;
			$productType = 0;

			$photo = $this->f3->get('FILES');


			$products = new Product($this->db);
			$product = $products->add($productName, $productDescription, $productType, $productPrice, $productLink);

		}
		elseif($filetype == "video") {

			$target_dir = "./uploads/";

			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

			$upd = $_FILES["fileToUpload"];

			if ($upd) {
				$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

				if ($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg") {
					echo "File Format Not Suppoted";
				} else {

					$video_path = $_FILES['fileToUpload']['name'];

					$temp = explode(".", $_FILES["file"]["name"]);

					$videoLink = round(microtime(true)) . '.' . end($temp) . $imageFileType;
					$newfilename = $target_dir . round(microtime(true)) . '.' . end($temp) . $imageFileType;

//					move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
					move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfilename);


					$productName = $this->f3->get('POST.productName');
					$productDescription = $this->f3->get('POST.productDescription');
					$productPrice = $this->f3->get('POST.productPrice');
					$productLink = $videoLink;
					$productType = 1;


					$products = new Product($this->db);
					$product = $products->add($productName, $productDescription, $productType, $productPrice, $productLink);

				}
			}

		}

		}
	}

	function addVideo($f3)
	{

	}

