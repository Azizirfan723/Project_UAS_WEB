USE `uas_aple`;

-- SHOW TABLES;

-- DESC produk_selesai;

-- SELECT COUNT(`id`) AS jumlah FROM produk_selesai WHERE;

-- SELECT jumlah_barang FROM produk_selesai WHERE tanggal_selesai='2022-11-23'; SELECT * FROM produk_selesai;

-- INSERT INTO produk_selesai(id, kode_barang, nama_barang, tanggal_selesai, jumlah_barang, akun_id_user) VALUES (NULL,'IPAD07','Ipad Mac Pro 6','2022-11-02','100','4');
-- INSERT INTO produk_selesai(id, kode_barang, nama_barang, tanggal_selesai, jumlah_barang, akun_id_user) VALUES (NULL,'IPAD08','Ipad Mac Pro 7','2022-11-05','120','4');
-- INSERT INTO produk_selesai(id, kode_barang, nama_barang, tanggal_selesai, jumlah_barang, akun_id_user) VALUES (NULL,'IPAD09','Ipad Mac Pro 9','2022-11-10','180','4');
-- INSERT INTO produk_selesai(id, kode_barang, nama_barang, tanggal_selesai, jumlah_barang, akun_id_user) VALUES (NULL,'IP09','Iphone Mac Pro 9','2022-11-10','200','4');
-- INSERT INTO produk_selesai(id, kode_barang, nama_barang, tanggal_selesai, jumlah_barang, akun_id_user) VALUES (NULL,'IP11','Iphone Mac Pro 11','2022-01-10','200','4');
-- INSERT INTO produk_selesai(id, kode_barang, nama_barang, tanggal_selesai, jumlah_barang, akun_id_user) VALUES (NULL,'IP12','Iphone Mac Pro 12','2022-02-10','200','4');
-- INSERT INTO produk_selesai(id, kode_barang, nama_barang, tanggal_selesai, jumlah_barang, akun_id_user) VALUES (NULL,'IP13','Iphone Mac Pro 13','2022-03-10','200','4');
-- INSERT INTO produk_selesai(id, kode_barang, nama_barang, tanggal_selesai, jumlah_barang, akun_id_user) VALUES (NULL,'IP10','Iphone Mac Pro 14','2022-04-10','200','4');
-- INSERT INTO produk_selesai(id, kode_barang, nama_barang, tanggal_selesai, jumlah_barang, akun_id_user) VALUES (NULL,'IP10','Iphone Mac Pro 10','2022-12-10','200','4');
-- INSERT INTO produk_selesai(id, kode_barang, nama_barang, tanggal_selesai, jumlah_barang, akun_id_user) VALUES (NULL,'IP11','Iphone Mac Pro 11','2022-12-11','200','4');
-- INSERT INTO produk_selesai(id, kode_barang, nama_barang, tanggal_selesai, jumlah_barang, akun_id_user) VALUES (NULL,'IP12','Iphone Mac Pro 12','2022-12-13','200','4');
-- INSERT INTO produk_selesai(id, kode_barang, nama_barang, tanggal_selesai, jumlah_barang, akun_id_user) VALUES (NULL,'IP13','Iphone Mac Pro 13','2022-12-14','200','4');
-- INSERT INTO produk_selesai(id, kode_barang, nama_barang, tanggal_selesai, jumlah_barang, akun_id_user) VALUES (NULL,'IP10','Iphone Mac Pro 14','2022-12-15','200','4');


-- SELECT * FROM produk_selesai;
-- bulan november
-- SELECT SUM(`jumlah_barang`) as jumlah FROM produk_selesai WHERE tanggal_selesai >= '2022-11-0' AND tanggal_selesai < '2022-11-30';


-- SELECT
--   SUM(`produk_selesai`.`jumlah_barang`) as jumlah_barang_selesai,
--   SUM(`produk_dikirim`.`jumlah_barang`) as jumlah_barang_keluar
-- FROM
--   produk_selesai
-- JOIN
--   produk_dikirim
-- WHERE
--   (`produk_selesai`.`tanggal_selesai` >= '2022-11-0' AND `produk_selesai`.`tanggal_selesai` < '2022-11-30')
--   OR (`produk_dikirim`.`tanggal_kirim` >= '2022-11-0' AND `produk_dikirim`.`tanggal_kirim` < '2022-11-30');

SELECT *
FROM
  produk_dikirim

