# Boundless-Moments-Web-Assignment

# 📸 Boundless Moments - Portfolio Management System

**Boundless Moments** is a dynamic PHP-based portfolio website with a custom-built admin panel. It allows seamless management of projects, experiences, and messages submitted by users through the contact form. This system was developed as part of a college assignment to demonstrate full-stack web development using PHP, MySQL, HTML/CSS, and minimal JavaScript.

---

## 🚀 Features

### 🌐 Public Website
- **Home Page** – Welcoming interface.
- **Portfolio** – Auto-displays all uploaded project images with titles and descriptions.
- **Gallery** – Image-only layout to showcase visuals attractively.
- **Experience** – Lists experiences pulled from the database.
- **Contact** – Form to collect visitor messages.

### 🔐 Admin Panel
- **Admin Login/Logout**
- **Dashboard Overview**
- **Add / Edit / Delete Projects**
- **View & Delete Contact Messages**
- **Add / Edit / Delete Experience Entries**
- **Custom Styling for Admin & Public Pages**

---

## 🗂️ Folder Structure
BoundlessMoments/
│
├── admin/ # Admin panel interface and functionality
│ ├── add_experience.php
│ ├── add_project.php
│ ├── admin_header.php
│ ├── admin.css
│ ├── admin.js
│ ├── dashboard.php
│ ├── delete_project.php
│ ├── edit_project.php
│ ├── footer.php
│ ├── login.php
│ ├── logout.php
│ ├── manage_experience.php
│ ├── manage_projects.php
│ └── view_messages.php
│
├── includes/ # Shared database and layout files
│ ├── db.php
│ ├── header.php
│ ├── admin_header.php
│ └── footer.php
│
├── uploads/ # Uploaded images
│
├── index.php # Home page
├── experience.php # Experience list page
├── contact.php # Contact form
├── portfolio.php # Project portfolio display
├── gallery.php # Image gallery
├── style.css # Public site styles
├── public.js # JS for public interactivity
├── boundless_moments_ass.sql # MySQL database schema
└── README.md # This file




---

## 🛠️ Technologies Used

- **Frontend:** HTML5, CSS3 (Flexbox & Grid), JavaScript
- **Backend:** PHP (Core PHP, No Frameworks)
- **Database:** MySQL
- **Hosting/Deployment:** Localhost (XAMPP / PHP Server)

---

## 🧪 How to Run Locally

1. **Clone the Repository**
   ```bash
   git clone https://github.com/YOUR_USERNAME/BoundlessMoments.git


2. Set Up the Database
Open phpMyAdmin (or MySQL CLI)
Create a database named: boundless_moments_ass
Import database.sql from the project folder

3. Run in Browser
Place project in your XAMPP htdocs directory
Visit: http://localhost/BoundlessMoments/

4. Admin Login
Username: admin
Password: admin123


📚 License
This project is developed as part of a college academic assignment. Not for commercial use.
Feel free to fork and enhance it for learning or personal portfolio building.


✨ Author
Abdul Hadi
BSc (Hons) Computer Systems Engineering (IT)
ISMT College, Kathmandu | University of Sunderland
LinkedIn: www.linkedin.com/in/abdul-hadi-9779704572596phone
Website: www.abdulhadi.com.np
