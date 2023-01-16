DROP DATABASE IF EXISTS `db_kemenag`;
CREATE DATABASE `db_kemenag`;

CREATE TABLE `db_kemenag`.`user` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) UNIQUE,
    `password` VARCHAR(255),
    `status` VARCHAR(255),
    PRIMARY KEY (id)
);

INSERT INTO `db_kemenag`.`user` (
    `id`, 
    `username`, 
    `password`, 
    `status`
) VALUES
(1, 'admin', 'admin', 'ADMIN'),
(2, '198604072011012007', '198604072011012007', 'PEGAWAI'),
(3, '199410302018081001', '199410302018081001', 'PEGAWAI'),
(4, '196104151986081003', '196104151986081003', 'PEGAWAI');

CREATE TABLE `db_kemenag`.`jabatan` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nama` VARCHAR(255) UNIQUE,
    `golongan` VARCHAR(255),
    `gaji_pokok` BIGINT UNSIGNED,
    PRIMARY KEY (id)
);

INSERT INTO `db_kemenag`.`jabatan` (
    `id`, 
    `nama`, 
    `golongan`, 
    `gaji_pokok`
) VALUES
(1, 'Staf IT', 'III/a', 5000000),
(2, 'Petugas Keamanan', 'III/a', 3000000),
(3, 'Petugas Kebersihan', 'III/a', 2000000);


CREATE TABLE `db_kemenag`.`pegawai` (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_jabatan BIGINT UNSIGNED NOT NULL,
    id_user BIGINT UNSIGNED NOT NULL,
    nip VARCHAR(255) NOT NULL,
    nama VARCHAR(255) NOT NULL,
    nomor_telepon VARCHAR(255) NOT NULL,
    tmt DATE NOT NULL,
    tanggal_lahir DATE NOT NULL,
    tempat_lahir VARCHAR(255) NOT NULL,
    gambar VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_jabatan) REFERENCES jabatan (id),
    FOREIGN KEY (id_user) REFERENCES user (id)
);

INSERT INTO `db_kemenag`.`pegawai` (
    `id`, 
    `id_jabatan`, 
    `id_user`, 
    `nip`, 
    `nama`, 
    `nomor_telepon`, 
    `tmt`, 
    `tanggal_lahir`, 
    `tempat_lahir`, 
    `gambar`
) VALUES
(1, 1, 2, '198604072011012007', 'Erma Yunita S.Pd', '085753445678', '2014-10-01', '1986-04-07', 'Binuang', ''),
(2, 2, 3, '199410302018081001', 'Muhammad Pauji, S.STP', '087756908544', '2020-10-01', '1994-10-30', 'Martapura', ''),
(3, 3, 4, '196104151986081003', 'Sarbani S.E., M.A.P', '082134567800', '2015-02-10', '1961-04-15', 'Banjarbaru', '');