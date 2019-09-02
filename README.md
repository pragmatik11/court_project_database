court_database2
===============

A Symfony project created on August 29, 2019, 1:42 pm.
1. Login page.
   
2. Profile page.
    • Includes file search field.
    • File registration field.
3. Creating tables for newly registered folders.
    • Table for registering Civil files
                   The table must contain ID, Name, Description and Type
    • Table for the registration of criminal files
                • The table must contain ID, Name, Description and Type
    • Tabs for registering administrative type files
                • The table must contain ID, Name, Description and Type
    • Table for the registration of files of Conticios Administrativ type
                • The table must contain ID, Name, Description and Type
Also, the registration of the scanned documentation in pdf format and checked for addition to the newly registered file.
The formation of the director will be the formation of the path for each file.
4. The relationship between Account and Tables should be 1: M
5. In order to search the file, a new page will be displayed, showing the files found by ID or Name.
7. After finding the file and selecting it, we go to another page where we have the following options
    • Name change, Description and type.
    • And the delete button.
