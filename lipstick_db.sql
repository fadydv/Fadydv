CREATE DATABASE lipstick_db;

USE lipstick_db;

CREATE TABLE lipsticks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  kode VARCHAR(50) NOT NULL,
  nama VARCHAR(100) NOT NULL,
  brand VARCHAR(100),
  harga VARCHAR(50),
  deskripsi TEXT
);

INSERT INTO lipsticks (kode, nama, brand, harga, deskripsi) VALUES
('LIP001', 'Velvet Teddy', 'MAC', 'Rp 350.000', 'Lipstik nude matte klasik'),
('LIP002', 'Rich Ruby', 'Maybelline', 'Rp 120.000', 'Warna merah elegan dengan hasil matte'),
('LIP003', 'Cocoa Mood', 'Wardah', 'Rp 89.000', 'Lip mousse halal dengan sentuhan coklat'),
('LIP004', 'Sweet Choco', 'Pixy', 'Rp 75.000', 'Cocok untuk kulit sawo matang'),
('LIP005', 'Vintage', 'NYX', 'Rp 130.000', 'Merah tua lembut dengan formula creamy');