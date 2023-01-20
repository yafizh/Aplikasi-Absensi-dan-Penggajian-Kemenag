DROP DATABASE IF EXISTS `db_kemenag`;
CREATE DATABASE `db_kemenag`;

CREATE TABLE `db_kemenag`.`user` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) UNIQUE,
    `password` VARCHAR(255),
    `status` VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE `db_kemenag`.`jabatan` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nama` VARCHAR(255),
    `golongan` VARCHAR(255),
    `gaji_pokok` BIGINT UNSIGNED,
    PRIMARY KEY (id)
);

CREATE TABLE `db_kemenag`.`tunjangan` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nama` VARCHAR(255) UNIQUE,
    `tunjangan` BIGINT UNSIGNED,
    `jenis_pemberian` VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE `db_kemenag`.`pegawai` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_jabatan` BIGINT UNSIGNED NOT NULL,
    `id_user` BIGINT UNSIGNED NOT NULL,
    `nip` VARCHAR(255) NOT NULL,
    `nama` VARCHAR(255) NOT NULL,
    `nomor_telepon` VARCHAR(255) NOT NULL,
    `tmt` DATE NOT NULL,
    `tanggal_lahir` DATE NOT NULL,
    `tempat_lahir` VARCHAR(255) NOT NULL,
    `gambar` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE,
    FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE
);

CREATE TABLE `db_kemenag`.`presensi_pegawai` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_pegawai` BIGINT UNSIGNED NOT NULL,
    `tanggal_waktu` DATETIME,
    `status` VARCHAR(255),
    `jenis` VARCHAR(255),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE
);

CREATE TABLE `db_kemenag`.`tunjangan_pegawai` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_pegawai` BIGINT UNSIGNED NOT NULL,
    `id_tunjangan` BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE,
    FOREIGN KEY (`id_tunjangan`) REFERENCES `tunjangan` (`id`) ON DELETE CASCADE
);