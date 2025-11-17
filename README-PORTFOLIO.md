# Lisoing Sem Portfolio - HydePHP

A modern, multilingual portfolio website built with HydePHP, featuring support for English and Khmer (ភាសាខ្មែរ) languages.

## Features

- ✅ **Multilingual Support**: English (en) and Khmer (km) translations
- ✅ **Blade Templates**: Clean, maintainable template structure
- ✅ **Tailwind CSS**: Modern, responsive styling
- ✅ **Easy Customization**: Simple configuration files
- ✅ **Static Site Generation**: Fast, deployable static site

## Project Structure

```
hyde/
├── _pages/                    # Blade page templates
│   ├── index.blade.php       # Homepage
│   ├── about.blade.php       # About page
│   ├── portfolio.blade.php   # Portfolio page
│   └── contact.blade.php     # Contact page
├── resources/
│   ├── lang/                 # Translation files
│   │   ├── en/
│   │   │   └── messages.php  # English translations
│   │   └── km/
│   │       └── messages.php  # Khmer translations
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php # Main layout
│       ├── components/       # Reusable components
│       │   ├── navigation.blade.php
│       │   ├── footer.blade.php
│       │   ├── language-switcher.blade.php
│       │   ├── project-card.blade.php
│       │   └── experience-item.blade.php
│       └── partials/         # Page sections
│           ├── hero.blade.php
│           ├── about-section.blade.php
│           ├── experience-section.blade.php
│           └── projects-section.blade.php
├── config/
│   └── hyde.php              # HydePHP configuration
└── _site/                    # Generated static site (after build)

```

## Customization Guide

### 1. Updating Site Information

Edit `config/hyde.php`:
```php
'name' => env('SITE_NAME', 'Lisoing Sem'),
'url' => env('SITE_URL', 'https://lisoing-sem.vercel.app'),
```

### 2. Adding/Editing Translations

Edit the translation files in `resources/lang/{locale}/messages.php`:

**English** (`resources/lang/en/messages.php`):
```php
return [
    'nav' => [
        'home' => 'Home',
        'about' => 'About',
        // ...
    ],
    // ...
];
```

**Khmer** (`resources/lang/km/messages.php`):
```php
return [
    'nav' => [
        'home' => 'ទំព័រដើម',
        'about' => 'អំពីខ្ញុំ',
        // ...
    ],
    // ...
];
```

### 3. Updating Projects

Edit `resources/views/partials/projects-section.blade.php` and update the `$projects` array:

```php
$projects = [
    [
        'category' => 'Network Management',
        'status' => 'live',
        'title' => 'NetBlock Platform',
        'description' => 'Your project description...',
        'technologies' => ['PHP', 'Node.js', 'Express'],
        'link' => 'https://your-project-url.com'
    ],
    // Add more projects...
];
```

### 4. Updating Experience/Education

Edit `resources/views/partials/experience-section.blade.php`:

- **Work Experience**: Update the `$workExperiences` array
- **Education**: Update the `$education` array

### 5. Customizing Styles

Edit `tailwind.config.js` to customize colors, fonts, and other design tokens:

```javascript
theme: {
    extend: {
        colors: {
            indigo: {
                500: '#5956eb',  // Change primary color
            }
        },
    },
},
```

### 6. Adding Contact Information

Update contact links in:
- `_pages/index.blade.php` (homepage contact section)
- `_pages/contact.blade.php` (contact page)

Replace placeholder values:
```blade
<a href="mailto:your-email@example.com">  <!-- Update email -->
<a href="tel:+855123456789">              <!-- Update phone -->
<a href="https://t.me/yourusername">      <!-- Update Telegram -->
```

## Building the Site

### Development Server

Start the realtime compiler for local development:

```bash
php hyde serve
```

Visit `http://localhost:8080` to view your site.

### Build for Production

Generate the static site:

```bash
php hyde build
```

The compiled site will be in the `_site/` directory.

### Deploy

Upload the contents of `_site/` to your hosting provider:

- **Vercel**: Connect your GitHub repo and set build command to `php hyde build`
- **Netlify**: Set build command to `php hyde build` and publish directory to `_site`
- **GitHub Pages**: Push `_site/` contents to `gh-pages` branch

## Language Switching

The portfolio includes client-side language switching using JavaScript:

1. Users can switch languages using the dropdown in the navigation
2. Language preference is saved in `localStorage`
3. Page reloads to apply translations

To implement full client-side switching (without reload), you would need to:
- Add `data-translate` attributes to elements
- Use JavaScript to update text content dynamically

## Styling Customization

### Colors

The portfolio uses Tailwind CSS. Main colors:
- Primary: Indigo (`#5956eb`)
- Background gradients: Indigo → Purple → Pink

Edit `tailwind.config.js` or add custom CSS to `resources/assets/app.css`.

### Typography

Default fonts are system fonts. To add custom fonts:
1. Add font files to `public/assets/fonts/`
2. Update `tailwind.config.js`:
```javascript
theme: {
    extend: {
        fontFamily: {
            'custom': ['Your Font', 'sans-serif'],
        },
    },
},
```

## Component Structure

### Reusable Components

- **`navigation.blade.php`**: Main navigation with language switcher
- **`footer.blade.php`**: Site footer
- **`language-switcher.blade.php`**: Language toggle dropdown
- **`project-card.blade.php`**: Project display card
- **`experience-item.blade.php`**: Timeline-style experience/education item

### Page Partials

- **`hero.blade.php`**: Hero section with name and title
- **`about-section.blade.php`**: About section with stats and technologies
- **`experience-section.blade.php`**: Work experience and education timeline
- **`projects-section.blade.php`**: Featured projects grid

## Adding New Pages

1. Create a new Blade file in `_pages/`:
```blade
@extends('layouts.app')

@php
    $translations = include(resource_path("lang/en/messages.php"));
@endphp

@section('content')
    <!-- Your page content -->
@endsection
```

2. Add navigation link in `resources/views/components/navigation.blade.php`

3. Add translations in `resources/lang/{locale}/messages.php`

## Troubleshooting

### Translations not working
- Ensure translation files exist in `resources/lang/{locale}/messages.php`
- Check that file paths are correct (use `resource_path()` helper)
- Verify PHP syntax in translation files

### Styles not updating
- Rebuild the site: `php hyde build`
- Check `tailwind.config.js` content paths
- Clear browser cache

### Build errors
- Check PHP syntax in Blade templates
- Verify all included files exist
- Check for missing translation keys

## License

This portfolio is built with HydePHP. See the main project license for details.

## Support

For HydePHP documentation: https://hydephp.com/docs/

