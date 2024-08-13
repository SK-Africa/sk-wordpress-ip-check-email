# Operating Procedure: WordPress IP Check and Email Notification System

## 1. Implementation

1.1. Access your WordPress site's files via FTP or your hosting control panel or via WordPress admin.

1.2. Locate and open the `functions.php` file in your current theme's directory.

1.3. Copy the provided PHP script and paste it at the end of the `functions.php` file.

1.4. Save the changes to `functions.php` and upload it back to the server if necessary.

## 2. Configuration

2.1. Review the list of allowed IP addresses in the script:
   ```php
   $allowed_ips = array(
       '185.183.182.25',
       '185.189.27.20',
       '185.185.126.65',
       '185.183.182.10',
       '31.187.70.137',
       '185.183.182.222'
   );
   ```
   Update this list if necessary to include all valid server IP addresses.

2.2. Verify the email recipients are correct:
   ```php
   $to = 'web@searchkingsafrica.com';
   ```
   Modify if additional recipients need to be added or removed.

## 3. Testing

3.1. After implementation, manually trigger the function to ensure it's working:
   - Add a temporary line at the end of the script: `check_server_ip_and_notify();`
   - Access any page on your WordPress site to trigger the function.
   - Check the specified email addresses for the test notification.
   - Remove the temporary line after confirming it works.

3.2. If you don't receive the test email:
   - Check your server's email configuration.
   - Consider installing an SMTP plugin for WordPress to ensure reliable email delivery.

## 4. Monitoring

4.1. The script is set to run daily. Monitor the specified email addresses for any alerts.

4.2. If you receive an alert:
   - Immediately investigate why the site is hosted on an unrecognised IP.
   - Contact your hosting provider if you suspect any unauthorised changes.

## 5. Maintenance

5.1. Regularly review and update the list of allowed IP addresses:
   - Add new IPs if you change hosting providers or server locations.
   - Remove old IPs that are no longer in use.

5.2. Periodically test the system by temporarily adding an incorrect IP to the allowed list and triggering the check.

## 6. Troubleshooting

6.1. If the system stops working:
   - Verify the script is still present in `functions.php`.
   - Check if your WordPress cron jobs are running correctly.
   - Ensure our server's IP addresses haven't  changed without our knowledge.

6.2. If you're receiving false positives:
   - Double-check your list of allowed IPs.
   - Verify with your hosting provider that they haven't made any changes.

## 7. Security Considerations

7.1. Keep the script and the list of allowed IPs confidential.

7.2. Regularly update WordPress, themes, and plugins to maintain overall site security.

