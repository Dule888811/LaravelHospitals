You need to build a notification system, which will be used for sending notifications to doctors on
hospitals.
There is a user which has ability to perform most of the actions in the system. We will call him
administrator.
Administrator can maintain a list of hospitals. Hospital has name, unique serial number (consists of
8 characters) and image.
Doctor is an user which is working on a dedicated hospital. He can login into the system. Every doctor
must have one specialty.
Specialty has name. Only administrator has ability to maintain specialties in the system. One
specialty can be dedicated to multiple doctors.
Administrator can add doctor to a hospital. He needs to give doctor’s name, surname and email
address. Beside this, he also needs to dedicate him one specialty.
After adding, email is sent to a given email address.
When doctor receives the
email, he can click on the link. When he opens link from the email, he should see form where he
needs to provide password which he will use for logging in. After he successfully provided his
password, he will be redirected to the page where his notifications are listed (described bellow).
He can read his notifications. After he read notification, he can announce notification as seen.
System should log date and time when doctor saw notification.
Administrator can send notifications to doctors.


                                        Technologies: Laravel 6
 i used repository patern,for image crazybooot/base64-validation package,laravel/ui package for view 
 and gate facade.
                                        
