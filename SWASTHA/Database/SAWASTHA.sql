-- Database: `SAWASTHA`

CREATE TABLE `admin`(
    `username` varchar(50),
    `user_id` varchar(50),
    `password` varchar(50),
    `register_time` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `hospitals` (
    `username` varchar(50),
    `hospital_id` varchar(50), 
    `password` varchar(50), 
    `register_time` varchar(50), 
    `status` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `hospital_info`(
    `sr` INT NOT NULL,
    `hospital_id` varchar(50), 
    `hospital_name` varchar(50), 
    `city` varchar(50), 
    `address` varchar(50), 
    `state` varchar(50),
     `pincode` varchar(50), 
     `phonenumber` varchar(10), 
     `email` varchar(50), 
     `category` varchar(50),
     `website` varchar(50), 
     `beds` int(255), 
     `available_bad` int(255), 
     `Total_emergency_beds` int(255), 
     `available_emergency_bad` int(255),
     `Total_icu_beds` int(255),
     `available_icu_beds` int(255),
     `Total_general_beds` int(255),
     `available_general_bad` int(255), 
     `last_updated` varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users`(
    `username` varchar(50) ,
    `user_id` varchar(50),
    `password` varchar(50),
    `register_time` varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user_info`(
    `user_id` varchar(50), 
    `username` varchar(50), 
    `city` varchar(50), 
    `address` varchar(50), 
    `state` varchar(50), 
    `phonenumber` varchar(50), 
    `email` varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `hospital_info`
  ADD PRIMARY KEY (`sr`);

ALTER TABLE `hospital_info`
    MODIFY `sr` INT  NOT NULL AUTO_INCREMENT;

INSERT INTO `hospitals`(`username`,`hospital_id`,`password`, `register_time`, `status`) VALUES 
('Rafat','25', 'Rafat', current_timestamp(), 'active'),
('Rohit','4', 'Rohit', current_timestamp(), 'active');


INSERT INTO `hospital_info` (`hospital_id`, `hospital_name`, `city`, `address`, `state`, `pincode`, `phonenumber`, `email`, `website`, `beds`, `available_bad`,`Total_emergency_beds`,`available_emergency_bad`,`Total_icu_beds`,`available_icu_beds`,`Total_general_beds`,`available_general_bad`, `last_updated`) VALUES 
('25', 'MGM', 'Aurangabad', 'CIDCO', 'Maharashtra', '431001', '8857845780', 'shaikhrafat25@gmail.com', 'MGM.com', '200', '100','50','30','50','20','100','50', current_timestamp()),
('4', 'Sigma', 'Aurangabad', 'Beed by pass', 'Maharashtra', '431001', '9146585763', 'rohit98waghmare@gmail.com', 'Sigma.com', '200', '100','50','30','50','20','100','50', current_timestamp());

INSERT INTO `users` (`username`,`user_id`,`password`,`register_time`) VALUES 
('Rafat','25','Rafat', current_timestamp()),
('Rohit','4','Rohit', current_timestamp());

INSERT INTO `user_info` (`user_id`, `username`, `city`, `address`, `state`, `phonenumber`, `email`) VALUES 
('25', 'Rafat', 'Aurangabad', 'Beed by pass', 'Maharashtra', '8857845780', 'shaikhrafat25@gmail.com'),
('4', 'Rohit', 'Aurangabad', 'Beed by pass', 'Maharashtra', '9146585763', 'rohit98waghmare@gmail.com');

INSERT INTO `admin` (`username`,`user_id`,`password`,`register_time`) VALUES 
('Rafat','25','Rafat', current_timestamp()),
('Rohit','4','Rohit', current_timestamp());