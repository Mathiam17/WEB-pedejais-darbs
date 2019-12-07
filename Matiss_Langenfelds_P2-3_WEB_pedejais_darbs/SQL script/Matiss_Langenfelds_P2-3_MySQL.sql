CREATE DATABASE `Skalruni` CHARACTER SET `utf8mb4` COLLATE `utf8mb4_latvian_ci`;


CREATE USER IF NOT EXISTS `SkalruniWEB`@`localhost` IDENTIFIED BY 'abc123';

GRANT INSERT, UPDATE, DELETE, SELECT 
ON `Skalruni`.* 
TO `SkalruniWEB`@`localhost`;

FLUSH PRIVILEGES;


CREATE TABLE IF NOT EXISTS `lietotaji` (
	lietotajiID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	lietotajiVards VARCHAR(50) NOT NULL,
	lietotajiParole VARCHAR(50) NOT NULL
	) ENGINE = INNODB;


CREATE TABLE IF NOT EXISTS `kategorijas` (
	kategorijasID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	kategorijasNosaukums VARCHAR(100) NOT NULL,
	kategorijasApraksts TEXT
	) ENGINE = INNODB;


CREATE TABLE IF NOT EXISTS `raksti` (
    rakstiID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    rakstiNosaukums VARCHAR(60) NOT NULL,
    rakstiSaturs LONGTEXT NOT NULL,
    rakstiDatums DATE NOT NULL,
    rakstiRakstnieks INT NOT NULL,
    rakstiKategorija INT NOT NULL,
    
    FOREIGN KEY raksti1(rakstiRakstnieks) REFERENCES lietotaji(lietotajiID),
    
    FOREIGN KEY raksti2(rakstiKategorija) REFERENCES kategorijas(kategorijasID)
    
    ) ENGINE = INNODB;