🍝 Flying-Sauce-r: Pasta Delivery Full Stack Web App
=====================================================

>🚀 A feature-rich, full-stack web application that serves as **pasta delivery platform** built with PHP, JavaScript, HTML, and CSS. Developed during a **3-month university project** by a team of 4, it demonstrates skills in **web development**, **database integration**, and **responsive UI/UX design**. Includes responsive design, user authentication, cart/order management, and admin controls.

* * *

📌 Overview
-----------

**Flying-Sauce-r** is a complete web-based **pasta delivery system**, designed with a modular approach to simulate a real-world food ordering service. Built using **vanilla PHP, JavaScript, HTML, and CSS**, it features **responsive design**, **dynamic cart functionality**, **secure user login/registration**, and an **order summary system**, all backed by a PostgreSQL database.

### 📁 Project Highlights

* 🛒 **Dynamic Cart Management**: Add, edit, and remove items with real-time updates.
    
* 👤 **User Authentication**: Secure login, registration, and access to a personal restricted area.
    
* 🍝 **Customizable Pasta Builder**: Create and customize your own pasta dish with a modular builder.
    
* 📦 **Order Management**: Seamless order finalization within a protected area.
    
* 📱 **Responsive Design**: Optimized for multiple browsers and devices.
    
* 🛠️ **Database Integration**: Full CRUD operations for users, orders, and products.

* * *

🌍 Language Note
----------------

All **code comments and internal documentation** are written in **Italian**, as the project was developed during a group exam at the **University of Salerno (Italy)**.

Despite this, the **codebase follows international best practices**, with clear method names and class structures that make it easily understandable for global developers and recruiters.

* * *

🛠️ Technologies Used
---------------------

* **Frontend**: HTML, CSS, JavaScript
    
* **Backend**: PHP
    
* **Database**: PostgreSQL (with provided `.sql` backup)
    
* **Version Control**: Git

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

🧪 Development Process
----------------------

> 👨‍💻 A team project developed over 3 months, with clear division of responsibilities and a real-world collaboration approach.

* 🧠 Requirements analysis and feature planning
    
* 🧩 UI/UX wireframes and responsive layout design
    
* ⚙️ Incremental backend development (PHP/PostgreSQL)
    
* 💡 Frontend polish and JavaScript enhancements
    
* 🧪 Manual QA testing across different devices
    

* * *

👥 Team Collaboration
---------------------

Developed by a team of 4 university students, with rotating ownership of backend logic, frontend design, and integration. The project promoted:

* 🛠️ Version control with Git
    
* 📋 Regular team sync-ups and retrospectives
    
* ✅ Collaborative problem-solving
    

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

📸 Interface Preview
--------------------

Here are some of the pages we realized:
* Sign-up page
![sign-up](https://github.com/user-attachments/assets/4a85f124-a3e2-4de7-b779-07036f5f03cc)

* Custom Pasta builder


* Cart View


* * *

📖 How to Run Locally
---------------------

1. Clone this repository:
    
    ```bash
    git clone https://github.com/francescopiocirillo/flying-sauce-r.git
    ```
    
2. Import the `backup_database_flying_sauce_r.sql` into your local PostgreSQL server.
    
3. Update database credentials in `connessionedb.php`.
    
4. Launch the project on a local server like XAMPP, WAMP, or MAMP.
    
5. Access the project from your browser:
    
    ```
    http://localhost/flying-sauce-r/
    ```![sign-up](https://github.com/user-attachments/assets/47a5b5b3-cc50-4107-982f-78dacf661977)
![sign-up](https://github.com/user-attachments/assets/9a48f938-3a1b-4887-b6fe-6a6826e7af0b)

    

* * *

📋 Documentation
----------------

You can find documentation and technical reports inside the `docs/` folder, including:

* Wireframes
    
* Technical Report (PDF)
    

* * *

📬 Contacts
-----------

✉️ For questions or suggestions, feel free to contribute or report any corrections! Open an **Issue**!🚀

* * *

📈 SEO Tags
-----------

```
php food delivery website, custom pasta builder, italian food app, 
food delivery github php, ecommerce php project, responsive php web app,
pasta delivery site, student food delivery project php, online cart system php
```

* * *

📄 License
----------

This project is licensed under the **MIT License**, a permissive open-source license that allows anyone to use, modify, and distribute the software freely — as long as credit is given and the original license is included.

> In plain terms: **use it, build on it, just don’t blame us if something breaks**.

> ⭐ Like what you see? Consider giving the project a star!

* * *
