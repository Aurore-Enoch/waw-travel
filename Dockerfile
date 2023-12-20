FROM mattrayner/lamp:latest-2004-php8

WORKDIR /app/waw-travel
# Copy application source
COPY . /app/waw-travel

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["/run.sh"]
