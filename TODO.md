cd public;
ln -s ../storage/app/public storage

## email issue resolution maybe
php artisan queue:restart
php artisan clear-compiled
php artisan cache:clear
php artisan config:clear

MyT&N@2024#!
UPDATE `student_codes` SET `exam_center` = NULL,`exam_at` = NULL,`admitcard_before` = NULL,`exam_mins` = NULL, `roll_no` = NULL, `issued_admitcard` = 1;

UPDATE `student_codes` 
SET `roll_no` = NULL,
`exam_center` = NULL,
`exam_at` = NULL,
`admitcard_before` = NULL,
`issued_admitcard` = 0,
`exam_mins` = NULL;

## TODO after push
SSH
1988DEC7@htesham
ssh -p 65002 u482032683@89.116.133.61
cd domains/careerwithoutbarrier.com/public_html
php artisan optimize:clear; php artisan clear-compiled; php artisan cache:clear; php artisan config:clear
# check for migration
php artisan migrate;
# for storage:link
cd public;ln -s ../storage/app/public storage;cd ../;

## main path of domains
u482032683 = ~
/home/u482032683/domains/careerwithoutbarrier.com/public_html
/home/u482032683/domains/develop.testandnotes.com/public_html
/home/u482032683/domains/testandnotes.com/public_html

cp -r -a . /path/to/destination/directory

## NOV-20
https://careerwithoutbarrier.com/administrator/student_list
Centr Column remove -> [DONE]
App Code= Appl No -> [DONE]
District+Centre -> [DONE]
Payment Rs 0 -> [DONE]
Print PDF -> [DONE]

https://careerwithoutbarrier.com/administrator/studentRollList
Roll no generation -> [DONE]

https://careerwithoutbarrier.com/administrator/student_result
Student Dashboard Result -> [DONE]

If discount is above 60% then discount line is removed, Final online Paid Amount, Text Letter Capitalize -> [DONE]

## DEC-18
in website -> register student -> Institute code live verify -> [SKIP]
New corporate enquiry (interested for more than one) -> [DONE]
In Admin -> New corporate inquiry -> photo issuep -> [DONE]
In admin -> institute list last top -> [DONE]
In admin -> dashboard card -> fully clickable -> [DONE]
In admin -> new institute sign-up card link not proper -> [DONE]
in admin -> all institute lists -> photo issue -> [DONE]
in website -> free-form -> table city issue -> [DONE]
New institute city not showimg in free form provider list  link in footer get 100 -> [DONE]
http://careerwithoutbarrier.test/free-form -> [DONE]
Father/Mother labels in apply form in students -> [DONE]
In admin -> issue = Automatically issued coupons -> [DONE] [Database-Issue-Resolved]
In student dashboard -> roll number not showing -> [DONE]
kindly check photo display issue in student form / institute form and also  upload issue in everywhere

## DEC31: Start 5000 form will be free
Coupon list will be create properly -> [DONE]
Coupon description (new property) -> [DONE]
Coupon description (Registration & Payment)
Popup message - dynamic - image only -> [DONE]
Student payment page content -> ## from WhatsApp
Contact list, all details needed to be checked -> [DONE]
Contact list, when reply, details needed to show in the modal -> [DONE]
Create new contact list page -> [DONE]
Create new contact reply page -> [DONE]
Add Cloudflare

Voucher Discount Display when Applied
Provided By
Issued By
Discount Value as working

## Jan3
Popup only on homepage -> [DONE]
Logo link to homepage -> [DONE]
homepage apply now to registration form -> [DONE]
Contact details on reply contact info with signature -> [DONE]

admin -> New istitute signup (header) -> wrong link -> [DONE]
admin -> New Student signup (header) -> wrong link (same as new students box) -> [DONE]

Student dashboard -> homepage button -> [DONE]

Referall code or coupon working if disabled -> [DONE]
Registration -> if 300 & above forms are available, referall code is not there only on payment page (reference code box visible only when remaining forms are visible) (27 NOV) -> [DONE]

Student delete feature
Student reset feature (registration will be there)
Institute delete feature

Student, Institutes, mobile number otp needed to be delete all data

Reset feature TBD

## message on payment page
This Discount Voucher was Provided By
SQS Foundation, Kanpur
Issued/Distributed BY 
Educraft Educations