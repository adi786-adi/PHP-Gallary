# Image Upload and Gallery Application (Luxury Edition)

## Project Objective
The aim of this project is to provide a hands-on experience with PHP file handling, form processing, validations, and session management, wrapped in a high-end, modern UI.

## Features
- **Luxury UI/UX**: Dark theme with gold accents, Glassmorphism, and particle-like grain effects.
- **Mobile-First Design**: Fully responsive layout optimized for all screen sizes.
- **Secure Image Upload**: Validates file types and sizes (up to 20MB).
- **Dynamic Sorted Gallery**: Images are automatically sorted A-Z.
- **File Management**: 
  - **Save**: Download images directly from the gallery.
  - **Delete**: Remove images from the server with confirmation.
- **Session Tracking**: Monitor recent upload activity.

## Validation Rules
- **File Type**: Allowed: `JPG`, `JPEG`, `PNG`, `GIF`.
- **File Size**: Restricted to `20MB`.
- **Naming**: Automatic unique renaming via `uniqid()`.

## Technical Implementation
- **PHP File Handling**: `move_uploaded_file()`, `unlink()`, `glob()`, `filesize()`.
- **Sorting**: `usort()` with `strcasecmp()` for alphabetical ordering.
- **Glassmorphism**: Advanced CSS `backdrop-filter` and semi-transparent layers.
- **Responsive Grid**: CSS Grid with Media Queries for fluid layout transitions.

## Execution Steps
1. Place the project folder in your server root (e.g., `htdocs/ALA`).
2. Ensure the `uploads/` folder exists and is writable.
3. Access via `http://localhost/ALA/index.php`.
