-- Tabel Masyarakat
CREATE TABLE Masyarakat (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    Nama VARCHAR(50) NOT NULL, 
    username VARCHAR(35) NOT NULL, 
    Email VARCHAR(25) NOT NULL, 
    Password VARCHAR(255) NOT NULL, 
    Alamat VARCHAR(255) NOT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Tabel Pengaduan
CREATE TABLE Pengaduan (
    id INT AUTO_INCREMENT PRIMARY KEY,      
    user_id INT,                            
    jenis_pengaduan VARCHAR(255) NOT NULL,   
    isi_laporan TEXT NOT NULL,              
    lokasi VARCHAR(255) NOT NULL,            
    foto VARCHAR(255),                      
    status ENUM('Lapor', 'Diproses', 'Selesai') DEFAULT 'Diproses',  
    tanggapan TEXT,                         
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
    FOREIGN KEY (user_id) REFERENCES Masyarakat(id)  
);

-- Tabel Kegiatan
CREATE TABLE Kegiatan (
    id INT AUTO_INCREMENT PRIMARY KEY,      
    judul VARCHAR(255) NOT NULL,            
    deskripsi TEXT NOT NULL,                
    tanggal DATE NOT NULL,                  
    lokasi VARCHAR(255) NOT NULL,           
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Diskusi
CREATE TABLE Diskusi (
    id INT AUTO_INCREMENT PRIMARY KEY,      
    user_id INT,                            
    judul VARCHAR(255) NOT NULL,            
    isi_diskusi TEXT NOT NULL,              
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
    FOREIGN KEY (user_id) REFERENCES Masyarakat(id)  
);

-- Tabel Komentar_Diskusi
CREATE TABLE Komentar_Diskusi (
    id INT AUTO_INCREMENT PRIMARY KEY,      
    diskusi_id INT,                         
    user_id INT,                            
    komentar TEXT NOT NULL,                 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
    FOREIGN KEY (diskusi_id) REFERENCES Diskusi(id),  
    FOREIGN KEY (user_id) REFERENCES Masyarakat(id)  
);

-- Tabel Notifikasi_Admin
CREATE TABLE Notifikasi_Admin (
    id INT AUTO_INCREMENT PRIMARY KEY,      
    admin_id INT,                          
    pesan TEXT NOT NULL,                    
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
    status ENUM('belum dibaca', 'dibaca') DEFAULT 'belum dibaca',  
    FOREIGN KEY (admin_id) REFERENCES Masyarakat(id)  
);

-- Tabel Agenda_Kegiatan
CREATE TABLE Agenda_Kegiatan (
    id INT AUTO_INCREMENT PRIMARY KEY,      
    kegiatan_id INT,                       
    judul VARCHAR(255) NOT NULL,            
    deskripsi TEXT NOT NULL,                
    waktu DATE NOT NULL,                    
    lokasi VARCHAR(255) NOT NULL,           
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
    FOREIGN KEY (kegiatan_id) REFERENCES Kegiatan(id)  
);

-- Tabel Laporan_Cepat
CREATE TABLE Laporan_Cepat (
    id INT AUTO_INCREMENT PRIMARY KEY,      
    user_id INT,                            
    jenis_laporan VARCHAR(255) NOT NULL,    
    deskripsi TEXT NOT NULL,                
    lokasi VARCHAR(255) NOT NULL,           
    status ENUM('Lapor', 'Diproses', 'Selesai') DEFAULT 'Diproses',  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
    FOREIGN KEY (user_id) REFERENCES Masyarakat(id)  
);

-- Tabel Login_History
CREATE TABLE Login_History (
    id INT AUTO_INCREMENT PRIMARY KEY,      
    user_id INT,                            
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
    ip_address VARCHAR(45) NOT NULL,        
    FOREIGN KEY (user_id) REFERENCES Masyarakat(id)  
);
