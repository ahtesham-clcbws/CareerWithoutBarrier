# Project Architecture

## Tech Stack
- **Framework:** Laravel 12.x
- **Frontend:** distinct mix of Blade Templates and Livewire Components.
- **Styling:** Tailwind CSS v4.
- **Database:** MySQL (implied by typical Laravel usage).
- **Authentication:** Laravel Sanctum / Custom Middleware (`student`, `StudentCommanMiddleware`).

## Key Directories
- `app/Livewire`: Contains UI components (e.g., `StudentProfile`, `PaymentPage`).
- `app/Http/Controllers`: Traditional controllers (e.g., `StudentController`, `HomeController`).
- `routes/web.php`: Central routing definition.

## Core Flows
- **Student Portal:** `/students/` prefix. Includes Dashboard, Profile, Payment, Exam Application.
- **Corporate/Institute:** `/institute/` pathways for partners.
- **Public Website:** Home, About, Content pages.

## Architectural Patterns
- **Hybrid Controller/Livewire:** The project uses standard Controllers for some logic (like complex form submissions or redirects) and Livewire for interactive UI components (like Forms).
- **Middleware-Based Access:** Distinct middleware for Student access (`student`, `IsStudentFinallySubmitted`).
