# roger_skyline_1
Files for roger-skyline-1 (old 42 cursus)

With the migration from old 42 cursus to new one, roger skyline is not available anymore.

This repo contains necessary files to replicate roger-skyline-1 on a blank VM.

To use it, navigate to the ansible directory and run the rsk1-install.yml (see the first two lines)

The VM (and playbooks) include:

- Basic configuration (sshd, users, etc...)
- Firewall
- Website (dreamweb)
- fail2ban (DDoS protection)
- psad (Port Scan protection)
