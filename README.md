# Astonish SelfCare Ecommerce Site

Welcome to Astonish SelfCare Ecommerce Site! This is a simple ecommerce platform developed using PHP. 
The platform specializes in offering self-care products to users, providing a convenient shopping experience. Additionally, 
it features both client and admin panels for efficient management and control.

## Features

- **Client Panel**:
  - Browse through a wide range of self-care products.
  - Add products to the shopping cart and wishlist.
  - Proceed to checkout for secure transactions.
  - View order history and track order status.

- **Admin Panel**:
  - Manage product inventory, including adding, editing, and deleting products.
  - Monitor and fulfill orders placed by clients.
  - Control user accounts and permissions.

## Technologies Used

- PHP
- HTML/CSS/JavaScript
- SQL (for database management)

## Getting Started

To set up the project locally, follow these steps:

**Prerequisites**:

Download and install XAMPP from the official Apache Friends website: https://www.apachefriends.org/download.html
Ensure you have a code editor of your choice for working with PHP files (e.g., Notepad++, Sublime Text, Visual Studio Code).

**1. Clone the repository**:

**2. Start XAMPP Services**:
- Open the XAMPP Control Panel.
- Click the "Start" buttons next to "Apache" and "MySQL" to activate them.

**3. Configure Virtual Host (Optional, but Recommended)**:
- Virtual hosts allow you to manage multiple websites on the same Apache server. While not strictly necessary for a single website, it improves organization and avoids potential conflicts.
- Refer to XAMPP's documentation for creating a virtual host configuration file (usually in the httpd-xampp.conf file within the Apache configuration directory). You'll need to specify a document root pointing to the astonish folder and potentially adjust server settings.
- If you choose not to create a virtual host, you can access your website using http://localhost/astonish (assuming astonish is the folder name within your XAMPP document root, typically htdocs).

**4. Create a Database**:
- If your website interacts with a database, you'll need to create one in MySQL.
- Access phpMyAdmin through your web browser at http://localhost/phpmyadmin (or the URL specified in your virtual host configuration).
- Create a new database and import any necessary data from your GitHub repository (if it exists).
- Update your PHP code's database connection details to point to the newly created database.
- Database Name (Use this database name while creating database) : astonishdb

**5. Run Your Website**:
- Open your web browser.
- If you created a virtual host, use the domain name or subdomain you defined in the configuration. Otherwise, use http://localhost/astonish (or the appropriate path based on your setup).
- If everything is set up correctly, your PHP website from the astonish folder should now be running locally using XAMPP.

## Credit
- Minimlist : https://beminimalist.co

## Note
- This site only for the study purpose.
