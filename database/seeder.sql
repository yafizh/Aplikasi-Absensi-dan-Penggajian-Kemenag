INSERT INTO `db_kemenag`.`user` (
    `id`, 
    `username`, 
    `password`, 
    `status`
) VALUES
(1, 'admin', 'admin', 'ADMIN');

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