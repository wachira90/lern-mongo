To generate a `.pem` file for MongoDB TLS/SSL encryption, follow these steps to create a self-signed certificate for testing or a Certificate Signing Request (CSR) to obtain a signed certificate from a Certificate Authority (CA):

### Option 1: Generate a Self-Signed PEM Certificate

1. **Create a Private Key and Certificate**

   ```bash
   openssl req -newkey rsa:2048 -nodes -keyout mongodb.key -x509 -days 365 -out mongodb.crt
   ```

   - `mongodb.key`: The private key file.
   - `mongodb.crt`: The self-signed certificate, valid for 365 days.

2. **Combine Key and Certificate into a `.pem` File**

   Combine the private key and certificate into a single `.pem` file:

   ```bash
   cat mongodb.key mongodb.crt > mongodb.pem
   ```

3. **Secure the Key File**

   Set appropriate permissions for the `.pem` file to restrict access:

   ```bash
   chmod 600 mongodb.pem
   ```

   Now you can specify the location of `mongodb.pem` as the `PEMKeyFile` in MongoDB's `mongod.conf`:

   ```yaml
   net:
     ssl:
       mode: requireSSL
       PEMKeyFile: /path/to/mongodb.pem
   ```

4. **Restart MongoDB**

   ```bash
   sudo systemctl restart mongod
   ```

### Option 2: Create a CSR for a CA-Signed Certificate

If you want to use a CA-signed certificate instead:

1. **Generate a Private Key**

   ```bash
   openssl genrsa -out mongodb.key 2048
   ```

2. **Generate a CSR (Certificate Signing Request)**

   ```bash
   openssl req -new -key mongodb.key -out mongodb.csr
   ```

3. **Submit the CSR to a CA**

   - Send `mongodb.csr` to a Certificate Authority (e.g., Let's Encrypt, DigiCert) to obtain a signed certificate.

4. **Combine the Signed Certificate with the Private Key**

   Once you receive the signed certificate from the CA, combine it with your private key:

   ```bash
   cat mongodb.key mongodb_cert_from_CA.crt > mongodb.pem
   ```

5. **Set File Permissions and Restart MongoDB**

   ```bash
   chmod 600 mongodb.pem
   sudo systemctl restart mongod
   ```

Your MongoDB server should now be configured to use SSL/TLS with the specified `.pem` file.
