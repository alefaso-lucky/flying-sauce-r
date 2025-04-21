🍝 flying-sauce-r: Pasta Delivery Full Stack Web App
=====================================================

> 🚀 A feature-rich, full-stack **pasta delivery platform** built with PHP, JavaScript, HTML, and CSS — developed by a team of four over three months as part of a Bachelor's degree project. Includes responsive design, user authentication, cart/order management, and admin controls.

* * *

📌 Overview
-----------

**FlyingSauce-r-** is a complete web-based **pasta delivery system**, designed with a modular approach to simulate a real-world food ordering service. Built using **vanilla PHP, JavaScript, HTML, and CSS**, it features **responsive design**, **dynamic cart functionality**, **secure user login/registration**, and an **order summary system** — all backed by a database.

* * *

💡 Features
-----------

### 👥 User Interaction

* Secure registration and login
    
* Personal account management with reserved area
    
* Dynamic pasta selection and customization
    
* Add to cart with real-time quantity updates
    
* Order finalization and summary
    

### 🛠️ Backend Logic (PHP)

* User sessions and access restriction
    
* Cart and order state management via PHP
    
* Modular PHP files for scalability
    
* Form validation and feedback mechanisms
    

### 💻 Frontend Experience

* Modular CSS for each section/page
    
* JavaScript to manage client-side interactivity
    
* Responsive layout across devices
    

* * *

🧱 Detailed Project Structure
-----------------------------

```
📦 FlyingSauce-r-
│
├── 📁 accedi                  # Login system
│   ├── accedi.php            # Login form and PHP logic
│   ├── accedi.css            # Styling for login
│   ├── accediSimple.css      # Lightweight version styling
│   └── accediSimple.php      # Simple login view
│
├── 📁 account                # User's reserved area
│   ├── area_riservata.php    # Main dashboard after login
│   ├── area_riservata.css    # Dashboard styles
│   ├── area_riservata.js     # Interactivity in reserved area
│   ├── info_personali.png    # UI assets for profile info
│   ├── ordini.png            # UI assets for orders
│   ├── sicurezza.png         # Icons for secure section
│   └── spedizione.png        # Shipping-related visual
│
├── 📁 base                   # Shared components and navigation
│   ├── nav.php               # Main navigation bar
│   ├── nav.css               # Styling for nav
│   ├── navFINITA.php         # Final version of nav
│   ├── navFINITA.css         # Final nav styles
│   ├── navSimple.php         # Lightweight nav variant
│   ├── navSimple.css         # Styling for simplified nav
│   ├── footer.php            # Shared footer
│   ├── footer.css            # Footer styling
│   ├── generic.css           # General shared styles
│   ├── pgpopolare.php        # Popular pages/posts
│   ├── pgpopolare2.php       # Additional popular content
│   └── pgconnection.php      # Database connection handler
│
├── 📁 crea account           # Account creation
│   ├── creaAccount.php       # Sign-up form & logic
│   ├── creaAccount.css       # Form styling
│   └── 📁 informative        # Legal/privacy information
│       ├── condizioni.php    # Terms and conditions
│       ├── condizioni.css    # Styling for terms page
│       ├── infoPrivacy.php   # Privacy policy content
│       ├── infoPrivacy.css   # Styling for privacy policy
│
├── 📁 menu                   # Menu section
│   ├── 📁 carrello           # Cart management
│   │   ├── resoconto.php     # Full cart summary
│   │   ├── resoconto.css     # Cart styling
│   │   ├── resoconto.js      # Cart interactivity
│   │   └── resocontoSimple.php # Lightweight cart view
│   │
│   └── 📁 piatto_singolo     # Individual dish details
│       ├── piatto.php        # Dish page logic
│       ├── piatto.css        # Styling for dish page
│       ├── ordina.php        # Handle 'order now' actions
│       ├── ordina.css        # Order form styles
│       ├── ordina.js         # JS for ordering interactions
│       └── updateCart.php    # Handle AJAX cart updates
│
├── 📁 registrati             # Registration process
│   ├── registrati.php        # Registration handler
│   ├── registrati.css        # Styling for registration
│   ├── registratiSimple.php  # Alternative registration view
│   ├── registratiSimple.css  # Lightweight version styles
│   ├── logindb.php           # Backend login DB operations
│   └── mergeAccReg.php       # Merge login/registration logic
│
├── 📁 chi siamo              # About Us section
│   ├── chi siamo.php         # Team/project presentation
│   ├── chi siamo.css         # Styling
│   └── chi siamo.js          # Section animation or logic
│
├── 📁 componi piatto         # Custom pasta builder
│   ├── cPiattoDef.php        # Logic for custom pasta builder
│   ├── cPiattoDef.css        # Styling
│   └── cPiattoDef.js         # Interactivity and validation
│
└── 📁 media                  # Images, icons, assets
```

* * *

🧪 Development Process
----------------------

> 👨‍💻 A team project developed over 3 months, with clear division of responsibilities and a real-world collaboration approach.

* 🧠 Requirements analysis and feature planning
    
* 🧩 UI/UX wireframes and responsive layout design
    
* ⚙️ Incremental backend development (PHP/MySQL)
    
* 💡 Frontend polish and JavaScript enhancements
    
* 🧪 Manual QA testing across different devices
    

* * *

🌐 Language Note
----------------

Although written in **Italian**, the code follows clear and clean naming conventions. Every component is **modularized** and easy to interpret, even for English-speaking developers or recruiters.

* * *

👥 Team Collaboration
---------------------

Developed by a team of 4 university students — with rotating ownership of backend logic, frontend design, and integration. The project promoted:

* 🛠️ Version control with Git
    
* 📋 Regular team sync-ups and retrospectives
    
* ✅ Collaborative problem-solving
    

* * *

📸 Interface Preview
--------------------

![Menu Preview](https://github.com/yourusername/FlyingSauce-r-/assets/menu-preview.png)  
![Cart View](https://github.com/yourusername/FlyingSauce-r-/assets/cart-preview.png)  
![Custom Pasta Builder](https://github.com/yourusername/FlyingSauce-r-/assets/custom-builder.png)

* * *

📈 SEO Tags
-----------

```
php food delivery website, custom pasta builder, italian food app, 
food delivery github php, ecommerce php project, responsive php web app,
pasta delivery site, student food delivery project php, online cart system php
```

* * *

🚀 Getting Started
------------------

1. **Clone the repository**
    

```bash
git clone https://github.com/yourusername/FlyingSauce-r-.git
```

2. **Set up local development environment**
    
    * Use [XAMPP](https://www.apachefriends.org/) or [MAMP](https://www.mamp.info/)
        
    * Import the MySQL database if included (SQL file)
        
    * Place files in `htdocs/` or equivalent directory
        
3. **Launch the app**
    
    * Visit `http://localhost/FlyingSauce-r-/`
        
    * Start exploring!
        

* * *

📄 License
----------

Licensed under the **MIT License** — you're free to use, modify, and distribute this software with attribution.

> ⭐ Like what you see? Consider giving the project a star!

* * *
