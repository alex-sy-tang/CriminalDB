
INSERT INTO Crime_charges (Charge_ID, Crime_ID, Crime_code, Charge_status, Fine_amount, Court_fee, Amount_paid, Pay_due_date)
VALUES
(2300239352, 465946624, 215, 'PD', 00000.00, 00000.00, 00000.00, '2000-01-01'), --how can we have crime charges if the status is Pending
(2300239353, 465946625, 502, 'NG', 00000.00, 00000.00, 00000.00, '2007-08-22'),
(2300239354, 465946626, 731, 'PD', 00000.00, 00000.00, 00000.00, '2008-09-01'),
(2300239355, 465946627, 148, 'GL', 45600.78, 20000.00, 10000.00, '2009-09-10'),
(2300239356, 465946628, 609, 'NG', 00000.00, 00000.00, 00000.00, '2010-09-20'),
(2300239357, 465946629, 837, 'GL', 67800.90, 30000.00, 15000.00, '2011-09-30'),
(2300239358, 465946630, 364, 'NG', 00000.00, 00000.00, 00000.00, '2012-10-10'),
(2300239359, 465946631, 521, 'GL', 89000.12, 40000.00, 20000.00, '2013-10-20'),
(2300239360, 465946632, 978, 'GL', 90100.23, 45000.00, 22005.00, '2014-10-30'),
(2300239361, 465946633, 243, 'PD', 00000.00, 00000.00, 00000.00, '2015-11-10');	


INSERT INTO Crime_officers (Crime_ID, Officer_ID)
VALUES
(465946624, 32662492),
(465946625, 32662493),
(465946626, 32662494),
(465946627, 32662495),
(465946628, 32662496),
(465946629, 32662497),
(465946630, 32662498),
(465946631, 32662499),
(465946632, 32662500),
(465946633, 32662501); 


INSERT INTO Officers (Officer_ID, Last, First, Precinct, Badge, Phone, Status)
VALUES
(32662492, 'Wang', 'Toby', 'ILMH', 'GRWJHCITDRGDQI', '555-9876','A'), 
(32662493, 'Smith', 'Emily', 'ILMH', 'GRWJHCITDRGDQI', '555-1234', 'A'),
(32662494, 'Johnson', 'David', 'ILMH', 'GRWJHCITDRGDQI', '555-5678', 'A'),
(32662495, 'Brown', 'Sarah', 'ESTE', 'GRWJHCITDRGDQI', '555-9012', 'I'),
(32662496, 'Miller', 'Michael', 'ILMH', 'GRWJHCITDRGDQI', '555-3456', 'A'),
(32662497, 'Davis', 'Jennifer', 'WSTN', 'GRWJHCITDRGDQI', '555-7890', 'A'),
(32662498, 'Wilson', 'Daniel', 'ILMH', 'GRWJHCITDRGDQI', '555-2345', 'I'),
(32662499, 'Martinez', 'Maria', 'WSTN', 'GRWJHCITDRGDQI', '555-6789', 'A'),
(32662500, 'Anderson', 'James', 'ILMH', 'GRWJHCITDRGDQI', '555-0123', 'A'),
(32662501, 'Taylor', 'Jessica', 'WSTN', 'GRWJHCITDRGDQI', '555-4567', 'I');


INSERT INTO Appeals (Appeal_ID, Crime_ID, Filling_date, Hearing_date, Status)
VALUES
(34872, 465946624, "2005-08-17", "2005-10-17", "P"), 
(34873, 465946625, "2007-08-22", "2007-11-17", "A"),
(34874, 465946626, "2008-09-01", "2008-11-28", "P"),
(34875, 465946627, "2009-09-10", "2009-12-07", "A"),
(34876, 465946628, "2010-09-20", "2010-12-17", "P"),
(34877, 465946629, "2011-09-30", "2011-01-02", "A"),
(34878, 465946630, "2012-10-10", "2012-01-12", "P"),
(34879, 465946631, "2013-10-20", "2013-01-22", "P"),
(34880, 465946632, "2014-10-30", "2014-02-01", "D"),
(34881, 465946633, "2015-11-10", "2015-02-12", "P");


INSERT INTO Crime_codes (Crime_code, Code_description)
VALUES
(215, "Petty theft of personal property."),
(502, "Driving under the influence of alcohol or drugs."),
(731, "Fraudulent use of a credit card."),
(148, "Resisting, delaying, or obstructing a peace officer."),
(609, "Burglary of a vehicle."),
(837, "Vandalism causing less than $400 in damage."),
(364, "Grand theft of personal property."),
(521, "Assault with a deadly weapon other than a firearm."),
(978, "Possession of a controlled substance for sale."),
(243, "Battery resulting in serious bodily injury.");

