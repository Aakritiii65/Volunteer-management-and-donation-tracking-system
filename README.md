# Volunteer Management and Donation Tracking System

A comprehensive system for managing volunteers and tracking donations built with PHP, MySQL, HTML, JavaScript, and Tailwind CSS.

## Features

- User Authentication (Login/Register)
- Volunteer Management
  - Volunteer Registration
  - Profile Management
  - Hours Tracking
  - Event Participation
- Donation Tracking
  - Online Donations
  - Donor Management
  - Campaign Tracking
  - Receipt Generation
- Event Management
  - Event Creation
  - Volunteer Assignment
  - Attendance Tracking
- Admin Dashboard
  - User Management
  - Reports and Analytics
  - System Configuration

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Composer (for PHP dependencies)

## Installation

1. Clone the repository:
```bash
git clone [repository-url]
cd volunteer-management-system
```

2. Create a MySQL database:
```sql
CREATE DATABASE volunteer_management;
```

3. Import the database schema:
```bash
mysql -u username -p volunteer_management < database/schema.sql
```

4. Configure the database connection:
Edit `config/database.php` with your database credentials:
```php
private $host = "localhost";
private $db_name = "volunteer_management";
private $username = "your_username";
private $password = "your_password";
```

5. Set up your web server:
- Point your web server to the project directory
- Ensure the `storage` directory is writable
- Configure URL rewriting if needed

6. Install dependencies:
```bash
composer install
```

## Security Features

- Password hashing
- CSRF protection
- Input sanitization
- Session management
- Role-based access control

## Usage

1. Access the system through your web browser
2. Register as a new user or login with existing credentials
3. Navigate through the dashboard to access different features
4. Admin users can access the admin panel for system management

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

For support, please contact [support-email@example.com]

## Acknowledgments

- Tailwind CSS for the UI framework
- Font Awesome for icons
- Chart.js for analytics visualization 