# FastBurgers Wireframe Design Breakdown

## 1. COLOR PALETTE

### Primary Colors
- **Primary Brand Color**: `#EA580C` (Orange-600) - Main CTA buttons, navigation, highlights
- **Secondary Brand Color**: `#FB923C` (Orange-500) - Hover states, gradients
- **Tertiary Brand Color**: `#FCD34D` (Yellow-500) - Accent buttons, highlights

### Neutral Colors
- **Background Light**: `#FFFFFF` (White) - Cards, main content areas
- **Background Muted**: `#F9FAFB` (Gray-50) - Section backgrounds
- **Text Primary**: `#111827` (Gray-900) - Main text
- **Text Secondary**: `#4B5563` (Gray-600) - Secondary text
- **Text Tertiary**: `#9CA3AF` (Gray-400) - Muted text
- **Border**: `rgba(0, 0, 0, 0.1)` - Light borders
- **Dark Background**: `#1F2937` (Gray-900) - Admin nav, footer

### Status Colors
- **Success**: `#10B981` (Green-500/600) - Delivered orders
- **Warning**: `#F59E0B` (Amber-500) - Preparing orders
- **Info**: `#3B82F6` (Blue-500) - In transit orders
- **Danger**: `#EF4444` (Red-500) - Cancelled orders
- **Muted**: `#6B7280` (Gray-500) - Inactive status

### Light Status Backgrounds
- **Green-100**: `#D1FAE5` - Success badges
- **Blue-100**: `#DBEAFE` - Info badges
- **Yellow-100**: `#FEF3C7` - Warning badges
- **Orange-100**: `#FED7AA` - Icon backgrounds
- **Red-100**: `#FEE2E2` - Danger badges

---

## 2. LAYOUT STRUCTURE

### Overall Structure
- **Max Width Container**: `7xl` (80rem / 1280px)
- **Padding**: `px-4 sm:px-6 lg:px-8`
- **Grid System**: Responsive grid (mobile-first approach)

### Navigation Bar
- **Height**: 64px (h-16)
- **Background**: 
  - User Pages: Orange-600 (`#EA580C`)
  - Admin Pages: Gray-800 (`#1F2937`)
- **Text Color**: White
- **Shadow**: `shadow-lg`
- **Layout**: Flex with space-between
  - Left: Logo + Brand name (40px logo with emoji)
  - Center: Navigation menu (hidden on mobile, flex on md+)
  - Right: Shopping cart icon with badge

---

## 3. PAGE-BY-PAGE LAYOUT DETAILS

### A. HomePage

#### Hero Section
- **Background**: Gradient `from-orange-600 to-orange-700`
- **Text Color**: White
- **Padding**: `py-20`
- **Layout**: 2-column grid (hidden on mobile)
  - **Column 1 (Text)**:
    - H1: `text-5xl font-bold` - "Delicious Burgers Delivered Fast"
    - Paragraph: `text-xl mb-8 text-orange-100`
    - Two CTA buttons:
      - Primary: Yellow background, gray text
      - Secondary: White background, orange text
  - **Column 2 (Image)**:
    - 96 height (h-96), full width, rounded-lg, shadow-2xl

#### Features Section
- **Background**: White (`bg-white`)
- **Padding**: `py-16`
- **Layout**: 4-column grid (2 columns on mobile)
- **Feature Card**:
  - Icon container: `w-16 h-16`, orange background, orange icon, rounded-full
  - Title: Bold, gray-900
  - Description: Gray-600, small text

#### Featured Burgers Section
- **Background**: Gray-50
- **Padding**: `py-16`
- **Header** (centered):
  - H2: `text-4xl font-bold gray-900`
  - Subtitle: Gray-600
- **Grid**: 3 columns (1 on mobile)
- **Card**:
  - Image: `h-48`, full width, object-cover
  - Padding: `p-6`
  - Title + Rating: Flex space-between
  - Price + Button: Flex space-between
  - Button: Orange, white text, rounded-lg

#### CTA Section
- **Background**: Gradient `from-orange-600 to-orange-700`
- **Text Color**: White
- **Padding**: `py-16`
- **Layout**: Centered text
  - H2: `text-4xl font-bold`
  - Paragraph: `text-xl text-orange-100`
  - Button: Yellow background

#### Footer
- **Background**: Gray-900 (`#1F2937`)
- **Text Color**: White
- **Layout**: 3-column grid (1 on mobile)
- **Content**:
  - Column 1: Company name + description
  - Column 2: Quick links (Menu, About, Contact)
  - Column 3: Contact info (Phone, Email)
- **Bottom Border**: Gray-800 with centered copyright

---

### B. AboutPage

#### Hero Section
- **Same as HomePage** - Gradient orange background
- **Content**: Centered text
  - H1: `text-5xl font-bold`
  - Paragraph: `text-xl text-orange-100`

#### Story Section
- **Background**: White
- **Layout**: 2-column (text + image)
- **Text Column**:
  - H2: `text-4xl font-bold text-gray-900`
  - Multiple paragraphs: Gray-600, spaced

#### Values Section
- **Background**: Gray-50
- **Layout**: 4-column grid (2 on md, 1 on sm)
- **Card**:
  - Background: White
  - Icon: Orange background circle (`w-16 h-16`)
  - Title: `text-xl font-bold gray-900`
  - Description: Gray-600

#### Stats Section
- **Background**: Orange-600
- **Text Color**: White
- **Layout**: 4-column grid
- **Stat Card**:
  - Number: `text-5xl font-bold`
  - Label: `text-orange-100`

#### Team Section
- **Background**: White
- **Layout**: 3-column grid (centered)
- **Member Card**:
  - Image: `w-48 h-48`, rounded-full, border-4 orange-100
  - Name: `text-xl font-bold`
  - Role: Orange-600, medium font

#### CTA Section
- **Background**: Gray-50
- **Centered text**, orange button

---

### C. ContactPage

#### Hero Section
- **Same gradient background**
- **Centered content**

#### Contact Info Cards
- **Background**: White
- **Layout**: 4-column grid (2 on md)
- **Card**:
  - Border: `border-2 border-gray-200`
  - Hover: `border-orange-500 shadow-lg`
  - Icon: Orange background circle (`w-12 h-12`)
  - Title: Gray-900, bold
  - Content: Gray-600

#### Contact Form Section
- **Background**: Gray-50
- **Form Container**:
  - Background: White
  - Padding: `p-8`
  - Shadow: `shadow-lg`
- **Form Layout**:
  - First row: Name + Email (2 columns)
  - Phone: Full width
  - Subject: Select dropdown, full width
  - Message: Textarea, 6 rows, resize-none
  - Newsletter checkbox: Full width
  - Submit button: Full width, orange

#### Map Section
- **Background**: White
- **Placeholder**: Gray-200, centered content

#### FAQ Section
- **Background**: Gray-50
- **Layout**: Single column
- **FAQ Card**:
  - Background: White
  - Padding: `p-6`
  - Question: `text-lg font-bold gray-900`
  - Answer: Gray-600

---

### D. LoginPage

#### Login Form Container
- **Layout**: Centered, max-width-md
- **Background**: White
- **Padding**: `p-8`
- **Shadow**: `shadow-lg`
- **Spacing**: `space-y-6`

#### Header
- **Icon Container**: `w-16 h-16`, orange background, centered emoji
- **Title**: `text-3xl font-bold gray-900`
- **Subtitle**: Gray-600

#### Form Fields
- **Email Field**:
  - Icon: Left-aligned inside input
  - Border: Gray-300
  - Focus: Ring-2 ring-orange-500
- **Password Field**: Same styling
- **Remember/Forgot**: Flex space-between

#### Social Login
- **Divider**: Border-t with centered text
- **Social Buttons**: 2-column grid
  - Border: Gray-300
  - Hover: bg-gray-50

#### Sign Up Link
- **Centered**: Gray-600 text with orange link

#### Test Case Note
- **Background**: Blue-50
- **Border**: Blue-200
- **Text**: Blue-900

---

### E. RegisterPage

#### Form Container
- **Layout**: Centered, max-width-2xl
- **Background**: White
- **Padding**: `p-8`
- **Shadow**: `shadow-lg`

#### Form Fields
- **Row 1**: First Name + Last Name (2 columns)
- **Row 2**: Email (full width)
- **Row 3**: Phone (full width)
- **Row 4**: Password + Confirm Password (2 columns)
- **Row 5**: Terms checkbox + links (full width)
- **Submit**: Full width orange button

#### Benefits Cards (Below Form)
- **Layout**: 3-column grid
- **Card**:
  - Background: White
  - Shadow: `shadow`
  - Centered content
  - Emoji icon (large)
  - Text: `text-sm font-medium`

---

### F. AdminOrdersPage

#### Header
- **Layout**: Flex space-between
- **Title**: `text-3xl font-bold` with icon
- **Export Button**: Orange, with download icon

#### Stats Cards
- **Layout**: 4-column grid (2 on sm)
- **Card**:
  - Background: White
  - Icon Box: Colored background (`bg-blue-500`, `bg-green-500`, etc.)
  - Value: `text-2xl font-bold`
  - Label: Gray-600
  - Change: Green or red text

#### Search & Filters
- **Background**: White
- **Layout**: 4-column grid
- **Search**: Full width with icon
- **Dropdowns**: Status, Date range

#### Orders Table
- **Background**: White
- **Header Row**:
  - Background: Gray-50
  - Text: Gray-500, uppercase, small, medium font weight
- **Table Rows**:
  - Hover: bg-gray-50
  - Columns: Order ID, Customer, Items, Total, Date, Status, Actions
- **Status Badge**: Colored background with text
- **Action Buttons**: Text links (orange, blue)

#### Pagination
- **Layout**: Flex space-between
- **Active Button**: Orange background
- **Inactive**: Border with hover effect

#### Quick Actions
- **Layout**: 3-column grid
- **Card**:
  - Gradient backgrounds (blue, green, purple)
  - White text
  - Large number
  - Link button (hover underline)

---

### G. AdminUsersPage

#### Header
- **Layout**: Flex space-between
- **Title**: `text-3xl font-bold` with icon
- **Add User Button**: Orange, with plus icon

#### Stats Cards
- **Layout**: 4-column grid
- **Card**:
  - Background: White
  - Colored dot (blue, green, orange, gray)
  - Value: `text-2xl font-bold`
  - Label: Gray-600

#### Search & Filters
- **Layout**: 4-column grid
- **Search**: 2 columns width
- **Dropdowns**: Status, Sort

#### Users Table
- **Header**: Same as orders table
- **Columns**: User, Contact, Registered, Orders, Status, Actions
- **User Avatar**: `w-10 h-10`, orange background, first initial
- **Contact Info**: 
  - Email with icon
  - Phone with icon
- **Status Badge**: Green (Active) or Gray (Inactive)

#### Pagination
- Same as orders table

---

## 4. TYPOGRAPHY

### Font Sizes (Tailwind)
- **H1**: `text-5xl` - 56px (for hero titles)
- **H2**: `text-4xl` - 48px (section titles)
- **H3**: `text-3xl` - 30px (subsection titles)
- **H4**: `text-2xl` - 24px (card titles)
- **Body Large**: `text-xl` - 20px (large text)
- **Body Base**: `text-base` - 16px (default)
- **Body Small**: `text-sm` - 14px (labels, secondary text)
- **Body XSmall**: `text-xs` - 12px (table headers, captions)

### Font Weights
- **Bold/Medium**: `font-bold` or `font-medium` (500-700) - Headings, button text, labels
- **Normal**: `font-normal` (400) - Body text, inputs

### Line Heights
- **Heading**: `line-height: 1.5`
- **Body**: `line-height: 1.5`

---

## 5. BUTTON STYLES

### Primary Button (CTA)
- **Background**: Orange-600 (`#EA580C`)
- **Text Color**: White
- **Padding**: `px-8 py-3` or `px-8 py-4`
- **Border Radius**: `rounded-lg`
- **Font**: Medium weight, text-lg
- **Hover**: `hover:bg-orange-700`
- **Transition**: `transition-colors`

### Secondary Button
- **Background**: White
- **Border**: Gray-300, 2px
- **Text Color**: Gray-700
- **Padding**: `px-8 py-3`
- **Border Radius**: `rounded-lg`
- **Hover**: `hover:bg-gray-50`
- **Transition**: `transition-colors`

### Accent Button (Yellow)
- **Background**: Yellow-500 (`#FCD34D`)
- **Text Color**: Gray-900
- **Padding**: `px-8 py-3` or `px-8 py-4`
- **Border Radius**: `rounded-lg`
- **Font**: Bold, text-lg
- **Hover**: `hover:bg-yellow-400`

### Text/Link Button
- **Background**: Transparent/hover color
- **Text Color**: Orange-600
- **Hover**: `hover:text-orange-700`, `hover:bg-orange-50` (optional)
- **Font**: Medium weight
- **Padding**: `px-4 py-2` (tight)

### Icon Button
- **Background**: Transparent or colored
- **Padding**: `p-2` or `p-3`
- **Border Radius**: `rounded-lg`
- **Hover**: Color change or background color

### Full-Width Button
- **Width**: `w-full`
- **Padding**: `py-3` (minimum)
- **Used In**: Forms, modals

---

## 6. FORM ELEMENTS

### Input Fields
- **Padding**: `px-4 py-3`
- **Border**: `border border-gray-300`
- **Border Radius**: `rounded-lg`
- **Font Size**: `text-base`
- **Font Weight**: `font-normal`
- **Focus State**:
  - Ring: `focus:ring-2 focus:ring-orange-500`
  - Border: `focus:border-transparent`
  - Outline: `outline-none`
- **Placeholder**: Gray-400 color
- **Width**: Usually `w-full`

### Input with Icon
- **Layout**: Relative positioning
- **Icon Position**: Absolute left, `pl-10` on input
- **Icon**: Gray-400 color

### Labels
- **Font Size**: `text-sm`
- **Font Weight**: `font-medium`
- **Text Color**: Gray-700
- **Margin Bottom**: `mb-2`

### Textarea
- **Same padding/border as inputs**
- **Rows**: `rows={6}` (optional)
- **Resize**: `resize-none`
- **Min Height**: Based on rows

### Select/Dropdown
- **Same padding/border/focus as inputs**
- **Appearance**: Default browser styling
- **Padding Right**: Extra for arrow

### Checkbox
- **Size**: `h-4 w-4`
- **Color**: `text-orange-600`
- **Focus Ring**: `focus:ring-orange-500`
- **Border Color**: `border-gray-300`
- **Rounded**: `rounded` (slight roundness)

### Radio Button
- **Same sizing as checkbox**
- **Appearance**: Circular

### Switch
- **Background**: `#cbced4` (muted color)
- **Styling**: Tailwind component

---

## 7. CARD COMPONENTS

### Standard Card
- **Background**: White
- **Border Radius**: `rounded-lg`
- **Shadow**: `shadow` or `shadow-lg`
- **Padding**: `p-6` (standard), `p-8` (large)
- **Hover**: Optional `hover:shadow-xl transition-shadow`

### Feature Card (with icon)
- **Background**: White or colored background
- **Icon Container**: Colored circular background
- **Layout**: Centered or left-aligned
- **Border**: Optional `border-2 border-gray-200`

### Stat Card
- **Background**: White
- **Padding**: `p-6`
- **Icon Box**: Colored background with white icon
- **Value**: Large bold number
- **Label**: Small gray text
- **Change**: Small text (green or red)

### Status Badge
- **Padding**: `px-3 py-1`
- **Border Radius**: `rounded-full`
- **Font Size**: `text-sm`
- **Font Weight**: `font-medium`
- **Color Combinations**:
  - Success: Green-100 bg, Green-800 text
  - Warning: Yellow-100 bg, Yellow-800 text
  - Info: Blue-100 bg, Blue-800 text
  - Danger: Red-100 bg, Red-800 text
  - Muted: Gray-100 bg, Gray-800 text

---

## 8. SPACING & LAYOUT

### Vertical Spacing (Padding/Margins)
- **Section Padding**: `py-16` (large sections)
- **Section Padding**: `py-8` (smaller sections)
- **Container Padding**: `px-4 sm:px-6 lg:px-8`
- **Element Spacing**: `space-y-6`, `space-y-4`, `gap-8`, `gap-6`

### Horizontal Spacing
- **Grid Gap**: `gap-8` (large), `gap-6` (standard), `gap-4` (small)
- **Container Max Width**: `max-w-7xl` (main), `max-w-4xl` (narrower), `max-w-md` (form)

### Border Radius
- **Cards**: `rounded-lg`
- **Buttons**: `rounded-lg`
- **Inputs**: `rounded-lg`
- **Circles**: `rounded-full`
- **Small**: `rounded` (2px)

### Shadows
- **Light**: `shadow`
- **Medium**: `shadow-lg`
- **Heavy**: `shadow-xl`
- **Hover Transitions**: `transition-shadow`

---

## 9. RESPONSIVE DESIGN BREAKPOINTS

### Mobile First Approach
- **Base**: Mobile (< 768px)
- **sm**: Small (640px+)
- **md**: Medium (768px+) - Desktop nav shows
- **lg**: Large (1024px+)
- **xl**: XLarge (1280px+)

### Common Responsive Patterns
- **2 columns on mobile, 4 on desktop**: `grid-cols-2 md:grid-cols-4`
- **Hidden on mobile**: `hidden md:flex`
- **Full width on mobile**: `w-full`, 2-column on md: `md:grid-cols-2`
- **Navigation**: Hidden mobile menu, flex on md+

---

## 10. IMPLEMENTATION CHECKLIST FOR PHP CONVERSION

### Global Styles (style.css)
- [ ] Base colors in CSS variables
- [ ] Typography defaults
- [ ] Card component styles
- [ ] Button variants
- [ ] Form input styles
- [ ] Responsive grid system
- [ ] Utility classes for spacing, sizing, colors

### Layout.php (Base Template)
- [ ] Navigation bar structure
- [ ] Footer structure
- [ ] Main container wrapper
- [ ] Meta tags and CSS links

### HomePage.php
- [ ] Hero section with gradient
- [ ] 2-column hero grid
- [ ] Features grid (4 columns)
- [ ] Featured burgers grid with cards
- [ ] CTA section
- [ ] Footer

### AboutPage.php
- [ ] Hero section
- [ ] Story section (2-column)
- [ ] Values grid (4 columns)
- [ ] Stats section (4 columns)
- [ ] Team members grid (3 columns)
- [ ] CTA section

### ContactPage.php
- [ ] Hero section
- [ ] Contact info cards (4 columns)
- [ ] Contact form (multi-field layout)
- [ ] Map placeholder
- [ ] FAQ section

### LoginPage.php
- [ ] Centered login form
- [ ] Form fields with icons
- [ ] Social login buttons
- [ ] Sign up link

### RegisterPage.php
- [ ] Centered register form
- [ ] Multi-field layout
- [ ] Benefits cards below form
- [ ] Sign in link

### AdminOrdersPage.php
- [ ] Stats cards (4 columns)
- [ ] Search and filter bar
- [ ] Orders table with all columns
- [ ] Status badges
- [ ] Pagination
- [ ] Quick action cards

### AdminUsersPage.php
- [ ] Stats cards (4 columns)
- [ ] Search and filter bar
- [ ] Users table with all columns
- [ ] User avatars
- [ ] Status badges
- [ ] Pagination

---

## 11. KEY COLOR HEX CODES SUMMARY

```
Primary: #EA580C (Orange-600)
Secondary: #FB923C (Orange-500)
Accent: #FCD34D (Yellow-500)
Background: #FFFFFF (White)
Background Alt: #F9FAFB (Gray-50)
Text Primary: #111827 (Gray-900)
Text Secondary: #4B5563 (Gray-600)
Text Muted: #9CA3AF (Gray-400)
Border: rgba(0, 0, 0, 0.1)
Dark: #1F2937 (Gray-900)
Success: #10B981 (Green-600)
Warning: #F59E0B (Amber-500)
Info: #3B82F6 (Blue-500)
Danger: #EF4444 (Red-500)
Light Orange: #FED7AA (Orange-100)
Light Green: #D1FAE5 (Green-100)
Light Blue: #DBEAFE (Blue-100)
```

---

This comprehensive breakdown contains all the visual and layout specifications you need to rebuild the PHP pages to match the design wireframes exactly!
