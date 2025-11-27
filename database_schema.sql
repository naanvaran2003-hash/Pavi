-- Database Creation
CREATE DATABASE IF NOT EXISTS medicare_plus;
USE medicare_plus;

-- Users Table (Stores all users: Admin, Doctor, Patient)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'doctor', 'patient') NOT NULL,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Doctors Profile Table (Linked to users)
CREATE TABLE doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    specialization VARCHAR(100) NOT NULL,
    experience_years INT,
    qualification VARCHAR(255),
    consultation_fee DECIMAL(10, 2),
    availability_schedule TEXT, -- Could be JSON or text description
    rating DECIMAL(3, 2) DEFAULT 0,
    image_url VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Services Table
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Appointments Table
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    appointment_date DATETIME NOT NULL,
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES users(id),
    FOREIGN KEY (doctor_id) REFERENCES doctors(id)
);

-- Medical Records Table
CREATE TABLE medical_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    record_date DATE NOT NULL,
    diagnosis TEXT,
    prescription TEXT,
    lab_results_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES users(id),
    FOREIGN KEY (doctor_id) REFERENCES doctors(id)
);

-- Reviews Table
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES users(id),
    FOREIGN KEY (doctor_id) REFERENCES doctors(id)
);

-- Sample Data Injection

-- 1. Services
INSERT INTO services (name, description) VALUES 
('Cardiology', 'Heart and cardiovascular system care'),
('Pediatrics', 'Medical care for infants, children, and adolescents'),
('Neurology', 'Disorders of the nervous system'),
('Orthopedics', 'Care for bones, joints, ligaments, and muscles');

-- 2. Users (Password for all is: password123)
-- Hash used: $2b$10$J.mr2BDPMAWymjDx0paLOOfaFa84wW6KfBrC73pPGx.7u0voJ6Rei
INSERT INTO users (full_name, email, password, role) VALUES 
('System Admin', 'admin@medicare.com', '$2b$10$J.mr2BDPMAWymjDx0paLOOfaFa84wW6KfBrC73pPGx.7u0voJ6Rei', 'admin'),
('Dr. Sarah Wilson', 'sarah@medicare.com', '$2b$10$J.mr2BDPMAWymjDx0paLOOfaFa84wW6KfBrC73pPGx.7u0voJ6Rei', 'doctor'),
('Dr. James Chen', 'james@medicare.com', '$2b$10$J.mr2BDPMAWymjDx0paLOOfaFa84wW6KfBrC73pPGx.7u0voJ6Rei', 'doctor'),
('John Doe', 'john@example.com', '$2b$10$J.mr2BDPMAWymjDx0paLOOfaFa84wW6KfBrC73pPGx.7u0voJ6Rei', 'patient');

-- 3. Doctor Profiles
INSERT INTO doctors (user_id, specialization, experience_years, qualification, consultation_fee, rating, image_url) VALUES 
(2, 'Cardiologist', 12, 'MD, PhD', 120.00, 4.9, 'assets/images/portrait_of_a_friendly_female_doctor.png'),
(3, 'Neurologist', 15, 'MD', 150.00, 4.8, 'assets/images/portrait_of_a_friendly_male_doctor.png');
