cd public
ln -s ../storage/app/public storage

## email issue resolution maybe
php artisan queue:restart
php artisan clear-compiled
php artisan cache:clear
php artisan config:clear


MyT&N@2024#!
UPDATE `student_codes` SET `exam_center` = NULL,`exam_at` = NULL,`admitcard_before` = NULL,`exam_mins` = NULL;


UPDATE `student_codes` 
SET `roll_no` = NULL,
`exam_center` = NULL,
`exam_at` = NULL,
`admitcard_before` = NULL,
`issued_admitcard` = 0,
`exam_mins` = NULL;