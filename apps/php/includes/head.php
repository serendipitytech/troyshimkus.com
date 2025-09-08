<?php
// Common <head> for all pages
// Expects: $pageTitle, $pageDescription
if (!isset($pageTitle)) { $pageTitle = 'Troy Shimkus — Portfolio & Resume'; }
if (!isset($pageDescription)) {
  $pageDescription = 'Public Sector Data Programs — portfolio, resume, projects, and contact.';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <script>
      // Tailwind config
      window.tailwind = window.tailwind || {};
      window.tailwind.config = {
        theme: {
          extend: {
            fontFamily: { sans: ['Inter','ui-sans-serif','system-ui','Segoe UI','Roboto','Helvetica','Arial','sans-serif'] }
          }
        }
      };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      :root{
        /* Default palette: Serendipity */
        --primary:#27AAE1; --primary-hover:#199bd4; --on-primary:#ffffff;
        --accent:#FAAE5E; --accent-hover:#e39d54; --on-accent:#1f2937;
        --orb1:#CDEFFC; --orb2:#E6F9FF;
        --chip-bg:#EBF9FF; --chip-ring:#5CCBF0; --chip-text:#063247;
        --neutral-bg:#F7FAFC; --neutral-text:#334155;
      }
    </style>
    <script src="/public/js/palette.js"></script>
  </head>
