<?php
	include_once('../common/init.php');
	//$marcas = array('Austin','Opel','Mercedes-Benz','BMW','Volkswagen','Seat','Sköda','Lada','Renault','Citroën','Peugeot','Nissan','Toyota','Lexus','Mazda','Honda','Mitsubishi','Fiat');
	//$modelos = array('Corsa','Punto','121','127','Vectra','Clio','C1','C2','C3','C4','Micra','Almera','Primera','Skyline','Civic','Lancer','Colt','Golf','Beetle','Polo','Ibiza','IS','LFA','MX-5','Corolla','MR2','Avensis','GT86');

  
  $dados = array(array('AMC',array('Pacer X','Gremlin X','Javelin-AMX')),array('Abarth',array('131 Ab art h','500 esseesse')),array('Acura',array('#15 Lowe\'s Fernandez ARX-01b','#26 Andretti-Green Racing ARX-01b','#66 de Ferran Motorsport Jim Hall Tribute ARX-02a','#66 Motorsports ARX-02a','Integra Type-R','NSX','RSX Type-S','TSXV6')),array('Alfa Romeo',array('155 Q4','8C Competizione','Brera Italia Independent','GTV-6','Giulia Sprint GTA Stradale','Giulietta Quadrifoglio Verde','MiTo','33 Stradale','Montreal','Spider Verde')),array('Ascari',array('KZ1R')),array('Aston Martin',array('#007 Aston Lola','#007 DBR9','#009 AMR One','#009 DBR9','#6 Muscle Milk Lola','Cygnet','DB4 GT Zagato','DB5 Vantage','DB7 Zagato','DB9 Coupe','DBR1','DBS','One-77','Rapide','V12 Vanquish','V12 Vantage','V12 Zagato','V8 Vantage V600','V8 Vantage','Virage')),array('Audi',array('#02 Audi A4 Touring Car','#03 Car','#04 Car','#05 Car','#06 Car','#2 Sport North America R18 TDI','#2 R8','#2 RIO Quattro S1','#2 Team Joest R15 R15++ TDI','#4 Forza TDI','#8 ABT TT-R','Q7 V12 TDI','R8 5.2 FSI quattro','R8 LMS','R8','RS 4','RS 6','RS2 Avant','RS3 Sportback','RS5','S4','S5','Sport quattro','TT Coupe S-Line','TT Coupé 3.2 RS Coupe')),array('Austin-Healey',array('3000 MkIII ','Sprite MKI')),array('BMW',array('#15 BMWV12 LMR','#2 BMW M3 GTR','#6 Prototype Technology Group GTR','#79 Jeff Koons GT2 Art Car','#92 Rahal Letterman GT2','1 Series M Coupe','1351 Coupé','2002 Turbo','3.0 CSL','507','850CSi','M1','M3','M3-GTR \'Street Version\'','M5','M6 Coupe','M635CSÌ','X5M','X6M','Z3 Coupe','Z4 GT3','Z4 sDrive35is','Z8')),array('Bentley',array('#7 Bentley Speed 8','Continental GT','Continental Supersports','Platinum Continental GT')),array('Bertone',array('Mantide')),array('Bugatti',array('EB110 SS','Veyron 16.4','Veyron Super Sport')),array('Buick',array('G SX','Regal GNX')),array('Cadillac',array('#6 Cadillac Northstar LMP-02','CTS-V Coupe','CTS-V','Eldorado Biarritz Convertible')),array('Chevrolet',array('#04 Chevrolet Monte Carlo SS Stock Car','#3 Corvette C5.R','#4 C6.R','#4 ZR1','#55 Level 5 Oreca FLM09','#89 Intersport FLM09','#99 Green Earth Gunnar FLM09','Bel Air','Camaro 35th Anniversary SS','Camaro IROC-Z','Camaro Coupe','Camaro Z28','Camaro ZL1','Chevelle SS-396','Chevelle SS-454','Cobalt Turbocharged','Corvair Monza','Corvette Grand Sport','Corvette Stingray 427','Corvette Z06','Corvette ZR-1','Corvette','El Camino 454','Impala 409','Impala SS','Nova 396','Nova SS','Spark','Volt')),array('Chrysler',array('300 SRT8 ','300C SRT-8','Crossfire SRT6','PT Cruiser GT')),array('Citroën',array('C1','C4VTS','DS3','DS4')),array('De Tomaso',array('Pantera')),array('DeLorean',array('DMC-12')),array('Devon',array('GTX')),array('Dodge',array('#11 Primetime Viper Competition Coupe','#126 Zakspeed GTS-R','#2 Mopar Dodge Coupe','#91 GTS-R','Challenger R/T','Challenger 392','Challenger SRT8','Charger Daytona HEMI','Charger R/T','Charger SRT8','Coronet Bee','Coronet W023','Dart HEMI Stock','Quinton \'Rampage\' Jackson Challenger SRT8','Ram SRT10','SRT4 ACR','Shelby Omni GLHS','Stealth R/T Turbo','Viper Coupe','Viper GTS ACR','Viper SRT-10','Viper SRT10 ACR')),array('Eagle',array('Talon TSi Turbo')),array('Fiat',array('Punto Evo SPORT','Coupe 20V Turbo')),array('Ferrari',array('#12 Risi Competizione F333 SP','#2 Ferrari Automobili 312 P','#62 F430GT','#62 F458 Italia','#83 F430GT','#89 Hankook Farnbacher F430GT','#90 F430GT','250 California','250 GTO','250 Testa Rossa','330 P4','360 Modena','365 GTB/4','430 Scuderia','458 Challenge','458 Italia','512TR','575M Maranello','599 GTB Fiorano','599 GTO','599XX','612 Scaglietti','California','Challenge Stradale','Dino 246 GT','Enzo Ferrari','F355 Berlinetta','F355 Challenge','F40 Competizione','F40','F430','F50 GT','F50','FF','FXX','GTO')),array('Ford',array('Transit SuperSportVan ','#05 Ford Fusion Car','#17 Dick Johnson FG Falcon','#19 Mother Energy Falcon','#4 IRWIN Falcon','#40 Robertson Mk7','#5 Performance Falcon','#9 SP Tools Falcon','Country Squire','De Luxe Coupé','Escort Cosworth','Escort RS1800','F-150 SVT Raptor','Fairlane Thunderbolt','Fiesta Zetec S','Focus RS','Focus ST','Ford GT','Fusion Sport','GT40 MkII','Ka','Mustang Boss 302','Mustang 429','Mustang Cobra R','Mustang Coupe','Mustang GT','Mustang King Cobra','Mustang Mach 1','Pinto','RS200 Evolution','SVT R','SVT Focus','Shelby GT500','Sierra Cosworth RS500','Taurus SHO','Thunderbird','XB Falcon GT')),array('GMC',array('Syclone','Typhoon','Vandura G-1500')),array('Gumpert',array('Apollo S')),array('HUMMER',array('H1 Alpha')),array('Hennessey',array('Venom ')),array('Holden',array('#1 Toll Holden Commodore VE','#11 Pepsi Max Crew VE','#33 Fujitsu GRM VE','#8 BOC VE','#88 TeamVodafone VE','HSV GTS','HSV w427')),array('Honda',array('#18 TAKATA DOME NSX','#33 Lola','CR-X Del Sol SiR','CR-X SiR','CR-Z EX','Civic 1.5 VTi','Civic Si Coupe','Civic Type R','Civic Type-R','Fit Sport','Integra Type-R','Mugen Civic Type-R 3D','Mugen Integra Type-R','NSX-R GT','NSX-R','Prelude SiR','S2000')),array('Hudson',array('Hornet')),array('Hyundai',array('#67 Rhys Millen Veloster','Forza Genesis Coupe','Genesis 3.8 Track','Genesis Coupe','Rhys Coupe','Tuscani Elisa','Veloster Turbo','ix20')),array('Infiniti',array('G35 Coupe','G37 Sport')),array('Jaguar',array('#33 RSR XKR GT','D-Type','E-type SI','XFR','XJ220','XK120','XKR-S')),array('Jeep',array('Wrangler Rubicon','Grand Cherokee SRT8')),array('Joss',array('JT1')),array('Kia',array('Forte Koup SX','cee\'d')),array('Koenigsegg',array('Agera','CC8S','CCGT','ccx',)),array('Lamborghini',array('#08 West Yokohama Gallardo LP560-4','Aventador LP700-4','Countach LP5000 QV','Diablo GTR','Diablo SV','Gallardo LP570-4 Superleggera','Gallardo Superleggera','Gallardo','Miura Concept','Miura P400','Murciélago LP 670-4 SV','Murciélago LP640','Murciélago','Reventón','Sesto Elemento')),array('Lancia',array('037 Stradale','Delta Integrale EVO','Stratos HF Stradale')),array('Land Rover',array('Range Rover Supercharged')),array('Lexus',array('#1 PETRONAS TOM\'S SC430','#25 ECLIPSE ADVAN SC430','#6 ENEOS SC430','CT200h','GS350 F Sport','IS F','IS300','IS350','LF-A','SC300','SC430')),array('Lincoln',array('Continental')),array('Lotus',array('Cortina ','1999 Lotus Elise Sport','2-Eleven','Carlton','Elan Sprint','Eleven','Elise 111S','Esprit Turbo','Esprit V8','Evora 124 Endurance Race Car','Evora','Exige Cup 240')),array('MG',array('MGA Twin-Cam','MGB GT')),array('Mini',array('Cooper S','John Cooper Works Clubman','John Works')),array('Maserati',array('#15 JMB MC12','300 S','Ghibli Cup','GranSport','GranTurismo MC GT4','GranTurismo S','MC12','Quattroporte S')),array('Mazda',array('#16 Dyson B09/86','#16 B09/86','#55 Mazdaspeed 787B','2','Axela 23S','Furai','MX-5 Miata','MX-5 Roadster Coupe','MX-5 Superlight','Mazdaspeed 3','Mazdaspeed Familia','Mazdaspeed Roadster','RX-7 GSL-SE','RX-7 Spirit R Type-A','RX-7','RX-8 Mazdaspeed','RX-8 R3','Savanna RX-7')),array('McLaren',array('#41 Gulf Davidoff McLaren F1 GTR','#43 GTR','59 MP4-12C GT3','F1 GT','F1','MP4-12C')),array('Mercedes-Benz',array('#35 Black SLS AMG GT3','#63 Sauber-Mercedes C9','190E 2.5-16 Evolution II','300 SEL 6.3','300 SLR','300SL Gullwing Coupe','A200 Turbo Coupe','AMG Mercedes CLK GTR','C32 AMG','C63 Series','C63 AMG','CL 65 AMG','CLK55 AM G Coupe','E 63 AMG','ML63AMG','Mercedes-AMG C-Class Car','SL Series','SLK 55 AMG','SLK55 AMG','SLR Stirling Moss','SLR','SLS AMG')),array('Mercury',array('Cougar Eliminator')),array('Mitsubishi',array('Galant VR-4 ','Colt Ralliart','Eclipse GSX','Eclipse GT','Eclipse GTS','FTO GP Version R','GTO','HKS Time Attack CT230R','Lancer IX MR','Lancer VI GSR','Lancer VIII X GSR','Starion ESI-R')),array('Morgan',array('Aero SuperSports')),array('Mosler',array('MT900S')),array('Nissan',array('#12 CALSONIC SKYLINE','#12 CALSONICIMPUL GT-R','#23 XANAVINISMO GT-R','#24 W00D0NE AOVAN Clarion GT-R','#3 HASEMISPORT ENDLESS Z','#3 YellowHat Y MS TOM ICA GT-R','#32 NISSAN R390 GT1','#46 Dream Cube\'s Z','240SX SE','370Z','Datsun 510','Fairlady Z 432','Fairlady S Twin Turbo','Fairlady Z','GT-R SpecV','Leaf','MINE\'S R32 Skyline GT-R','MINE\'S R34 GT-R','Micra','R390','Sentra SE-R Spec V','Silvia CLUB K\'s','Silvia Spec-R','Skyline 2000GT-R','Skyline 350GT','Skyline GT-R V-Spec II','Skyline V-Spec','Top Secret Silvia D1-Spec S15','Versa SL')),array('Noble',array('M600')),array('Oldsmobile',array('Hurst/Olds 442')),array('Opel',array('#5 OPC TEAM PHOENIX Astra V8','Speedster Turbo')),array('Pagani',array('#17 Carsport Zonda GR','Huayra','Zonda C12','Zonda Cinque Roadster','Zonda R')),array('Panoz',array('#050 Panoz Abruzzi','#11 JMLTeam LMP-01','#51 Esperante GTLM','Esperante GTLM')),array('Peugeot',array('#10 Matmut-Oreca 908','#3 Peugeot Talbot 905 EVO 1C','#9 Total 908','107','205 T16','206 RC','207 2000','308 GTI','RCZ')),array('Plymouth',array('Barracuda Formula-S','Cuda 426 HEMI','GTX HEMI')),array('Pontiac',array('Fiero GT','Firebird Trans Am GTA','Firebird Ram Air','Firebird SD-455','Firebird Am','Firebird','G8 GXP','GTO Judge','GTO','Solstice GXP')),array('Porsche',array('#045 Flying Lizard 911 GT3-RSR','#16 Spyder Evo','#17 Porsche AG 962c','#17 Falken GT3-RSR','#2 Gruppe Orange GT3 Cup','#23 Alex Job Cup','#26 GT1-98','#31 Peterson-White Lightning GT3-RSR','#54 Swan GT3','#66 AXA Cup','#7 Penske Evo','#80 GT3-RSR','550 Spyder','911 Carrera RS','911 GT2','911 GT3','911 Classic','911 3.3','911 Turbo','914/6','944 Turbo','959','Boxster S','Carrera GT','Cayenne Turbo','Cayman R','Panamera Turbo')),array('RUF',array('CTR Yellowbird','CTR2','RGT-8','Rt 12 R','Rt S')),array('Radical',array('SR8 RX')),array('Renault',array('5 Turbo','Clio 197','Clio RS','Megane 250','Sport Clio V6','Twingo Renault Cup')),array('Rossion',array('Q1')),array('Seat',array('Ibiza CUPRA','Leon CUPRA R','Leon Cupra Supercup')),array('SSC',array('Ultimate Aero')),array('Saab',array('9-3 Aero','9-3 X','99 Turbo')),array('Saleen',array('#2 Konrad S7R','S281','S281E','S331 Supercab','S5S Raptor','S7')),array('Saturn',array('ION Red Line','Sky Line')),array('Scion',array('FR-S','tC','te','xD')),array('Shelby',array('Cobra 427 S/C','Cobra Coupe','GT-500KR','GT500 428CJ','GT500','Series 1')),array('Smart',array('ForTwo')),array('Spada',array('Vetture Codatronca TS')),array('Spyker',array('C8 Aileron','C8 Laviolette LM85')),array('Subaru',array('Legacy ','#77 CUSCO SUBARU IM PREZ A','Impreza 22B STI','Impreza S204','Impreza WRX STi','Impreza STi','Legacy B4 2.0 GT','Legacy 2.5GT')),array('Suzuki',array('Liana GLX','Monster SX','SX4 Sportback')),array('TVR',array('Cerbera 12','Sagaris','Tuscan S')),array('Tesla',array('Roadster Sport')),array('Toyota',array('#3 Toyota GT-ONE TS020','#6 EXXON SuperFlo Supra','2000GT','Altezza RS200','Aygo','Celica GT-Four RC ST185','Celica ST205','Célica SS-I','Célica Supra','MR-S','MR2 GT','MR2SC','Prius','Soarer 430SCV','Sprinter Trueno Apex','Supra Turbo','Supra RZ','Top 0-300 Supra','Yaris S')),array('Triumph',array('TR3B')),array('Ultima',array('GTR')),array('Vauxhall',array('Agila','Astra VXR','Corsa VXR','Insignia VXR','Monaro VXR','VX220 Turbo')),array('Viper',array('#91 SRT GTS-R','#93 GTS-R','GTS')),array('Volkswagen',array('Beetle','Bora VR6','Corrado VR6','Fox','GTI VR6 Mk3','Golf GTI Mk6','Golf GTi 16vMk2','Golf GTi','Golf R','Golf R32','Karmann Ghia','Polo GTI','Rabbit GTI','Scirocco GT','Scirocco R','Scirocco S','Touareg R50')),array('Volvo',array('242 Evolution','850 R','C30 R-Design','S60 R-Design','S60R')),array('Wiesmann',array('GT MF5')));
  
	foreach ($dados as $row)
	{
		$db->query("INSERT INTO brand (name) values ('$row[0]')");
		$brandid = intval($db->lastInsertId(brand_brandid_seq));
		foreach ($row[1] as $modelo)
		{
			$stmt = $db->prepare("INSERT INTO product (name, price, quantity, brandid, description) VALUES (:name,:price,:quantity,:brandid,:description)");
			$price = rand(15000.0,100000.0);
			$quantity = rand(1,50);
			$description = "Potência: "+rand(50,500)+"cv";
			$stmt->execute(array(name=>$modelo,price=>$price,quantity=>$quantity,brandid=>$brandid,description=>$description));
		}
	}
