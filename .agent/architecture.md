# Project Architecture

## Tech Stack
- **Framework:** Laravel 12.x
- **Frontend:** Distinct mix of Blade Templates and Livewire Components.
- **Styling:** Tailwind CSS v4.
- **Database:** MySQL
- **Authentication:** Laravel Sanctum / Custom Middleware (`student`, `StudentCommanMiddleware`).

## Key Directories
- `app/Livewire`: Contains UI components (e.g., `StudentProfile`, `PaymentPage`).
- `app/Http/Controllers`: Traditional controllers (e.g., `StudentController`, `HomeController`).
- `routes/web.php`: Central routing definition.
- `routes/admin.php`: Admin panel routes.

## Core Flows
- **Student Portal:** `/students/` prefix. Includes Dashboard, Profile, Payment, Exam Application.
- **Corporate/Institute:** `/institute/` pathways for partners.
- **Public Website:** Home, About, Content pages.
- **Admin Panel:** `/administrator/` (based on `RegistrationSetting` layout).

## Architectural Patterns
- **Hybrid Controller/Livewire:** The project uses standard Controllers for some logic and Livewire for interactive UI components.
- **Middleware-Based Access:** Distinct middleware for Student access (`student`, `IsStudentFinallySubmitted`).
