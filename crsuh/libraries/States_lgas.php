<?php
defined('BASEPATH') OR EXIT('No direct script access allowed!');

/**
* @package CRIRS
* @author Nugitech Dev. Team
* @copyright 2016
*
* Class for the different states and their lgas
**/

class States_lgas{
	
	// The State
	private $_state_name;
	
	// The LGAs
	private $_lga_name;
	
	// define a variable to hold the data to be returned
	private $_data = array();
	
	
	public function __construct(){
		
		$CI =& get_instance();
		
	}
	
	
	/**
	* Method for all the states and their LGAs
	* @param string $state ( This is optional )
	* @return array
	**/
	public function _states_w_lgas( $state = '' ){
		
		$data = array(
						'Abia' => array('Abia LGAs' => array('Aba North', 'Aba South','Arochukwu',
											'Bende','Ikwuano','Isiala-Ngwa North','Isiala-Ngwa South',
										'Isuikwato','Obi Nwa','Ohafia','Osisioma','Ngwa','Ugwunagbo',
										'Ukwa East','Ukwa West','Umuahia North','Umuahia South','Umu-Neochi')
										),
						'Abuja (FCT)' => array('Abuja Lga' => array('Abaji','Bwari','Abuja Municipal','Garki',
															  'Gwagwalada','Kuje','Kwali','Wuse')
											   ),
						'Adamawa' => array('Adamawa Lga'=>array('Demsa','Fufore','Ganaye','Gireri','Gombi','Guyuk',
														 'Hong','Jada','Lamurde','Madagali','Maiha',
														 'Mayo-Belwa','Michika','Mubi North','Mubi South',
														 'Numan','Shelleng','Song','Toungo','Yola North',
										   				 'Yola South')
										  ),
						'Akwa Ibom' => array('Akwa-Ibom Lgas'=>array('Abak','Eastern Obolo','Eket','Esit Eket',
											  'Essien Udim','Etim Ekpo','Etinan','Ibeno',
											  'Ibesikpo Asuitan','Ibiono Ibom','Ika','Ikono',
											  'Ikot Abasi','Ikot Ekpene','Ini','Itu','Mbo',
											  'Mkpat Enin','Nsit Atai','Nsit Ibom','Nsit Ubum',
											  'Obot Akara','Okobo','Onna','Oron','Oruk Anam',
											  'Udung Uko','Ukanafun','Uruan','Urue-Offong/Oruko','Uyo')
											 ),
						'Anambra' => array('Anambra LGAs'=>array('Aguata','Anambra East','Anambra West','Anaocha',
										   'Awka North','Awka South','Ayamelum','Dunuk Ofia','Ekwusigo',
										   'Idemili North','Idemili South','Ihiala','Njikoka','Nnewi North',
										   'Nnewi South','Ogbaru','Onitsha North','Onitsha South','Orumba North',
										   'Orumba South','Oyi')
										  ),
						'Bauchi' => array('Bauchi LGAs'=>array('Alkaleri','Bauchi','Bogoro','Damban','Darazo',
											'Dass','Ganjuwa','Giade','Itas/Gadau','Jama\'are',
										  	'Katagum','Kirfi','Misau','Ningi','Shira','Tafawa-Balewa',
										  	'Toro','Warji','Zaki')
										  ),
						'Bayelsa' => array('Bayelsa LGAs'=>array('Brass','Ekeremor','Kolokuma/Opokuma',
										   	'Nembe','Ogbia','Sagbama','Southern Ijaw','Yenegoa')
										   ),
						'Benue' => array('Benu LGAs'=>array('Ado','Agatu','Apa','Buruku','Gboko','Guma',
										   'Gwer East','Gwer West','Katsina Ala','Konshisha','Kwande','Logo',
										   'Makurdi','Obi','Ogbadibo','Oju','Okpokwu','Ohimini','Oturkpo',
										   'Tarka','Ukum','Ushongo','Vandiekya')
										 ),
						'Borno' => array('Borno LGAs'=>array('Abadam','Askira/Uba','Bama','Bayo','Biu',
										   'Chibok','Damboa','Dikwa','Gubio','Guzamala','Gwoza','Hawul','Jere',
										   'Kaga','Kala/Balge','Konduga','Kukawa','kwaya Kusar','Mafa','Magumeri',
										   'Maiduguri','Marte','Mobbar','Monguno','Ngala','Nganzai','Shani')
										 ),
						'Cross River' => array(
										  'Cross River LGAs'=>array('Akpabuyo','Odukpani','Akamkpa','Biase',
											 'Abi','Ikom','Yarkur','Obubra','Boki','Ogoja','Yala','Obanliku',
											 'Obudu','Calabar South','Etung','Bekwara','Bakassi',
											 'Calabar Municipality')
										  ),
						'Delta' => array('Delta LGAs'=>array('Asaba','Oshimili','Aniocha','Aniocha South',
										 	'Ika South','Ika North-East','Ndokwa West','Ndokwa East','Isoko North',
										 	'Isoko South','Bomadi','Burutu','Ughelli North','Ughelli South',
										 	'Ethiope West','Ethiope East','Sapele','Okpe','Warri North',
										 	'Warri South','Uvwie','Udu','Warri Central','Ukwani','Oshimili North',
										 	'Patani')
										 ),
						'Ebonyi' => array('Ebonyi LGAs'=>array('Afikpo North','Afikpo South','Onicha',
										  	'Ohaozara','Abakaliki','Ishiellu','Ikwo','Ezza','Ezza South',
										  	'Ohaukwu','Ebonyi','Ivo')
										  ),
						'Edo' => array('Edo LGAs'=>array('Benin','Esan North-East','Esan Central','Esan West',
									   	  'Egor','Ukpoba','Central','Etsako Central','Igueben','Oredo',
									   	  'Ovia South-West','Ovia South-East','Orhionwon','Uhunmwonde',
										  'Etsako East','Esan South-East')
									   ),
						'Ekiti' => array(
										 'Ekiti LGAs'=>array('Ado-Ekiti','Ekiti-East','Ekiti-West',
											'Emure/Ise/Orun','Ekiti South-West','Ikare','Irepodun','Ijero',
											'Ido/Osi','Oye','Ikole','Moba','Gbonyi','Efon','Ise/Orun',
											'llejemeje')
										 ),
						'Enugu' => array('Enugu LGAs'=>array('Enugu South','Igbo-Eze South','Enugu North',
										 	'Nkanu','Udi Agwu','Oji River','Ezeagu','IgboEze North',
										 	'Isi-Uzo','Nsukka','Igbo-Ekiti','Uzo-Uwani','Enugu East','Aninri',
										 	'Nkanu East','Udenu')
										 ),
						'Gombe' => array('Gombe LGAs'=>array('Akko','Balanga','Billiri','Dukku',
										 'Kaltungo','Kwami','Shomgom','Funakaye','Gombe','Nafada/Bajoga',
										 'Yamaltu/Delta')
										 ),
						'Imo' => array('Imo LGAs'=>array('Aboh-Mbaise','Ahiazu-Mbaise','Ehime-Mbano',
									     'Ezinhitte','Ideato North','Ideato South','Ihitte/Uboma','Ikeduru',
									     'Isiala Mbano','Isu','Mbaitoli','Ngor-Okpala','Njaba','Nwangele',
									     'Nkwerre','Obowo','Oguta','Ohaji/Egbema','Okigwe','Orlu','Orsu',
									     'Oru East','Oru West','Owerri Municipal',
									     'Owerri North','Owerri West')
									   ),
						'Jigawa' => array('Jigawa LGAs'=>array('Auyo','Babura','Birni Kudu','Birniwa',
										  	'Buji','Dutse','Gagarawa','Garki','Gumei','Guri','Gwaram','Gwiwa',
										  	'Hadejia','Jahun','Kafin Hausa','Kaugama Kazuare','Kiri Kasamma',
										  	'Kiyawa','Maigatari','Malam Madori','Miga','Ringim','Roni',
										  	'Sule-Tankarkar','Taura','Yankwashi')
										  ),
						'Kaduna' => array('Kaduna LGAs'=>array('Birni-Gwari','Chikun','Giwa','Igabi',
										  	'Ikara','Jaba','Jema\'a','Kachia','Kaduna North','Kaduna South',
										  	'Kagarko','Kajuru','Kaura','Kauru','Kubau','Kudan','Lere','Makarfi',
										  	'Sabon-Gari','Sanga','Soba','Zango-Kataf','Zaria')
										  ),
						'Kano' => array('Kano HQRT'=>array('Ajingi','Albasu','Bagwai','Bebeji','Bichi',
											'Bunkure','Dala','Dambatta','Dawakin Kudu','Dawakin Tofa',
											'Doguwa','Fagge','Gabasawa','Garko','Garum','Mallam','Gaya','Gezawa',
											'Gwale','Gwarzo','Kabo','Kanu Municipal','Karaye',
											'Kibiya','Kiru','Kumbotso','Kunchi','Kura','Madobi',
											'Makoda','Minibir','Nasarawa','Rano','Rimin Gado','Rogo',
											'Shanono','Sumaila','Takali','Tarauni','Tofa','Tsanyawa',
											'Tudun Wada','Ungogo','Warawa','Wudil')
										),
						'Katsina' => array('Katsina LGAs'=>array('Bakori','Batagarawa','Batsari','Baure',
										  	 'Bindawa','Charanchi','Dandume','Danja','Dan Musa','Daura',
										  	 'Dutsi','Dutsin-Ma','Faskari','Funtua','Ingawa','Jibia','Kafur',
										   	 'Kaita','Kankara','Kankia','Katsina','Kurfi','Kusada','Mai\'Adua',
										   	 'Malumfashi','Mani','Mashi','Matazuu','Musawa','Rimi','Sabuwa',
										   	 'Safana','Sandamu','Zango')
										   ),
						'Kebbi' => array('Kebbi LGAs'=>array('Aleiro','Arewa-Dandi','Argungu','Augie',
										 	'Bagudo','Birnin-Kebbi','Bunza','Dandi','Fakai','Gwandu','Jega',
										 	'Kalgo','Koko/Besse','Maiyama','Ngaski','Sakaba','Shanga','Suru',
										 	'Wasagu/Danko','Yauri','Zuru')
										 ),
						'Kogi' => array('Kogi LGAs'=>array('Adavi','Ajaokuta','Ankpa','Bassa',
											'Dekina','Ibaji','Idah','Igalamela-Odulu','Ijumu','Kabba/Bunu',
											'Kogi','Lokoja','Mopa-Muro','Ofu','Ogori/Mangongo','Okehi',
											'Okene','Olamabolo','Omala','Yagba East','Yagba West')
										),
						'Kwara' => array('Kwara LGAs'=>array('Asa','Baruten','Edu','Ekiti','Ifelodun',
										 	'Illorin East','Illorin West','Irepodun','Isin','Kaiama','Moro',
										 	'Offa','Oke-Ero','Oyun','Pategi')
										 ),
						'Lagos' => array('Lagos LGAs'=>array('Agege','Ajeromi-Ifelodun','Alimosho',
										 	'Amuwo-Odofin','Apapa','Badagry','Epe','Eti-Osa','Ibeju/Lekki',
										 	'Ifako-Ijaiye','Ikeja','Ikorodu','Kosofe','Lagos Island',
										 	'Lagos Mainland','Mushin','Ojo','Oshidi-Isolo',
										 	'Shomolu','Surulere')
										 ),
						'Nasarawa' => array('Nasarawa LGAs'=>array('Akwanga','Awe','Doma','Karu','Keana',
											 'Keffi','Kokona','Lafia','Nasarawa','Nasarawa Eggon',
											 'Obi','Toto','Wamba')
											),
						'Niger' => array('Niger LGAs'=>array('Agaie','Agwara','Bida','Borgu','Bosso',
										 	'Chanchaga','Edati','Gbako','Gurara','Katcha','Kontagora',
										 	'Lapai','Lavun','Magama','Mariga','Mashegu','Minna','Mokwa','Muya',
										 	'Pailoro','Rafi','Rijau','Shiroro','Suleja','Tafa','Wushishi')
										 ),
						'Ogun' => array('Ogun LGAs'=>array('Abeokuta North','Abeokuta South',
											'Ado-Odo/Ota','Egbado North','Egbado South','Ewekoro','Ifo',
											'Ijebu-East','Ijebu North','Ijebu North-East','Ijebu Ode','Ikenne',
											'Imeko-Afon','Ipokia','Obafemi-Owode','Ogun Waterside','Odeda',
											'Odogbolu','Remo North','Shagamu')
										),
						'Ondo' => array('Ondo LGAs'=>array('Akoko North-East','Akoko North-West',
											'Akoko South-East','Akoko South-West','Akure North','Akure South',
											'Ese-Odo','Idanre','Ifedore','Illaje','Ille-Oluji','Okeigbo','Irele',
											'Odigbo','Okitipupa','Ondo East','Ondo West','Ose','Owo')
										),
						'Osun' => array('Osun LGAs'=>array('Aiyedade','Aiyedire','Atakumosa West',
											'Atakumosa East','Boluwaduro','Boripe','Ede North','Ede South',
											'Egbedore','Ejigbo','Ife Central','Ife East','Ife North','Ife South',
											'Ifedayo','Ifelodun','Ila','Ilesha East','Ilesha West','Irepodun',
											'Irewole','Isokan','Iwo','Obokun','Odo-Otin','Ola-Oluwa','Olorunda',
											'Oriade','Orolu','Osogbo')
										),
						'Oyo' => array('Oyo LGAs'=>array('Afijio','Akinyele','Atiba','Atigbo',
									  	 'Egbeda','Ibadan Central','Ibadan North','Ibadan North-West',
										 'Ibadan South-East','Ibadan South-West','Ibarapa Central','Ibarapa East',
									   	 'Ibarapa North','Ido','Irepo','Iseyin','Itesiwaju','Iwajowa','Kajola',
									   	 'Ogbomosho North','Ogbomosho South','Ogo Oluwa','Olorunsogo','Oluyole',
									     'Ona-Ara','Orelope','Ori Ire','Oyo East','Oyo West','Saki East',
									     'Saki West','Surulere')
									   ),
						'Plateau' => array('Plateau LGAs'=>array('Barikin Ladi','Bassa','Bokkos',
										   	'Jos East','Jos North','Jos South','Kanam','Kanke','Langtang North',
										  	'Langtang South','Mangu','Mikang','Pankshin','Qua\'an Pan','Riyom',
										   	'Shendam','Wase')
										   ),
						'Rivers' => array('Rivers LGAs'=>array('Abua/Odual','Ahoada East','Ahoada West',
										  	'Akuku Toru','Andoni','Asari-Toru','Bonny','Degema','Emohua',
										  	'Eleme','Etche','Gokana','Ikwere','Khana','Obia/Akpor',
										  	'Ogba/Egbema/Ndoni','Ogu/Bolu','Okrika','Omumma','Opobo/Nkoro',
											'Oyigbo','Port-Harcourt','Tai')
										  ),
						'Sokoto' => array('Sokoto LGAs'=>array('Binji','Bodinga','Dange-shnsi','Gada',
										  	'Goronyo','Gudu','Gawabawa','Illela','Isa','Kware','Kebbe','Rabah',
										  	'Sabon Bimi','Shagari','Silame','Sokoto North','Sokoto South',
										  	'Tambuwal','Tongaza','Tureta','Wamako','Wurno','Yabo')
										  ),
						'Taraba' => array('Taraba LGAs'=>array('Ardo-Kola','Bali','Donga','Gashaka',
										 	'Cassol','Ibi','Jalingo','Karin-Lamido','Kurmi','Lau','Sardauna',
										  	'Takum','Ussa','Wukari','Yoro','Zing')
										  ),
						'Yobe' => array('Yobe LGAs'=>array('Bade','Bursari','Damaturu','Fika','Fune',
											'Geidam','Gujba','Gulani','Jakusko','Karasuwa','Karawa','Machina',
											'Nangere','Nguru Potiskum','Tarmua','Yunusari','Yusufari')
										),
						'Zamfara' => array('Zamfara LGAs'=>array('Anka','Bakura','Birnin Magaji','Bukkuyum',
										   	'Bungudu','Gummi','Gusau','Kaura','Namoda','Maradun','Maru',
										   	'Shinkafi','Talata Mafara','Tsafe','Zurmi')
										  )
						);
				
		if( $state !== '' ){
			
			if(array_key_exists($state, $data)){
				
				foreach( $data as $key => $val ){
					
					if( $state === $key ){
						
						foreach( $val as $k => $v ){
						
							foreach( $v as $l ):
							
								$this->_data[] = $l;
								
							endforeach;
							
						}
						
					}
					
				}
				
			}
			
		}else{
			
			$this->_data[] = array_keys($data);
			
		}
		
		return $this->_data;
	
	}
	
	/**
	* Setter for state name
	* @param $sname
	* @return void
	**/
	public function set_state_name( $sname ){
		
		$this->_state_name = $sname;
		
	}
	
	/**
	* Getter for state name
	* @param None
	* @return string $sname;
	**/
	public function get_state_name(){
		
		return $this->_state_name;
		
	}
		
	
}