# Layout Refactoring Guide

## 📋 Overview

The layout system has been completely refactored for better maintainability, consistency, and reusability.

## 🎯 Refactoring Goals

1. **DRY (Don't Repeat Yourself)** - Eliminate code duplication
2. **Consistency** - Unified structure across all pages
3. **Maintainability** - Easy to update and modify
4. **Reusability** - Components that can be used anywhere
5. **Clean Code** - Better organization and readability

## 📁 New Structure

### Reusable Components

#### 1. `<x-section>` - Section Wrapper
**Location:** `resources/views/components/section.blade.php`

**Purpose:** Consistent section containers with background and padding options

**Usage:**
```blade
<x-section id="about" background="white" padding="md">
    {{-- Content --}}
</x-section>
```

**Props:**
- `id` (optional) - Section ID
- `background` - `white`, `gray`, `transparent` (default: `white`)
- `padding` - `sm`, `md`, `lg`, `none` (default: `md`)
- `class` (optional) - Additional CSS classes

#### 2. `<x-container>` - Content Container
**Location:** `resources/views/components/container.blade.php`

**Purpose:** Consistent max-width containers

**Usage:**
```blade
<x-container size="xl">
    {{-- Content --}}
</x-container>
```

**Props:**
- `size` - `sm`, `md`, `lg`, `xl` (default: `xl`)
- `class` (optional) - Additional CSS classes

#### 3. `<x-section-header>` - Section Titles
**Location:** `resources/views/components/section-header.blade.php`

**Purpose:** Consistent section headers with translations

**Usage:**
```blade
<x-section-header 
    title-key="about.title" 
    subtitle-key="about.subtitle" 
    align="center"
/>
```

**Props:**
- `title` or `title-key` - Title text or translation key
- `subtitle` or `subtitle-key` - Subtitle text or translation key
- `align` - `center`, `left` (default: `center`)

#### 4. `<x-page-header>` - Page Hero Headers
**Location:** `resources/views/components/page-header.blade.php`

**Purpose:** Reusable page hero sections with gradient background

**Usage:**
```blade
<x-page-header 
    title-key="portfolio.title" 
    subtitle-key="portfolio.subtitle" 
/>
```

**Props:**
- `title` or `title-key` - Title text or translation key
- `subtitle` or `subtitle-key` - Subtitle text or translation key
- `variant` - Header style variant (default: `gradient`)

## 🔄 Refactored Pages

### Before vs After

#### Before (index.blade.php):
```blade
@php
    $translations = include(resource_path("lang/en/messages.php"));
@endphp

@section('content')
    @include('partials.hero')
    @include('partials.about-section')
    <!-- 63 lines of inline contact section -->
@endsection
```

#### After (index.blade.php):
```blade
@php
    $translations = include(resource_path('lang/en/messages.php'));
@endphp

@section('content')
    @include('partials.hero', ['translations' => $translations])
    @include('partials.about-section', ['translations' => $translations])
    @include('partials.experience-section', ['translations' => $translations])
    @include('partials.projects-section', ['translations' => $translations])
    @include('partials.contact-section', ['translations' => $translations])
@endsection
```

**Benefits:**
- ✅ Cleaner - 8 lines vs 64 lines
- ✅ Consistent - All sections use same pattern
- ✅ Maintainable - Contact section is reusable
- ✅ Readable - Clear structure

## 🎨 Partial Components

All partials now use the new component system:

### Example: `partials/about-section.blade.php`

**Before:**
```blade
<section id="about" class="py-16 bg-white dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Content -->
    </div>
</section>
```

**After:**
```blade
<x-section id="about" background="white" padding="md">
    <x-container>
        <x-section-header 
            title-key="about.title" 
            subtitle-key="about.subtitle" 
        />
        <!-- Content -->
    </x-container>
</x-section>
```

**Benefits:**
- ✅ Consistent spacing and backgrounds
- ✅ Easy to change container sizes
- ✅ Automatic responsive padding
- ✅ Less code to write

## 📊 Component Hierarchy

```
layouts/app.blade.php (Main Layout)
├── components/navigation.blade.php
├── components/footer.blade.php
└── main-content (Page Content)
    ├── components/page-header.blade.php (Page Heroes)
    ├── components/section.blade.php (Section Wrapper)
    │   ├── components/container.blade.php (Content Container)
    │   │   ├── components/section-header.blade.php (Section Title)
    │   │   └── Content / Other Components
    │   └── ...
    └── partials/
        ├── hero.blade.php
        ├── about-section.blade.php
        ├── experience-section.blade.php
        ├── projects-section.blade.php
        └── contact-section.blade.php
```

## 🚀 Benefits of Refactoring

### 1. Consistency
- All sections use the same structure
- Uniform spacing and styling
- Predictable layout behavior

### 2. Maintainability
- Change container width globally in one place
- Update section styling in component files
- Easy to add new pages with consistent layout

### 3. DRY Principle
- No duplicate header code
- Reusable contact section
- Shared container logic

### 4. Flexibility
- Easy to swap background colors
- Adjust padding per section
- Change container sizes

### 5. Readability
- Clear component names
- Self-documenting code
- Less nesting

## 📝 Migration Checklist

- [x] Create reusable components
- [x] Refactor all partials to use components
- [x] Extract contact section to partial
- [x] Create page-header component
- [x] Update all pages to use new structure
- [x] Ensure translation keys are consistent
- [x] Test build process

## 🎓 Best Practices

### When Creating New Pages:

1. **Use page-header for hero sections:**
```blade
<x-page-header title-key="page.title" subtitle-key="page.subtitle" />
```

2. **Wrap content in section + container:**
```blade
<x-section background="white" padding="md">
    <x-container>
        <x-section-header title-key="section.title" />
        <!-- Content -->
    </x-container>
</x-section>
```

3. **Pass translations consistently:**
```blade
@php
    $translations = include(resource_path('lang/en/messages.php'));
@endphp

@include('partials.section-name', ['translations' => $translations])
```

### Component Props Conventions:

- Use `-key` suffix for translation keys: `title-key`, `subtitle-key`
- Use kebab-case for props: `background-color`, `padding-size`
- Always provide defaults for optional props

## 🔧 Customization

### Changing Container Widths

Edit `resources/views/components/container.blade.php`:
```php
$containerSizes = [
    'sm' => 'max-w-3xl',
    'md' => 'max-w-4xl',
    'lg' => 'max-w-5xl',
    'xl' => 'max-w-7xl',  // Change this
];
```

### Adding New Background Variants

Edit `resources/views/components/section.blade.php`:
```php
$backgroundClasses = [
    'white' => 'bg-white dark:bg-gray-900',
    'gray' => 'bg-gray-50 dark:bg-gray-800',
    'blue' => 'bg-blue-50 dark:bg-blue-900',  // Add new variant
];
```

## ✨ Next Steps

For package development:
1. Extract components to separate package
2. Create component library documentation
3. Add prop validation
4. Create Storybook/component docs
5. Add unit tests for components

