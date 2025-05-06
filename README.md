## Challenge 2
### Laravel & Drupal Event Management Project

This Project contains the **Laravel Code (+Database="challenge_2")** as well as the **Drupal Module**.
In order the Module to run laravel should run at **http://localhost:8000** otherwise the EventService.php in module
should be modified to the right baseURL in `fetchUpcomingEvents()`.

- Laravel also provides a **seed** for the events as well the spaces!<br>
**Warning:** the seed is mandatory! >>>`php artisan db:seed`
- There is no security middleware for the API or the Admin Panel.
