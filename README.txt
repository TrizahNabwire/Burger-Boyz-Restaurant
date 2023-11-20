Burger Boyz Restaurant 
An ecommerce website with functionalities such as:

*Admin can :
 1. Add Admin, Change Password, Update Admin, Delete Admin
 2. Admin can Add, Update and Delete Category
 3. Admin can Add, Update and Delete Food
 4. Amin can Update Order

 *User
 1. Place Order


 ** DATABASE DESIGN
 Table: admin
                id int primary
                fullname varchar
                username varchar
                Password varchar

Table: category
                id int primary
                title varchar
                image_name varchar
                featured varchar
                active varchar

Table: tbl_order
                id int primary
                food varchar
                price decimal
                quantity int
                order_date varchar
                status varchar
                customer_name varchar
                customer_contact varchar
                customer_email varchar
                customer_address varchar

Table: food
                id int primary
                title varchar
                description varchar
                price decimal
                image_name varchar
                category_id int
                featured varchar
                active varchar
 