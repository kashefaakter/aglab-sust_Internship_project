
## AG-Lab SUST — Output & Publication Management System
A Laravel web application built during my internship at the Laboratory of Genomics and Transcriptomics (AG-Lab), SUST. It adds a database-driven Outputs / Publications section to the lab website (aglab-sust.com), together with a secure admin panel for managing the entries.
## Project Overview
The AG-Lab Publication Management System is designed to organize and present the laboratory's research publications in a structured and user-friendly way.

The application contains two main parts:
### Public Website
- AG-Lab SUST branded homepage(optional)
- Publications / Research Outputs section
- Year-wise publication browsing
- Publication search
- Year filtering
- Publication details
- Authors, journal, citation and DOI information
- External publication links
- PDF publication access
- Responsive design

### Admin Panel
- Secure administrator authentication
- Professional dashboard
- Publication management
- Add publications
- Edit publications
- Delete publications
- Search and filter publications
- Published/Draft status management
- DOI and external URL management
- PDF upload and replacement
- Publication statistics

## Main Features
### Public Publication Portal

The `/outputs` section acts as the main public publication entry point.

Users can:

- Browse published research outputs
- Search publications by title, author, journal or DOI
- Filter publications by year
- Browse publications year-wise
- View detailed publication information
- Access DOI links
- Visit external publication URLs
- View/download uploaded PDF files

Draft publications are not displayed on the public website.

---

### Admin Dashboard

Administrators can access:

- Total publications
- Published publications
- Draft publications
- Latest publication year
- Recent publications
- Year-wise publication statistics

---

### Publication Management

Each publication can contain:

- Title
- Authors
- Journal / Conference
- Publication year
- Publication type
- Publication status
- DOI
- Publication URL
- Abstract
- Citation
- PDF file

Supported publication types include:

- Research Article
- Review Article
- Conference Paper
- Book Chapter
- Other

Publication status:

- Published
- Draft

## Technology Stack
### Backend

- PHP
- Laravel 12
- MySQL
- Laravel Eloquent ORM
- Laravel Breeze Authentication

### Frontend

- Blade Templates
- HTML5
- CSS3
- JavaScript
- Responsive UI

### Development Environment

- XAMPP
- Apache
- MySQL
- Composer
- Node.js / npm
- Git / GitHub