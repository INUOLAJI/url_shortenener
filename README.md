# 🔗 URL Shortener

A simple and lightweight **URL Shortener** built with **PHP and PostgreSQL**. It allows users to convert long URLs into short, easy-to-share links and automatically redirects visitors to the original URL.

🌐 **Live Demo:** [url-shortenener.onrender.com](https://url-shortenener.onrender.com/)
📦 **Repository:** [github.com/INUOLAJI/url_shortenener](https://github.com/INUOLAJI/url_shortenener)

---

## ✨ Features

* 🔗 Shorten long URLs into compact links
* ⚡ Fast URL redirection
* 🗄️ PostgreSQL database integration
* 🔐 Unique short URL generation
* ✅ URL validation
* 📱 Simple and responsive interface
* 🐳 Docker support
* ☁️ Deployment configuration for Render
* 🔄 Automatic redirection from short URLs to original URLs

---

## 🛠️ Tech Stack

| Technology     | Purpose          |
| -------------- | ---------------- |
| **PHP**        | Backend logic    |
| **PostgreSQL** | Database         |
| **HTML/CSS**   | User interface   |
| **Docker**     | Containerization |
| **Render**     | Deployment       |

---

## 📂 Project Structure

```text
url_shortenener/
│
├── index.php        # Main application and URL shortening logic
├── redirect.php     # Handles short URL redirection
├── Dockerfile       # Docker configuration
├── render.yaml      # Render deployment configuration
├── .gitignore       # Git ignored files
└── README.md        # Project documentation
```

---

## 🚀 Getting Started

### Prerequisites

Before running the project locally, make sure you have:

* PHP 8+
* PostgreSQL
* Git
* Docker *(optional)*

---

### 📥 Clone the Repository

```bash
git clone https://github.com/INUOLAJI/url_shortenener.git
```

Navigate into the project:

```bash
cd url_shortenener
```

---

## 🗄️ Database Setup

Create a PostgreSQL database for the application.

Example:

```sql
CREATE DATABASE url_shortener;
```

Configure your database connection using the environment variables required by the application.

> **Important:** Never commit database credentials, API keys, or other secrets to GitHub.

---

## ▶️ Run Locally

If PHP is installed on your machine, you can start the built-in development server:

```bash
php -S localhost:8000
```

Then open:

```text
http://localhost:8000
```

---

## 🐳 Running with Docker

Build the Docker image:

```bash
docker build -t url-shortener .
```

Run the container:

```bash
docker run -p 8000:8000 url-shortener
```

Then visit:

```text
http://localhost:8000
```

---

## ☁️ Deployment

The project includes a `render.yaml` configuration file for deployment on **Render**.

To deploy:

1. Fork or clone this repository.
2. Create a new Web Service on Render.
3. Connect your GitHub repository.
4. Configure the required environment variables.
5. Deploy the application.
6. Render will build and deploy the application using the project configuration.

### Live Application

🚀 **[Open URL Shortener](https://url-shortenener.onrender.com/)**

---

## 🔄 How It Works

The application follows a simple workflow:

```text
User enters long URL
        ↓
URL validation
        ↓
Generate unique short identifier
        ↓
Store URL + identifier in PostgreSQL
        ↓
Return shortened URL
        ↓
User opens shortened URL
        ↓
Application finds original URL
        ↓
Redirect to original URL
```

---

## 🧪 Example

Suppose you have a long URL:

```text
https://example.com/some/very/long/path
```

The application generates a shorter URL such as:

```text
https://your-domain.com/abc123
```

When someone visits the shortened URL:

```text
/abc123
```

the application looks up the corresponding original URL and redirects the user.

---

## 🔒 Security Considerations

For production environments, consider:

* Validating submitted URLs before storing them.
* Using prepared SQL statements.
* Keeping database credentials in environment variables.
* Adding rate limiting to prevent abuse.
* Preventing malicious URL schemes.
* Using HTTPS in production.
* Adding expiration or deletion functionality for links.
* Protecting database credentials and other secrets.

---

## 🚧 Future Improvements

Possible features that could be added:

* 📊 Click analytics
* 👤 User authentication
* 📈 Dashboard for shortened URLs
* 🗑️ Delete shortened URLs
* ⏳ URL expiration
* 🔗 Custom aliases
* 📱 Improved mobile UI
* 📋 One-click copy button
* 🌍 Custom domain support
* 🔐 Password-protected links
* 🧾 API endpoints
* 📊 Detailed visitor statistics

---

## 🎯 Project Purpose

This project was built as a practical full-stack/backend project to explore:

* PHP backend development
* PostgreSQL database integration
* URL generation and redirection
* Server-side validation
* Docker containerization
* Cloud deployment
* Working with environment variables
* Building and deploying a real-world web application

---

## 👨‍💻 Author

**Bello Abdulmuqtadir Inuolaji**

Full-Stack Developer & Cybersecurity Student

### Connect With Me

* 🐙 GitHub: [@INUOLAJI](https://github.com/INUOLAJI)
* 💼 LinkedIn: [Bello Inuolaji](https://www.linkedin.com/in/bello-inuolaji-637962405)

---

## ⭐ Support

If you find this project useful or interesting, consider giving the repository a ⭐ on GitHub.

---

### 📄 License

This project is open-source and available for educational and personal use.
