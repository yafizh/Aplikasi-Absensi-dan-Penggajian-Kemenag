INSERT INTO `db_kemenag`.`user` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'ADMIN'),
(2, '197707132000121001', '197707132000121001', 'PEGAWAI'),
(3, '196801101997031003', '196801101997031003', 'PEGAWAI'),
(4, '196605161988032001', '196605161988032001', 'PEGAWAI'),
(5, '197004052005011006', '197004052005011006', 'PEGAWAI'),
(6, '197304062006041007', '197304062006041007', 'PEGAWAI'),
(7, '197109012006042007', '197109012006042007', 'PEGAWAI'),
(8, '197410042007012026', '197410042007012026', 'PEGAWAI'),
(9, '197312072007011016', '197312072007011016', 'PEGAWAI'),
(10, '198312032011011006', '198312032011011006', 'PEGAWAI'),
(11, '197106052005011007', '197106052005011007', 'PEGAWAI'),
(12, '196512291989112002', '196512291989112002', 'PEGAWAI'),
(13, '197509262009101001', '197509262009101001', 'PEGAWAI'),
(14, '198010042009011009', '198010042009011009', 'PEGAWAI'),
(15, '199310242020122008', '199310242020122008', 'PEGAWAI'),
(16, '199205122020121015', '199205122020121015', 'PEGAWAI'),
(17, '199204132022032002', '199204132022032002', 'PEGAWAI'),
(18, '196910092005011007', '196910092005011007', 'PEGAWAI'),
(19, '198209292009012008', '198209292009012008', 'PEGAWAI'),
(20, '197811212007102002', '197811212007102002', 'PEGAWAI');

INSERT INTO `db_kemenag`.`jabatan` (
    `id`, 
    `nama`, 
    `golongan`, 
    `gaji_pokok`
) VALUES
(1, 'Kepala Kantor', 'IV/b', 4000000),
(2, 'Sub Bagian Tata Usaha', 'III/d', 3000000),
(3, 'Sub Bagian Tata Usaha', 'III/c', 2800000),
(4, 'Sub Bagian Tata Usaha', 'III/b', 2600000),
(5, 'Sub Bagian Tata Usaha', 'III/a', 2500000),
(6, 'Sub Bagian Tata Usaha', 'II/c', 2300000),
(7, 'Seksi Pendidikan Madrasah', 'IV/b', 3100000),
(8, 'Seksi Pendidikan Madrasah', 'IV/a', 3000000),
(9, 'Seksi Pendidikan Madrasah', 'III/b', 2600000),
(10, 'Seksi Pendidikan Madrasah', 'III/a', 2500000),
(11, 'Seksi Pendidikan Diniyah dan Pondok Pesantren', 'III/d', 2900000),
(12, 'Seksi Pendidikan Diniyah dan Pondok Pesantren', 'III/b', 2600000),
(13, 'Seksi Pendidikan Agama Islam', 'IV/b', 3100000),
(14, 'Seksi Pendidikan Agama Islam', 'IV/a', 3000000),
(15, 'Seksi Pendidikan Agama Islam', 'III/d', 2900000),
(16, 'Seksi Pendidikan Agama Islam', 'II/d', 2300000),
(17, 'Seksi Penyelenggaraan Haji dan Umrah', 'IV/a', 3000000),
(18, 'Seksi Penyelenggaraan Haji dan Umrah', 'III/d', 2900000),
(19, 'Seksi Penyelenggaraan Haji dan Umrah', 'III/c', 2800000),
(20, 'Seksi Penyelenggaraan Haji dan Umrah', 'II/b', 2200000),
(21, 'Seksi Bimbingan Masyarakat Islam', 'III/d', 2900000),
(22, 'Seksi Bimbingan Masyarakat Islam', 'III/c', 2800000),
(23, 'Seksi Bimbingan Masyarakat Islam', 'II/b', 2300000),
(24, 'Penyelenggara Zakat dan Wakaf', 'III/c', 2800000);

INSERT INTO `db_kemenag`.`tunjangan` (
    `id`, 
    `nama`, 
    `tunjangan`, 
    `jenis_pemberian`
) VALUES
(1, 'Keluarga', 1500000, 'Bulanan'),
(2, 'Makan', 40000, 'Harian'),
(3, 'Transportasi', 30000, 'Harian');

INSERT INTO `db_kemenag`.`pegawai` (`id`, `id_jabatan`, `id_user`, `nip`, `nama`, `nomor_telepon`, `tmt`, `tanggal_lahir`, `tempat_lahir`, `gambar`) VALUES
(1, 1, 2, '197707132000121001', 'H. EDDY KHAIRANI. Z S.Ag., M.Pd.I', '0875886304064', '2022-02-10', '1977-07-13', 'Banjarmasin', 'uploads/20230120095148.'),
(2, 2, 3, '196801101997031003', 'H. SABERI, S.Ag', '0818165770520', '2021-07-15', '1968-01-10', 'Banjarbaru', 'uploads/20230120095445.'),
(3, 2, 4, '196605161988032001', 'MALA ERLIYANA, S.Pd.I', '0853401806', '2021-08-01', '1966-05-16', 'Banjarmasin', 'uploads/20230120095624.'),
(4, 2, 5, '197004052005011006', 'MUHAMMAD FAUZI, S.Ag', '085101350754', '2017-04-01', '1970-04-05', 'Banjarbaru', 'uploads/20230120095731.'),
(5, 2, 6, '197304062006041007', 'MUSLIMIN, S.Sos', '087131118097', '2018-10-01', '1973-04-06', 'Binuang', 'uploads/20230120095906.'),
(6, 2, 7, '197109012006042007', 'Hj. NORHALIS SAHYR, S.E', '0825616234', '2018-10-01', '1971-09-01', 'Martapura', 'uploads/20230120100052.'),
(7, 2, 8, '197410042007012026', 'Hj. NAHDHIYATUL ANSHARIYAH S.Ag', '082430583930', '2021-10-01', '1974-10-04', 'Banjarmasin', 'uploads/20230120100215.'),
(8, 3, 9, '197312072007011016', 'MUHAMMAD YAMANI, S.Ag., M.M', '0878794910', '2019-04-01', '1973-12-07', 'Banjarmasin', 'uploads/20230120100405.'),
(9, 3, 10, '198312032011011006', 'SIRAJUDDIN, S.H.I., M.M', '0812102174173', '2019-04-01', '1983-12-03', 'Banjarmasin', 'uploads/20230120100507.'),
(10, 3, 11, '197106052005011007', 'H. ZAINUDIN, S.A.P', '08199514934', '2019-10-01', '1971-06-05', 'Binuang', 'uploads/20230120100604.'),
(11, 4, 12, '196512291989112002', 'Hj. RAHIMAH', '082931484750', '2010-04-01', '1965-12-29', 'Martapura', 'uploads/20230120100832.'),
(12, 4, 13, '197509262009101001', 'AKHMAD JUNAIDI, S.Ag', '0870785728', '2014-10-01', '1975-09-26', 'Banjarbaru', 'uploads/20230120101224.'),
(13, 4, 14, '198010042009011009', 'MUFDI BUDIMANSYAH, S.Pd.I', '085933673735', '2020-10-01', '1980-10-04', 'Banjarmasin', 'uploads/20230120101336.'),
(14, 5, 15, '199310242020122008', 'MARFU`AH, S.Pd', '818917236896', '2022-01-01', '1993-10-24', 'Banjarmasin', 'uploads/20230120101430.'),
(15, 5, 16, '199205122020121015', 'FATHURRAHMAN, S.Kom', '863506206803', '2022-01-01', '1992-05-12', 'Banjarmasin', 'uploads/20230120101530.'),
(16, 5, 17, '199204132022032002', 'FITRIANI, S.E.I', '0873044799', '2022-03-01', '1992-04-13', 'Banjarmasin', 'uploads/20230120101627.'),
(17, 6, 18, '196910092005011007', 'MUHAMAD NOOR', '0829222476724', '2013-10-01', '1969-10-09', 'Binuang', 'uploads/20230120101731.'),
(18, 6, 19, '198209292009012008', 'IPIT RUKINAH', '0816313295982', '2018-10-01', '1982-09-29', 'Binuang', 'uploads/20230120101846.'),
(19, 6, 20, '197811212007102002', 'RAHLIYANI', '089064835677', '2018-10-01', '1978-11-21', 'Banjarbaru', 'uploads/20230120101951.');

INSERT INTO `db_kemenag`.`tunjangan_pegawai` (`id`, `id_pegawai`, `id_tunjangan`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 3, 1),
(8, 3, 2),
(9, 3, 3),
(10, 4, 1),
(11, 4, 2),
(12, 4, 3),
(13, 5, 1),
(14, 5, 2),
(15, 5, 3),
(16, 6, 1),
(17, 6, 2),
(18, 6, 3),
(19, 7, 1),
(20, 7, 2),
(21, 7, 3),
(22, 8, 1),
(23, 8, 2),
(24, 8, 3),
(25, 9, 1),
(26, 9, 2),
(27, 9, 3),
(28, 10, 1),
(29, 10, 2),
(30, 10, 3),
(31, 11, 1),
(32, 11, 2),
(33, 11, 3),
(34, 12, 1),
(35, 12, 2),
(36, 12, 3),
(37, 13, 1),
(38, 13, 2),
(39, 13, 3),
(40, 14, 1),
(41, 14, 2),
(42, 14, 3),
(43, 15, 1),
(44, 15, 2),
(45, 15, 3),
(46, 16, 1),
(47, 16, 2),
(48, 16, 3),
(49, 17, 1),
(50, 17, 2),
(51, 17, 3),
(52, 18, 1),
(53, 18, 2),
(54, 18, 3),
(55, 19, 1),
(56, 19, 2),
(57, 19, 3);