# Lijo Laravel Application Setup

This guide will help you set up and run the **Lijo** Laravel application using Docker and a Makefile. Follow the steps below to get started.

## Prerequisites

Before you begin, ensure you have the following installed on your system:

- [Docker](https://www.docker.com/get-started) (Make sure Docker is running)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Make](https://www.gnu.org/software/make/) (Usually pre-installed on macOS and Linux. On Windows, you might need to install it separately or use WSL)
- **SSH Key** (Optional but recommended for secure Git operations)

## Setting Up SSH Key for Git

To securely interact with your Git repository, it’s recommended to use SSH keys. Below are the steps to generate an SSH key and add it to your GitHub account and local machine:

1. **Generate an SSH Key**

   If you don't already have an SSH key, generate one using the following command:

   ```bash
   ssh-keygen -t ed25519 -C "your_email@example.com"
