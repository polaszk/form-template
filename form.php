<?php 

		if(empty($_POST['submit'])) {
			} else {
				//mail docelowy
				$mojemail = 'polaszkk@gmail.com';
				//dane z formularza
				$nip = $_POST['nip'];
				$name = $_POST['name'];
				$lastname = $_POST['lastname'];
				$email = $_POST['email'];
				$perNum = $_POST['perNum'];
				$street = $_POST['street'];
				$houseNumber = $_POST['houseNumber'];
				$apartmentNumber = $_POST['apartmentNumber'];
				$country = $_POST['country'];
				$region = $_POST['region'];
				$city = $_POST['city'];
				$postCode = $_POST['postCode'];

				if(!empty($nip) && !empty($name) && !empty($lastname) && !empty($email)) {
					function checkMail($checkmail) {
						if(filter_var($checkmail, FILTER_VALIDATE_EMAIL)) {
							if(checkdnsrr(array_pop(explode("@",$checkmail)),"MX")){
								return true;
							} else {
								return false;
							}
						} else {
							return false;
						}
					}

					if(checkMail($email)) {
					//dodatkowe informacje: ip i host użytkownika
					$ip = $_SERVER['REMOTE_ADDR'];
					$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		 
					$mailText = "NIP:\n$nip\nLiczba osób:\n$perNum\nUlica:\n$street\nNumer domu:\n$houseNumber\nNumer mieszkania:\n$apartmentNumber\nPaństwo:\n$country\nMiasto:\n$city\nWojewództwo:\n$region\nKod pocztowy:\n$postCode\nOd: $name, $lastname, $email ($ip, $host)";
		 
					$mailHeader = "Od: $name <$email>";
		 
					@mail($mojemail, 'Formularz zgłoszeniowy', $mailText, $mailHeader) or die('Błąd: formularz nie został wysłana');

					echo 'Przesłane informacje:<br /> NIP: ';
					echo $_POST['nip'];
					echo '<br /> Imię: ';
					echo $_POST['name'];
					echo '<br />Nazwisko: ';
					echo $_POST['lastname'];
					echo '<br /> E-mail: ';
					echo $_POST['email'];
					echo '<br />Liczba osób: ';
					echo $_POST['perNum'];
					echo '<br /> Ulica: ';
					echo $_POST['street'];
					echo '<br />Nr domu: ';
					echo $_POST['houseNumber'];
					echo '<br /> Nr mieszkania: ';
					echo $_POST['apartmentNumber'];
					echo '<br />Państwo: ';
					echo $_POST['country'];
					echo '<br /> Województwo: ';
					echo $_POST['region'];
					echo '<br />Miasto: ';
					echo $_POST['city'];
					echo '<br /> Kod pocztowy: ';
					echo $_POST['postCode'];
					} else {
						echo 'Adres e-mail jest niepoprawny';
					}
				} else {
					echo 'Wypełnij wszystkie pola formularza';
				}
			}
?>