-- 1
INSERT INTO Account (Private_Name, UserName, Password, Address, Function_Account) VALUES
('John Smith', 'johnsmith', 'password123', '123 Elm St', 'Admin'),
('Jane Doe', 'janedoe', 'password123', '234 Oak St', 'Admin'),
('Alice Johnson', 'alicejohnson', 'password123', '345 Maple St', 'Admin'),
('Bob Brown', 'bobbrown', 'password123', '456 Pine St', 'Hospital'),
('Charlie Davis', 'charliedavis', 'password123', '567 Cedar St', 'Hospital'),
('Dana White', 'danawhite', 'password123', '678 Birch St', 'Hospital'),
('Eve Black', 'eveblack', 'password123', '789 Spruce St', 'Hospital'),
('Frank Green', 'frankgreen', 'password123', '890 Redwood St', 'Hospital'),
('Grace Blue', 'graceblue', 'password123', '901 Fir St', 'Hospital'),
('Henry Yellow', 'henryyellow', 'password123', '123 Willow St', 'Hospital'),
('Ivy Purple', 'ivypurple', 'password123', '234 Ash St', 'Examiner'),
('Jack Orange', 'jackorange', 'password123', '345 Beech St', 'Examiner'),
('Karen Pink', 'karenpink', 'password123', '456 Cherry St', 'Examiner'),
('Leo Grey', 'leogrey', 'password123', '567 Palm St', 'Examiner'),
('Mia Red', 'miared', 'password123', '678 Olive St', 'Examiner'),
('Nina Violet', 'ninaviolet', 'password123', '789 Cedar St', 'Examiner'),
('Oscar Brown', 'oscarbrown', 'password123', '890 Alder St', 'Examiner'),
('Paul White', 'paulwhite', 'password123', '901 Pine St', 'Examiner'),
('Quincy Blue', 'quincyblue', 'password123', '123 Fir St', 'Examiner'),
('Rita Green', 'ritagreen', 'password123', '234 Maple St', 'Examiner'),
('Steve Black', 'steveblack', 'password123', '345 Oak St', 'Examiner');
-- 2
INSERT INTO Admin_Account (ID_Account) VALUES
(1),
(2),
(3);
-- 3
INSERT INTO Hospital_Account (ID_Account) VALUES
(4),
(5),
(6),
(7),
(8),
(9),
(10);
-- 4
INSERT INTO Examiner (ID_Account, ID_Hospital_Account) VALUES
(11, 1),
(12, 2),
(13, 3),
(14, 4),
(15, 5),
(16, 6),
(17, 7),
(18, 1),
(19, 2),
(20, 3);
-- 5
INSERT INTO Donator (Citizen_identification, Age, Phone, Blood_Type, Name, Amount, Date) VALUES
(1001, 25, '555-1234', 'A+', 'Alice Smith', 500, CURRENT_TIMESTAMP),
(1002, 30, '555-2345', 'B+', 'Bob Johnson', 450, CURRENT_TIMESTAMP),
(1003, 22, '555-3456', 'O-', 'Charlie Brown', 300, CURRENT_TIMESTAMP),
(1004, 28, '555-4567', 'AB+', 'Diana Prince', 600, CURRENT_TIMESTAMP),
(1005, 35, '555-5678', 'A-', 'Eve White', 550, CURRENT_TIMESTAMP),
(1006, 40, '555-6789', 'B-', 'Frank Green', 500, CURRENT_TIMESTAMP),
(1007, 45, '555-7890', 'O+', 'Grace Blue', 400, CURRENT_TIMESTAMP),
(1008, 50, '555-8901', 'A+', 'Hank Black', 450, CURRENT_TIMESTAMP),
(1009, 27, '555-9012', 'B+', 'Ivy Red', 600, CURRENT_TIMESTAMP),
(1010, 32, '555-1233', 'O-', 'Jack White', 300, CURRENT_TIMESTAMP),
(1011, 29, '555-2344', 'AB+', 'Karen Green', 500, CURRENT_TIMESTAMP),
(1012, 34, '555-3455', 'A+', 'Leo Yellow', 450, CURRENT_TIMESTAMP),
(1013, 26, '555-4566', 'B+', 'Mia Brown', 350, CURRENT_TIMESTAMP),
(1014, 31, '555-5677', 'O-', 'Nina Purple', 400, CURRENT_TIMESTAMP),
(1015, 36, '555-6788', 'AB+', 'Oscar Pink', 550, CURRENT_TIMESTAMP),
(1016, 41, '555-7899', 'A-', 'Paul Orange', 600, CURRENT_TIMESTAMP),
(1017, 46, '555-8900', 'B-', 'Quincy Violet', 300, CURRENT_TIMESTAMP),
(1018, 51, '555-9011', 'O+', 'Rita Black', 500, CURRENT_TIMESTAMP),
(1019, 26, '555-1235', 'A+', 'Steve Blue', 450, CURRENT_TIMESTAMP),
(1020, 33, '555-2346', 'B+', 'Tina Green', 400, CURRENT_TIMESTAMP),
(1021, 38, '555-3457', 'O-', 'Uma Red', 550, CURRENT_TIMESTAMP),
(1022, 43, '555-4568', 'AB+', 'Victor White', 600, CURRENT_TIMESTAMP),
(1023, 48, '555-5679', 'A-', 'Wendy Brown', 300, CURRENT_TIMESTAMP),
(1024, 53, '555-6780', 'B-', 'Xander Black', 500, CURRENT_TIMESTAMP),
(1025, 27, '555-7891', 'O+', 'Yara Green', 450, CURRENT_TIMESTAMP),
(1026, 37, '555-8902', 'A+', 'Zane Blue', 400, CURRENT_TIMESTAMP),
(1027, 24, '555-9013', 'B+', 'Alan Brown', 350, CURRENT_TIMESTAMP),
(1028, 29, '555-1236', 'O-', 'Bella Purple', 500, CURRENT_TIMESTAMP),
(1029, 34, '555-2347', 'AB+', 'Cody Pink', 450, CURRENT_TIMESTAMP),
(1030, 39, '555-3458', 'A-', 'Daisy Orange', 600, CURRENT_TIMESTAMP),
(1031, 44, '555-4569', 'B-', 'Ethan Violet', 300, CURRENT_TIMESTAMP),
(1032, 49, '555-5670', 'O+', 'Fiona Black', 500, CURRENT_TIMESTAMP),
(1033, 25, '555-6781', 'A+', 'Gabe Blue', 450, CURRENT_TIMESTAMP),
(1034, 28, '555-7892', 'B+', 'Holly Green', 400, CURRENT_TIMESTAMP),
(1035, 32, '555-8903', 'O-', 'Ivan Red', 550, CURRENT_TIMESTAMP),
(1036, 36, '555-9014', 'AB+', 'Julia White', 600, CURRENT_TIMESTAMP),
(1037, 42, '555-1237', 'A-', 'Kevin Brown', 300, CURRENT_TIMESTAMP),
(1038, 47, '555-2348', 'B-', 'Lara Black', 500, CURRENT_TIMESTAMP),
(1039, 52, '555-3459', 'O+', 'Mike Green', 450, CURRENT_TIMESTAMP),
(1040, 55, '555-4560', 'A+', 'Nina Blue', 400, CURRENT_TIMESTAMP);
-- 6
-- Insert A+ blood type records
INSERT INTO Blood_Bank (ID_Hospital, Blood_Type, Amount) VALUES
(1, 'A+', 1500), -- Assuming hospital 4
(2, 'A+', 1500), -- Assuming hospital 5
(3, 'A+', 1500), -- Assuming hospital 6
(4, 'A+', 1500), -- Assuming hospital 7
(5, 'A+', 1500), -- Assuming hospital 8
(6, 'A+', 1500), -- Assuming hospital 9
(7, 'A+', 1500); -- Assuming hospital 10

-- Insert B+ blood type records
INSERT INTO Blood_Bank (ID_Hospital, Blood_Type, Amount) VALUES
(1, 'B+', 1350), -- Assuming hospital 4
(2, 'B+', 1350), -- Assuming hospital 5
(3, 'B+', 1350), -- Assuming hospital 6
(4, 'B+', 1350), -- Assuming hospital 7
(5, 'B+', 1350), -- Assuming hospital 8
(6, 'B+', 1350), -- Assuming hospital 9
(7, 'B+', 1350); -- Assuming hospital 10

-- Insert O- blood type records
INSERT INTO Blood_Bank (ID_Hospital, Blood_Type, Amount) VALUES
(1, 'O-', 1650), -- Assuming hospital 4
(2, 'O-', 1650), -- Assuming hospital 5
(3, 'O-', 1650), -- Assuming hospital 6
(4, 'O-', 1650), -- Assuming hospital 7
(5, 'O-', 1650), -- Assuming hospital 8
(6, 'O-', 1650), -- Assuming hospital 9
(7, 'O-', 1650); -- Assuming hospital 10

-- Insert AB+ blood type records
INSERT INTO Blood_Bank (ID_Hospital, Blood_Type, Amount) VALUES
(1, 'AB+', 2000), -- Assuming hospital 4
(2, 'AB+', 2000), -- Assuming hospital 5
(3, 'AB+', 2000), -- Assuming hospital 6
(4, 'AB+', 2000), -- Assuming hospital 7
(5, 'AB+', 2000), -- Assuming hospital 8
(6, 'AB+', 2000), -- Assuming hospital 9
(7, 'AB+', 2000); -- Assuming hospital 10

-- Insert A- blood type records
INSERT INTO Blood_Bank (ID_Hospital, Blood_Type, Amount) VALUES
(1, 'A-', 1650), -- Assuming hospital 4
(2, 'A-', 1650), -- Assuming hospital 5
(3, 'A-', 1650), -- Assuming hospital 6
(4, 'A-', 1650), -- Assuming hospital 7
(5, 'A-', 1650), -- Assuming hospital 8
(6, 'A-', 1650), -- Assuming hospital 9
(7, 'A-', 1650); -- Assuming hospital 10

-- Insert B- blood type records
INSERT INTO Blood_Bank (ID_Hospital, Blood_Type, Amount) VALUES
(1, 'B-', 1350), -- Assuming hospital 4
(2, 'B-', 1350), -- Assuming hospital 5
(3, 'B-', 1350), -- Assuming hospital 6
(4, 'B-', 1350), -- Assuming hospital 7
(5, 'B-', 1350), -- Assuming hospital 8
(6, 'B-', 1350), -- Assuming hospital 9
(7, 'B-', 1350); -- Assuming hospital 10

-- Insert O+ blood type records
INSERT INTO Blood_Bank (ID_Hospital, Blood_Type, Amount) VALUES
(1, 'O+', 1550), -- Assuming hospital 4
(2, 'O+', 1550), -- Assuming hospital 5
(3, 'O+', 1550), -- Assuming hospital 6
(4, 'O+', 1550), -- Assuming hospital 7
(5, 'O+', 1550), -- Assuming hospital 8
(6, 'O+', 1550), -- Assuming hospital 9
(7, 'O+', 1550); -- Assuming hospital 10

-- 7

INSERT INTO Queue (ID_Hospital, Blood_Type, Amount, Status) VALUES
(1, 'A+', 300, 'waiting'),
(2, 'B+', 250, 'waiting'),
(3, 'O-', 400, 'waiting'),
(4, 'AB+', 350, 'waiting'),
(5, 'A-', 300, 'waiting'),
(6, 'B-', 200, 'waiting'),
(7, 'O+', 450, 'waiting'),
(1, 'A+', 200, 'done'),
(2, 'B+', 150, 'done'),
(3, 'O-', 250, 'done');

-- 8
INSERT INTO History_Of_Transfer (ID_Queue, ID_Adapted_Hospital) VALUES
(8, 1),  -- Assuming Queue ID 8 has been transferred to Hospital 4
(9, 2),  -- Assuming Queue ID 9 has been transferred to Hospital 5
(10, 3);  -- Assuming Queue ID 10 has been transferred to Hospital 6