//advocates table

CREATE TABLE advocates (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    location VARCHAR(100) NOT NULL,
    reason TEXT NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);


//users table

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);


//contact_messsages

CREATE TABLE contact_messages (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100),
    subject VARCHAR(255),
    message TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

//donations

CREATE TABLE donations (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    id_type VARCHAR(50) NOT NULL,
    id_number VARCHAR(50) NOT NULL,
    message TEXT,
    amount DECIMAL(10,2) NOT NULL,
    donated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);


//organ pledges

CREATE TABLE organ_pledges (
    id INT NOT NULL AUTO_INCREMENT,
    full_name VARCHAR(100),
    parent_name VARCHAR(100),
    address TEXT,
    city VARCHAR(100),
    state VARCHAR(100),
    pincode VARCHAR(10),
    mobile VARCHAR(20),
    email VARCHAR(100),
    dob DATE,
    age INT,
    gender VARCHAR(10),
    blood_group VARCHAR(10),
    emergency_name VARCHAR(100),
    emergency_contact VARCHAR(20),
    organs TEXT,
    social_link VARCHAR(255),
    referral_source VARCHAR(255),
    declaration TINYINT(1),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);


//outreach partners

CREATE TABLE outreach_partners (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    location VARCHAR(100),
    message TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

//volunteers

CREATE TABLE volunteers (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    location VARCHAR(100) NOT NULL,
    interest TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);


//hospitals table

CREATE TABLE hospitals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    reg_no VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    email VARCHAR(100),
    phone VARCHAR(50),
    organs TEXT
);

-- Sample data
INSERT INTO hospitals (name, reg_no, address, email, phone, organs) VALUES
('Apollo Hospital', 'REG123', 'Hyderabad, Telangana', 'apollo@example.com', '9876543210', 'Kidney, Liver'),
('Global Hospitals', 'REG456', 'Chennai, Tamil Nadu', 'global@example.com', '9123456780', 'Heart, Kidney'),
('Fortis Hospital', 'REG789', 'Bangalore, Karnataka', 'fortis@example.com', '9988776655', 'Lung, Pancreas');
INSERT INTO hospitals (name, reg_no, address, email, phone, organs) VALUES
('Apollo Hospitals', 'REG001', 'Jubilee Hills, Hyderabad, Telangana', 'apollohyd@example.com', '9876543210', 'Kidney, Liver'),
('AIIMS Delhi', 'REG002', 'Ansari Nagar, New Delhi', 'aiimsdelhi@example.com', '9812345678', 'Heart, Kidney, Liver'),
('Fortis Hospital', 'REG003', 'Bannerghatta Road, Bengaluru, Karnataka', 'fortisblr@example.com', '9845123456', 'Lung, Kidney'),
('Medanta Medicity', 'REG004', 'Sector 38, Gurugram, Haryana', 'medanta@example.com', '9871234560', 'Kidney, Liver, Heart'),
('KIMS Hospital', 'REG005', 'Minister Road, Secunderabad, Telangana', 'kimshyd@example.com', '9888888888', 'Liver, Kidney'),
('Max Super Speciality Hospital', 'REG006', 'Saket, New Delhi', 'maxdelhi@example.com', '9765432100', 'Kidney, Heart'),
('CIMS Hospital', 'REG007', 'Science City Road, Ahmedabad, Gujarat', 'cimsahm@example.com', '9898989898', 'Liver, Pancreas'),
('Ruby Hall Clinic', 'REG008', 'Sasoon Road, Pune, Maharashtra', 'rubyhall@example.com', '9822222222', 'Kidney, Liver'),
('Manipal Hospital', 'REG009', 'Old Airport Road, Bengaluru, Karnataka', 'manipalblr@example.com', '9900112233', 'Heart, Kidney'),
('Global Hospitals', 'REG010', 'Perumbakkam, Chennai, Tamil Nadu', 'globalchn@example.com', '9888777666', 'Lung, Liver'),

('Narayana Health', 'REG011', 'Bommasandra, Bengaluru, Karnataka', 'narayana@example.com', '9870011223', 'Heart, Liver'),
('Christian Medical College', 'REG012', 'IDA Scudder Road, Vellore, Tamil Nadu', 'cmcvellore@example.com', '9000123456', 'Kidney, Pancreas'),
('Sir Ganga Ram Hospital', 'REG013', 'Rajinder Nagar, New Delhi', 'sgrh@example.com', '9700011223', 'Kidney, Liver'),
('Lilavati Hospital', 'REG014', 'Bandra West, Mumbai, Maharashtra', 'lilavati@example.com', '9823012345', 'Heart, Kidney'),
('PGIMER', 'REG015', 'Sector 12, Chandigarh', 'pgichd@example.com', '9811122233', 'Kidney, Liver'),
('Kokilaben Dhirubhai Ambani Hospital', 'REG016', 'Andheri West, Mumbai, Maharashtra', 'kda@example.com', '9767778899', 'Heart, Lung'),
('Yashoda Hospital', 'REG017', 'Somajiguda, Hyderabad, Telangana', 'yashoda@example.com', '9898232323', 'Kidney, Liver'),
('Care Hospitals', 'REG018', 'Banjara Hills, Hyderabad, Telangana', 'carehyd@example.com', '9819988776', 'Kidney, Liver, Heart'),
('Rela Institute', 'REG019', 'Chromepet, Chennai, Tamil Nadu', 'relachn@example.com', '9008880007', 'Liver, Kidney'),
('Aster Medcity', 'REG020', 'Cheranallur, Kochi, Kerala', 'asterkochi@example.com', '9891010101', 'Kidney, Liver'),

('Amrita Institute', 'REG021', 'Ponekkara, Kochi, Kerala', 'amrita@example.com', '9755555555', 'Liver, Kidney'),
('BM Birla Heart Research Centre', 'REG022', 'Alipore, Kolkata, West Bengal', 'bmbirla@example.com', '9810000002', 'Heart'),
('Tata Memorial Hospital', 'REG023', 'Parel, Mumbai, Maharashtra', 'tataoncology@example.com', '9922003311', 'Lung, Liver'),
('Shalby Hospitals', 'REG024', 'SG Highway, Ahmedabad, Gujarat', 'shalbyahm@example.com', '9829002211', 'Kidney'),
('Apollo Gleneagles Hospital', 'REG025', 'Salt Lake, Kolkata, West Bengal', 'apollokolkata@example.com', '9902211334', 'Kidney, Liver'),
('Columbia Asia Hospital', 'REG026', 'Yeshwanthpur, Bengaluru, Karnataka', 'columbiaasia@example.com', '9787888999', 'Lung, Liver'),
('Rainbow Children’s Hospital', 'REG027', 'Banjara Hills, Hyderabad', 'rainbowhyd@example.com', '9811899991', 'Liver, Pancreas'),
('Ramakrishna Hospital', 'REG028', 'Coimbatore, Tamil Nadu', 'ramakrishna@example.com', '9798675432', 'Kidney'),
('Holy Family Hospital', 'REG029', 'Okhla Road, New Delhi', 'holyfamily@example.com', '9815678912', 'Heart, Kidney'),
('SevenHills Hospital', 'REG030', 'Marol, Mumbai, Maharashtra', 'sevenhills@example.com', '9888881122', 'Kidney, Liver'),

('Sunshine Hospitals', 'REG031', 'Secunderabad, Telangana', 'sunshine@example.com', '9002233445', 'Kidney'),
('MGM Healthcare', 'REG032', 'Nelson Manickam Rd, Chennai', 'mgmchn@example.com', '9899221122', 'Heart, Liver'),
('Aakash Healthcare', 'REG033', 'Dwarka, New Delhi', 'aakashdelhi@example.com', '9812349876', 'Kidney, Pancreas'),
('Breach Candy Hospital', 'REG034', 'Mumbai, Maharashtra', 'breachcandy@example.com', '9877788990', 'Kidney'),
('Sparsh Hospital', 'REG035', 'Yeshwanthpur, Bengaluru', 'sparsh@example.com', '9766778899', 'Liver'),
('Indraprastha Apollo Hospital', 'REG036', 'Sarita Vihar, New Delhi', 'iapollo@example.com', '9818877665', 'Heart, Kidney'),
('Vikram Hospital', 'REG037', 'Millers Road, Bengaluru', 'vikramblr@example.com', '9898998989', 'Kidney'),
('Moolchand Medcity', 'REG038', 'Lajpat Nagar, New Delhi', 'moolchand@example.com', '9777776666', 'Lung, Liver'),
('KEM Hospital', 'REG039', 'Parel, Mumbai', 'kemmumbai@example.com', '9911223344', 'Kidney, Liver'),
('JIPMER', 'REG040', 'Puducherry', 'jipmer@example.com', '9001112233', 'Kidney, Liver'),

('Wockhardt Hospital', 'REG041', 'Mira Road, Mumbai', 'wockhardt@example.com', '9888999000', 'Heart, Kidney'),
('Sahyadri Hospitals', 'REG042', 'Deccan Gymkhana, Pune', 'sahyadripune@example.com', '9823456789', 'Kidney'),
('Cloudnine Hospital', 'REG043', 'Jayanagar, Bengaluru', 'cloudnine@example.com', '9900001122', 'Liver, Pancreas'),
('Deenanath Mangeshkar Hospital', 'REG044', 'Erandwane, Pune', 'dmh@example.com', '9898985656', 'Kidney, Heart'),
('Apex Hospital', 'REG045', 'Jaipur, Rajasthan', 'apexjaipur@example.com', '9874561230', 'Kidney, Liver'),
('Zydus Hospitals', 'REG046', 'Thaltej, Ahmedabad', 'zydusahm@example.com', '9821212323', 'Lung, Liver'),
('Kovai Medical Center', 'REG047', 'Avinashi Road, Coimbatore', 'kmch@example.com', '9798654321', 'Kidney'),
('Sterling Hospital', 'REG048', 'Memnagar, Ahmedabad', 'sterling@example.com', '9877891234', 'Liver, Pancreas'),
('Sancheti Hospital', 'REG049', 'Shivaji Nagar, Pune', 'sancheti@example.com', '9909901122', 'Kidney, Heart'),
('MIOT International', 'REG050', 'Manapakkam, Chennai', 'miot@example.com', '9888123456', 'Lung, Liver');
INSERT INTO hospitals (name, reg_no, address, email, phone, organs) VALUES
('AIIMS Delhi', 'REG101', 'Ansari Nagar, New Delhi', 'aiims.delhi@example.com', '9871001100', 'Kidney, Liver, Heart'),
('KIMS Hospital', 'REG102', 'Secunderabad, Telangana', 'kims@example.com', '9871001101', 'Kidney, Pancreas'),
('Narayana Health', 'REG103', 'Bangalore, Karnataka', 'narayana@example.com', '9871001102', 'Heart, Liver'),
('Max Healthcare', 'REG104', 'Saket, New Delhi', 'maxcare@example.com', '9871001103', 'Lung, Kidney'),
('Medanta Hospital', 'REG105', 'Gurugram, Haryana', 'medanta@example.com', '9871001104', 'Kidney, Liver, Heart'),
('Jaslok Hospital', 'REG106', 'Mumbai, Maharashtra', 'jaslok@example.com', '9871001105', 'Liver, Pancreas'),
('Lilavati Hospital', 'REG107', 'Mumbai, Maharashtra', 'lilavati@example.com', '9871001106', 'Heart, Lung'),
('PGIMER Chandigarh', 'REG108', 'Sector 12, Chandigarh', 'pgimer@example.com', '9871001107', 'Liver, Kidney'),
('CMC Vellore', 'REG109', 'Vellore, Tamil Nadu', 'cmc@example.com', '9871001108', 'Heart, Kidney'),
('Sir Ganga Ram Hospital', 'REG110', 'Rajinder Nagar, New Delhi', 'sgrh@example.com', '9871001109', 'Kidney, Liver'),

('Ruby Hall Clinic', 'REG111', 'Pune, Maharashtra', 'rubyhall@example.com', '9871001110', 'Lung, Liver'),
('Amrita Institute', 'REG112', 'Kochi, Kerala', 'amrita@example.com', '9871001111', 'Kidney, Pancreas'),
('BGS Global Hospital', 'REG113', 'Bangalore, Karnataka', 'bgsglobal@example.com', '9871001112', 'Liver, Heart'),
('Sri Ramachandra Hospital', 'REG114', 'Chennai, Tamil Nadu', 'srh@example.com', '9871001113', 'Kidney, Lung'),
('Apollo Gleneagles', 'REG115', 'Kolkata, West Bengal', 'apollogne@example.com', '9871001114', 'Heart, Pancreas'),
('Kokilaben Hospital', 'REG116', 'Andheri, Mumbai', 'kokilaben@example.com', '9871001115', 'Liver, Kidney'),
('Yashoda Hospitals', 'REG117', 'Hyderabad, Telangana', 'yashoda@example.com', '9871001116', 'Liver, Pancreas'),
('Manipal Hospital', 'REG118', 'Whitefield, Bangalore', 'manipal@example.com', '9871001117', 'Heart, Kidney'),
('Sankara Nethralaya', 'REG119', 'Chennai, Tamil Nadu', 'sankara@example.com', '9871001118', 'Liver'),
('Rajagiri Hospital', 'REG120', 'Aluva, Kerala', 'rajagiri@example.com', '9871001119', 'Kidney, Liver'),

('Care Hospitals', 'REG121', 'Banjara Hills, Hyderabad', 'care@example.com', '9871001120', 'Heart, Kidney'),
('IMS Bhubaneswar', 'REG122', 'Bhubaneswar, Odisha', 'imsbhub@example.com', '9871001121', 'Pancreas, Liver'),
('Tata Memorial Hospital', 'REG123', 'Parel, Mumbai', 'tmh@example.com', '9871001122', 'Kidney, Liver'),
('HCG Cancer Hospital', 'REG124', 'Bangalore, Karnataka', 'hcg@example.com', '9871001123', 'Kidney, Lung'),
('Fortis Mohali', 'REG125', 'Mohali, Punjab', 'fortismohali@example.com', '9871001124', 'Heart, Liver'),
('Global Hospital', 'REG126', 'Parel, Mumbai', 'globalmumbai@example.com', '9871001125', 'Kidney, Pancreas'),
('Sunshine Hospital', 'REG127', 'Secunderabad, Telangana', 'sunshine@example.com', '9871001126', 'Kidney, Lung'),
('Aster Medcity', 'REG128', 'Ernakulam, Kerala', 'aster@example.com', '9871001127', 'Liver, Heart'),
('SRM Medical College', 'REG129', 'Kattankulathur, Tamil Nadu', 'srmmed@example.com', '9871001128', 'Kidney'),
('Vinayaka Missions Hospital', 'REG130', 'Salem, Tamil Nadu', 'vinayaka@example.com', '9871001129', 'Kidney, Liver');
INSERT INTO hospitals (name, reg_no, address, email, phone, organs) VALUES
('KIMS Hospital', 'REG190', 'Secunderabad, Telangana', 'kims@hospital.com', '9966778899', 'Kidney, Liver'),
('Lilavati Hospital', 'REG191', 'Mumbai, Maharashtra', 'lilavati@hospital.com', '9820011223', 'Heart, Lung'),
('Care Hospitals', 'REG192', 'Visakhapatnam, Andhra Pradesh', 'care@hospital.com', '9845332211', 'Liver, Pancreas'),
('Jehangir Hospital', 'REG193', 'Pune, Maharashtra', 'jehangir@hospital.com', '9887766554', 'Kidney, Heart'),
('Manipal Hospital', 'REG194', 'Mangalore, Karnataka', 'manipal@hospital.com', '9734556677', 'Lung, Liver'),
('Max Smart Super Specialty', 'REG195', 'Saket, New Delhi', 'maxsmart@hospital.com', '9871234567', 'Kidney, Liver'),
('Ruby Hall Clinic', 'REG196', 'Pune, Maharashtra', 'rubyhall@clinic.com', '9622334455', 'Liver, Heart'),
('Amrita Institute of Medical Sciences', 'REG197', 'Kochi, Kerala', 'amrita@hospital.com', '9898989898', 'Liver, Pancreas'),
('Yashoda Hospitals', 'REG198', 'Hyderabad, Telangana', 'yashoda@hospital.com', '9990001112', 'Kidney, Liver'),
('Columbia Asia Hospital', 'REG199', 'Gurgaon, Haryana', 'columbia@asia.com', '9866554321', 'Lung, Heart'),
('Medanta - The Medicity', 'REG200', 'Gurgaon, Haryana', 'medanta@hospital.com', '9812233445', 'Heart, Liver'),
('SevenHills Hospital', 'REG201', 'Visakhapatnam, Andhra Pradesh', 'sevenhills@hospital.com', '9888123456', 'Kidney, Pancreas'),
('Hinduja Hospital', 'REG202', 'Mumbai, Maharashtra', 'hinduja@hospital.com', '9820045678', 'Heart, Liver'),
('Religare Health', 'REG203', 'Lucknow, Uttar Pradesh', 'religare@hospital.com', '9797979797', 'Lung, Kidney'),
('Sunshine Hospitals', 'REG204', 'Secunderabad, Telangana', 'sunshine@hospital.com', '9611122334', 'Liver, Pancreas'),
('BGS Global Hospitals', 'REG205', 'Bangalore, Karnataka', 'bgsglobal@hospital.com', '9900112233', 'Kidney, Heart'),
('Meenakshi Mission Hospital', 'REG206', 'Madurai, Tamil Nadu', 'meenakshi@hospital.com', '9685741236', 'Pancreas, Kidney'),
('Moolchand Medcity', 'REG207', 'Delhi, India', 'moolchand@hospital.com', '9911223344', 'Liver, Heart'),
('Shalby Hospital', 'REG208', 'Ahmedabad, Gujarat', 'shalby@hospital.com', '9922334455', 'Kidney, Liver'),
('Artemis Hospital', 'REG209', 'Gurgaon, Haryana', 'artemis@hospital.com', '9810101010', 'Heart, Lung'),
('Sparsh Hospital', 'REG210', 'Bangalore, Karnataka', 'sparsh@hospital.com', '9822221110', 'Liver, Pancreas'),
('Kokilaben Dhirubhai Ambani Hospital', 'REG211', 'Mumbai, Maharashtra', 'kokilaben@hospital.com', '9800887766', 'Heart, Liver'),
('Rajiv Gandhi Government General Hospital', 'REG212', 'Chennai, Tamil Nadu', 'rgggh@hospital.com', '9844123445', 'Kidney, Pancreas'),
('Breach Candy Hospital', 'REG213', 'Mumbai, Maharashtra', 'breachcandy@hospital.com', '9977554433', 'Liver, Heart'),
('Indraprastha Apollo Hospital', 'REG214', 'New Delhi, India', 'indraprastha@apollo.com', '9866550011', 'Kidney, Lung'),
('Tata Memorial Hospital', 'REG215', 'Mumbai, Maharashtra', 'tatamemorial@hospital.com', '9898982828', 'Liver, Heart'),
('AIIMS Bhopal', 'REG216', 'Bhopal, Madhya Pradesh', 'aiims.bhopal@aiims.gov.in', '9753112233', 'Kidney, Pancreas'),
('Sri Ramachandra Medical Centre', 'REG217', 'Chennai, Tamil Nadu', 'srmc@hospital.com', '9898445566', 'Heart, Lung'),
('Narayana Health', 'REG218', 'Jaipur, Rajasthan', 'narayana@hospital.com', '9123450987', 'Liver, Pancreas'),
('Paras Hospital', 'REG219', 'Patna, Bihar', 'paras@hospital.com', '9788899922', 'Kidney, Heart');
