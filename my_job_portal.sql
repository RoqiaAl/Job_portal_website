-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2025 at 02:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_job_portal`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_company` (IN `id` INT(7), IN `co_name` VARCHAR(50), IN `activity` VARCHAR(30), IN `hr_phone` INT(14), IN `website` VARCHAR(30), IN `region_id` INT(7), IN `created_at` YEAR, IN `working_time` VARCHAR(25), IN `co_background` TEXT, IN `garantee` LONGBLOB, IN `goal` TEXT, IN `vision` TEXT, IN `co_logo` BLOB)   BEGIN
DECLARE
        user_exists INT DEFAULT 0 ;
        SELECT
            COUNT(*)
        INTO user_exists
    FROM
        compant
    WHERE
        compant.id = id ; IF user_exists THEN
    SELECT
        'company already add information , press update' as message ;
        ELSE
INSERT INTO compant (id,co_name,activity,hr_phone,website,region_id,created_at,working_time,co_background,garantee,goal,vision,co_logo)VALUES
(id,co_name,activity,hr_phone,website,region_id,created_at,working_time,co_background,garantee,goal,vision,co_logo);

SELECT
        'company has been added successfuly' as message ;
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_experience` (IN `s_id` INT(7), IN `title` VARCHAR(30), IN `inistitute` VARCHAR(30), IN `p_phone` INT(14), IN `start_date` YEAR, IN `end_date` YEAR, IN `responsability` TEXT)   BEGIN
DECLARE found int DEFAULT 0;
SELECT COUNT(*) INTO found from jobseeker WHERE jobseeker.id=s_id;
if found then
INSERT INTO experience(s_id,title,inistitute,p_phone,start_date,end_date,responsability)VALUES
(s_id,title,inistitute,p_phone,start_date,end_date,responsability);
SELECT 'تمت الإضافة بنجاح  ' AS message;
ELSE 
SELECT 'قم بإضافة البيانات الشخصية اولا  ' AS message;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_feedback` (IN `u_id` INT(7), IN `body` TEXT)   BEGIN
   INSERT INTO  feedback (u_id,body)VALUES(u_id,body);
  
   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_jobseeker` (IN `id` INT(7), IN `full_name` VARCHAR(50), IN `gender` VARCHAR(10), IN `civil_status` VARCHAR(10), IN `birth_date` DATE, IN `educational_level` VARCHAR(30), IN `category_id` INT(7), IN `exp_period` VARCHAR(20), IN `u_background` TEXT)   BEGIN
    DECLARE
        user_exists INT DEFAULT 0 ;
        SELECT
            COUNT(*)
        INTO user_exists
    FROM
        jobseeker
    WHERE
        jobseeker.id = id ; IF user_exists THEN
    SELECT
        'jobseeker already add information , press update' as message ;
        ELSE
    INSERT INTO jobseeker(
        id,
        full_name,
        gender,
        civil_status,
        birth_data,
        educational_level,
        category_id,
        exp_period
    )
VALUES(
    id,
    full_name,
    gender,
    civil_status,
    birth_date,
    educational_level,
    category_id,
    exp_period
) ;
SELECT
        'inserted successfully' as message ;
        END IF ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_language` (IN `s_id` INT(7), IN `name` VARCHAR(20), IN `speaking` VARCHAR(20), IN `writing` VARCHAR(20), IN `reading` VARCHAR(20))   BEGIN
DECLARE found int DEFAULT 0;
DECLARE active boolean DEFAULT 1;
SELECT add_language INTO active from jobseeker_customization WHERE jobseeker_customization.s_id=s_id;
if active then
  SELECT COUNT(*) INTO found from jobseeker WHERE jobseeker.id=s_id;
   if found then
   INSERT INTO language(s_id,name,speaking,writing,reading)VALUES
   (s_id,name,speaking,writing,reading);

   SELECT 'تمت الإضافة بنجاح  ' AS message;
   ELSE 
   SELECT 'قم بإضافة البيانات الشخصية اولا  ' AS message;
   end if;
ELSE 
SELECT 'تم ايقاف صلاحية هذه العمليه لهذا الحساب  ' AS message;

end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_notification` (IN `title` VARCHAR(50), IN `users` VARCHAR(30), IN `text` TEXT, IN `sender_id` INT(7))   BEGIN
DECLARE time datetime DEFAULT CURRENT_TIMESTAMP;
INSERT INTO notification(title,users,text,sent_at,sender_id)values
(title,users,text,time,sender_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_qualification` (IN `qualification_level` VARCHAR(20), IN `title` VARCHAR(30), IN `inistitute` VARCHAR(40), IN `timeframe` VARCHAR(20), IN `s_id` INT(7), IN `country_id` VARCHAR(20), IN `grade` VARCHAR(10))   BEGIN
INSERT INTO qualification(qualification_level, title, inistitute, timeframe, s_id, country_id, grade ) VALUES(
    qualification_level, title, inistitute, timeframe, s_id, country_id, grade);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_skill` (IN `s_id` INT(7), IN `title` VARCHAR(60))   BEGIN
   INSERT INTO skill(s_id, title) VALUES(s_id, title); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_training` (IN `s_id` INT(7), IN `title` VARCHAR(20), IN `inistitute` VARCHAR(40), IN `timeframe` VARCHAR(30), IN `type` VARCHAR(20))   BEGIN
    INSERT INTO training(
        s_id,
        title,
        inistitute,
        timeframe,
        type
    )
VALUES(
    s_id,
    title,
    inistitute,
    timeframe,
    type
) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `apply_job` (IN `j_id` INT(7), IN `s_id` INT(7))   BEGIN
declare applied int DEFAULT 0;
declare found int DEFAULT 0;

SELECT count(*)  into found from jobseeker WHERE jobseeker.id=s_id;
IF found THEN
 SELECT COUNT(*) INTO applied from job_applicants WHERE job_applicants.j_id=j_id AND
 job_applicants.s_id=s_id;

 IF applied  THEN
    SELECT 'you actually applied ' as message ;
 
  ELSE
    insert into job_applicants(j_id,s_id,status)VALUES(j_id,s_id,'in_progress');
    SELECT 'applied successfully' AS message;
    
    end if;
ELSE
SELECT 'you must add your cv information first' AS message;
    
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `company_details` (IN `co_id` INT(7))   BEGIN
    SELECT 
        co.co_name,
        co.website,
         co.co_logo,
        co.working_time,
        co.created_at,
        co.co_background,
        co.vision,
        co.goal,
        u.address,
        r.name AS region_name
        
    FROM 
        compant co
    INNER JOIN 
        user u ON co.id = u.id
    INNER JOIN 
        region r ON co.region_id = r.id
    
    WHERE 
        co.id = co_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contact_us` (IN `NAME` VARCHAR(20), IN `email` VARCHAR(30), IN `SUBJECT` VARCHAR(40), IN `body` TEXT)   BEGIN
    INSERT INTO contact(NAME, email, SUBJECT, body)
VALUES(NAME, email, SUBJECT, body) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_by_clause` (IN `table_name` VARCHAR(20), IN `column_name` VARCHAR(20), IN `condition_state` VARCHAR(20))   BEGIN
    SET @sql = CONCAT('DELETE FROM ', table_name, ' WHERE ', column_name, ' = ', condition_state);
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_company_account` (IN `co_id` INT(7))   BEGIN
 DECLARE company_name VARCHAR(50) ;
        DECLARE hr_number INT(14) ;
        DECLARE garantee_file LONGBLOB ;
    SELECT 
        co_name,
        hr_phone,
        garantee
    INTO company_name , hr_number, garantee_file
FROM
    compant
WHERE
    compant.id = co_id ;
INSERT INTO deleted_account(co_name, hr_phone, garantee)
VALUES(company_name, hr_number, garantee_file) ;

DELETE FROM job WHERE job.co_id=co_id;
DELETE FROM job_applicants WHERE  j_id not IN (SELECT id FROM job);
DELETE FROM feedback WHERE feedback.u_id=co_id;
DELETE FROM compant WHERE compant.id=co_id;
DELETE FROM user WHERE user.id=co_id;
DELETE FROM auth WHERE auth.id=co_id;

SELECT 'account was deleted successfully' AS message;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_jobseeker_account` (IN `jobseeker_id` INT(7))   BEGIN

    DELETE FROM feedback WHERE feedback.u_id=jobseeker_id;
     DELETE FROM job_applicants WHERE job_applicants.s_id=jobseeker_id;
      DELETE FROM skill WHERE skill.s_id=jobseeker_id;
       DELETE FROM training WHERE training.s_id=jobseeker_id;
         DELETE FROM language WHERE language.s_id=jobseeker_id;
        DELETE FROM experience WHERE experience.s_id=jobseeker_id;
         DELETE FROM qualification WHERE qualification.s_id=jobseeker_id;
         DELETE FROM jobseeker WHERE jobseeker.id=jobseeker_id;
         DELETE FROM user WHERE user.id=jobseeker_id;
          DELETE FROM auth WHERE auth.id=jobseeker_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_by_clause` (IN `tableName` VARCHAR(255), IN `columnName` VARCHAR(255), IN `conditionState` VARCHAR(255))   BEGIN
    SET @sql = CONCAT('SELECT * FROM ', tableName, ' WHERE ', columnName, ' = ', conditionState);
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_company` (IN `id` INT(7))   BEGIN
    SELECT
        co.*,
        r.name
        
    FROM
        compant co
    INNER JOIN region r ON
        co.region_id = r.id
       
    WHERE
        co.id = id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_data` (IN `tableName` VARCHAR(255))   BEGIN
    SET @sql = CONCAT('SELECT * FROM ', tableName);
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_info` (IN `id` INT(7))   BEGIN
    SELECT
        js.full_name,
        js.birth_data,
        js.gender,
        js.civil_status,
        js.educational_level,
        js.u_background,
        c.name AS category_name,
        a.email,
        u.username,
        u.phone,
        u.address,
        u.image,
        u.last_login,
        u.image
    FROM
        auth a
    INNER JOIN USER u ON
        u.id = a.id
    INNER JOIN jobseeker js ON
        js.id = a.id
    INNER JOIN category c ON
        js.category_id = c.id
    WHERE
        a.id = id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_jobseeker` (IN `id` INT(7))   BEGIN
SELECT 
        j.*,
        c.name AS category_name
    FROM 
        jobseeker j
    
    INNER JOIN 
        category c ON j.category_id = c.id
    
    WHERE 
        j.id =id;
        END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_my_posted_jobs` (IN `co_id` INT(7))   BEGIN
SELECT
    job.id,
    job.title,
    job.date_line,
    job.working_time,
    job.req_no,
    co.co_logo
   
    
FROM
    job
    INNER join compant co ON
    job.co_id=co.id
WHERE
    job.co_id = co_id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_notification` (IN `id` INT(7))   BEGIN
    SELECT
        n.*,
        u.username
    FROM
        notification n
    INNER JOIN USER u ON
        n.sender_id = u.id
    WHERE
        n.id = id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_profile` (IN `id` INT(7))   BEGIN
    SELECT 
       a.email,
       u.username,
       u.phone,
       u.address,
       u.image,
       u.last_login,
       a.status
    FROM 
        auth a
    INNER JOIN 
       user u ON u.id = a.id
    
    WHERE 
        a.id = id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_qualification` (IN `id` INT(7))   BEGIN 
SELECT 
q.*,
c.name AS country_name
FROM
qualification q 
INNER JOIN
country c ON
q.country_id=c.id
WHERE q.s_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `job_details` (IN `job_id` INT(7))   BEGIN
    SELECT 
        j.title,
        j.working_time,
        j.id,
        j.req_no,
        j.exp_period,
        j.date_line,
        j.salary,
        r.name AS region_name,
        c.name AS category_name,
        co.co_name,
        co.co_logo,
        j.description,
        j.responsability,
        j.requirements
        
    FROM 
        job j
    INNER JOIN 
        region r ON j.region_id = r.id
    INNER JOIN 
        category c ON j.category_id = c.id
    INNER JOIN 
        compant co ON j.co_id = co.id
    WHERE 
        j.id = job_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `my_applied_jobs` (IN `s_id` INT(7))   BEGIN
    SELECT
        j.id,
        j.title,
        j.working_time,
        j.salary,
        j.date_line,
        j.exp_period,
        j.req_no,
        r.name AS region_name,
        co.co_logo,
        ja.status
    FROM
        job j
    INNER JOIN region r ON
        j.region_id = r.id
    INNER JOIN compant co ON
        j.co_id = co.id
    JOIN job_applicants AS ja
    ON
        j.id = ja.j_id
    WHERE
        ja.s_id = s_id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `post_job` (IN `co_id` INT(7), IN `title` VARCHAR(20), IN `region_id` INT(7), IN `category_id` INT(7), IN `req_no` INT(2), IN `description` TEXT, IN `responsability` TEXT, IN `requirements` TEXT, IN `working_time` VARCHAR(15), IN `exp_period` VARCHAR(10), IN `salary` DOUBLE, IN `date_line` DATE)   BEGIN
    DECLARE
        accepted_user BOOLEAN DEFAULT 0 ;
    SELECT
STATUS
INTO accepted_user
FROM
    compant
WHERE
    compant.id = co_id ; IF accepted_user THEN
INSERT INTO job(
    co_id,
    title,
    region_id,
    category_id,
    req_no,
    description,
    responsability,
    requirements,
    working_time,
    exp_period,
    salary,
    date_line
)
VALUES(
    co_id,
    title,
    region_id,
    category_id,
    req_no,
    description,
    responsability,
    requirements,
    working_time,
    exp_period,
    salary,
    date_line
) ;
SELECT 'job posted successfully' as message;
ELSE
SELECT 'you still in waiting menu' as message;
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Search_Jobs` (IN `region_id` INT(7), IN `category_id` INT(7), IN `working_time` VARCHAR(100))   BEGIN
IF (region_id = '' AND category_id = '' AND working_time = '') THEN
    SELECT * FROM job_list;
  
ELSEIF region_id IS NOT null AND category_id IS NOT null
  AND working_time IS NOT null THEN
  SELECT 
        j.title,
        j.working_time,
        j.id,
        j.req_no,
        j.exp_period,
        j.date_line,
        j.salary,
        r.name AS region_name,
        c.name AS category_name,
        co.co_name,
        co.co_logo
        
    FROM 
        job j
    INNER JOIN region r ON j.region_id = r.id
INNER JOIN category c ON j.category_id = c.id
INNER JOIN compant co ON j.co_id = co.id

WHERE j.date_line > CURRENT_DATE AND (j.region_id=region_id AND
                                     j.category_id=category_id and
                                     j.working_time=working_time) 
ORDER BY j.id DESC;




 end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `set_situation` (IN `s_id` INT(7), IN `status` VARCHAR(20), IN `j_id` INT(7))   BEGIN
UPDATE job_applicants SET job_applicants.status=status WHERE job_applicants.s_id=s_id AND job_applicants.j_id=j_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `set_user_previlege` (IN `userId` INT, IN `roleId` INT)   BEGIN
    DECLARE privilegeId INT;
    DECLARE done boolean DEFAULT false;
    -- Cursor declaration to fetch privilege IDs associated with the role
    DECLARE privilegeCursor CURSOR FOR
        SELECT privilege_id FROM role_privilege WHERE role_id = roleId;
    
    -- Declare continue handler to exit the loop when no more rows are available
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

   

    -- Open the cursor
    OPEN privilegeCursor;
    
    -- Loop through the cursor to fetch privilege IDs and insert them into user_permission table
    privilegeLoop: LOOP
        FETCH privilegeCursor INTO privilegeId;
        IF done THEN
            LEAVE privilegeLoop;
        END IF;
        
        -- Insert privilege into user_permission table for the user
        INSERT INTO user_permission (user_id, privilege_id) VALUES (userId, privilegeId);
    END LOOP privilegeLoop;

    -- Close the cursor
    CLOSE privilegeCursor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_company` (IN `id` INT(7), IN `co_name` VARCHAR(50), IN `activity` VARCHAR(30), IN `hr_phone` INT(14), IN `website` VARCHAR(30), IN `region_id` INT(7), IN `created_at` YEAR, IN `working_time` VARCHAR(25), IN `co_background` TEXT, IN `goal` TEXT, IN `vision` TEXT)   BEGIN
    UPDATE
        compant
    SET
        co_name = co_name,
        activity = activity,
        hr_phone = hr_phone,
        website = website,
        region_id = region_id,
        created_at = created_at,
        working_time = working_time,
        co_background = co_background,
     
        goal = goal,
        vision = vision
       
    WHERE
        compant.id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_experience` (IN `id` INT(7), IN `title` VARCHAR(30), IN `inistitute` VARCHAR(30), IN `p_phone` INT(14), IN `start_date` YEAR, IN `end_date` YEAR, IN `responsability` TEXT)   BEGIN
    UPDATE
        experience
    SET
        
            title = title,
            inistitute = inistitute,
            p_phone = p_phone,
            experience.start_date = start_date,
           experience.end_date = end_date,
            responsability = responsability
        WHERE
            experience.id = id;
        END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_feedback` (IN `id` INT(7), IN `body` TEXT)   BEGIN
  UPDATE feedback 
  SET 
  body=body
  WHERE feedback.id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_job` (IN `id` INT(7), IN `title` VARCHAR(20), IN `region_id` INT(7), IN `category_id` INT(7), IN `req_no` INT(2), IN `description` TEXT, IN `responsability` TEXT, IN `requirements` TEXT, IN `working_yime` VARCHAR(15), IN `exp_period` VARCHAR(20), IN `salary` DOUBLE, IN `date_line` DATE)   BEGIN
UPDATE job
SET
    
    title=title,
    region_id=region_id,
    category_id=category_id,
    req_no=req_no,
    description=description,
    responsability=responsability,
    requirements=requirements,
    working_time=working_time,
    exp_period=exp_period,
    salary=salary,
    date_line=date_line

WHERE job.id=id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_jobseeker` (IN `id` INT(7), IN `full_name` VARCHAR(50), IN `gender` VARCHAR(10), IN `civil_status` VARCHAR(10), IN `birth_date` DATE, IN `educational_level` VARCHAR(20), IN `category_id` INT(7), IN `exp_period` VARCHAR(20), IN `u_background` TEXT)   BEGIN
    UPDATE
        jobseeker
    SET
        full_name = full_name,
        gender = gender,
        civil_status = civil_status,
        birth_data = birth_date,
        educational_level = educational_level,
        category_id = category_id,
        exp_period = exp_period,
        u_background =u_background
    WHERE
        jobseeker.id = id ;
        
        end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_language` (IN `id` INT(7), IN `NAME` VARCHAR(20), IN `speaking` VARCHAR(20), IN `writing` VARCHAR(20), IN `reading` VARCHAR(20))   BEGIN
    UPDATE LANGUAGE
        SET
        name = NAME,
        speaking = speaking,
        writing = writing,
        reading = reading
    WHERE LANGUAGE
        .id = id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_last_logout` (IN `id` INT(7))   BEGIN
DECLARE last_logout datetime DEFAULT CURRENT_TIMESTAMP;
UPDATE user SET user.last_logout=last_logout where user.id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_notification` (IN `id` INT(7), IN `title` VARCHAR(50), IN `users` VARCHAR(30), IN `text` TEXT)   BEGIN
    DECLARE
        TIME DATETIME DEFAULT CURRENT_TIMESTAMP ;
    UPDATE
        notification
    SET
        
        title=title,
        users=users,
        text=text,
        sent_at =time
        WHERE notification.id=id;
       
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_password` (IN `id` INT(7), IN `hash_password` VARCHAR(255))   BEGIN
UPDATE auth SET auth.password= hash_password WHERE auth.id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile` (IN `user_id` INT(7), IN `email` VARCHAR(50), IN `username` VARCHAR(20), IN `phone` VARCHAR(14), IN `address` VARCHAR(50))   BEGIN
UPDATE auth SET auth.email=email WHERE auth.id=user_id;
    UPDATE user 
    SET
    user.username=username,
       user.phone=phone,
       user.address=address
       
       WHERE user.id=user_id;
       
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_qualification` (IN `qualification_level` VARCHAR(20), IN `title` VARCHAR(30), IN `institute` VARCHAR(40), IN `timeframe` VARCHAR(20), IN `country_id` INT(7), IN `grade` VARCHAR(10), IN `id` INT(7))   BEGIN
    UPDATE
        qualification
    SET
        qualification_level = qualification_level,
        title = title,
        inistitute = institute,
        timeframe = timeframe,
        country_id = country_id,
        grade = grade
    WHERE
   qualification.id=id ;
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_skill` (IN `id` INT(7), IN `title` VARCHAR(60))   BEGIN
   UPDATE  skill SET title=title
   WHERE skill.id=id;
   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_training` (IN `id` INT(7), IN `title` VARCHAR(20), IN `inistitute` VARCHAR(40), IN `timeframe` VARCHAR(30), IN `type` VARCHAR(20))   BEGIN
   UPDATE  training
   SET
        
        title=title,
        inistitute=inistitute,
        timeframe=timeframe,
        type=type
        WHERE training.id=id;
  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_signin` (IN `mail` VARCHAR(255))   BEGIN
DECLARE user_exists INT DEFAULT 0;
DECLARE is_active int DEFAULT 1 ;
DECLARE last_login datetime DEFAULT NOW();

SELECT  status  INTO is_active  from auth WHERE auth.email= mail ;

IF  is_active =1 THEN
SELECT
auth.id AS user_id,
auth.email AS user_email,
auth.password AS hash_password,
u.role_id as role_id
FROM
auth 
INNER JOIN user u ON
auth.id=u.id
WHERE auth.email=mail;
UPDATE user SET user.last_login=last_login ;


end if ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_signup` (IN `username` VARCHAR(20), IN `mail` VARCHAR(50), IN `address` VARCHAR(30), IN `phone` INT, IN `hash_password` VARCHAR(255), IN `role_id` INT(10))   BEGIN
DECLARE user_exists INT DEFAULT 0 ;
DECLARE u_id int ;
DECLARE last_login datetime DEFAULT now();


SELECT COUNT(*) INTO user_exists
FROM auth
WHERE auth.email = mail;

IF user_exists THEN 
SELECT 'user already exists' as message;
ELSE

INSERT INTO auth(email , password) VALUES(mail ,hash_password);
SET u_id = last_insert_id();

INSERT INTO user(id, username , phone , address ,last_login, role_id) VALUES (u_id, username , phone, address,last_login,role_id);  
SELECT 'user created successfuly' as message;

end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_job_applicant` (IN `j_id` INT(7))   BEGIN
    SELECT
        js.id ,
        u.image,
        js.full_name,
        c.name AS category_name,
        js.educational_level,
        js.exp_period,
        js.gender,
        ja.status
    FROM
        jobseeker js
        INNER JOIN user u 
        ON
        js.id=u.id
        INNER JOIN category c
        ON
        js.category_id=c.id
    JOIN job_applicants AS ja
    ON
        js.id = ja.s_id
    WHERE
        ja.j_id = j_id ;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(7) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'تقنية معلومات'),
(2, 'محاسبة');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`) VALUES
(1, 'manage_company'),
(2, 'manage_jobseeker'),
(3, 'manage_jobs'),
(4, 'manage_category'),
(5, 'manage_region'),
(6, 'manage_users'),
(7, 'manage_country'),
(8, 'manage_notification'),
(9, 'manage_feedback'),
(10, 'manage role_privileges'),
(11, 'manage_qualification'),
(12, 'manage_experience'),
(13, 'manage_training'),
(14, 'manage_language'),
(15, 'manage_skill');

-- --------------------------------------------------------

--
-- Table structure for table `compant`
--

CREATE TABLE `compant` (
  `id` int(7) NOT NULL,
  `co_name` varchar(50) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `hr_phone` varchar(30) NOT NULL,
  `website` varchar(20) NOT NULL,
  `region_id` int(7) NOT NULL,
  `created_at` year(4) NOT NULL,
  `working_time` varchar(20) NOT NULL,
  `co_background` text NOT NULL,
  `garantee` longblob NOT NULL,
  `goal` varchar(500) NOT NULL,
  `vision` varchar(300) NOT NULL,
  `co_logo` blob NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `company_list`
-- (See below for the actual view)
--
CREATE TABLE `company_list` (
`id` int(7)
,`co_name` varchar(50)
,`co_logo` blob
,`activity` varchar(50)
,`user_address` varchar(30)
,`created_at` year(4)
,`region_name` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `company_view`
-- (See below for the actual view)
--
CREATE TABLE `company_view` (
`id` int(7)
,`co_name` varchar(50)
,`hr_phone` varchar(30)
,`email` varchar(50)
,`status` tinyint(1)
,`address` varchar(30)
,`name` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'اليمن'),
(2, 'مصر');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(7) NOT NULL,
  `s_id` int(7) NOT NULL,
  `title` varchar(30) NOT NULL,
  `inistitute` varchar(30) NOT NULL,
  `p_phone` int(14) NOT NULL,
  `start_date` year(4) NOT NULL,
  `end_date` year(4) NOT NULL,
  `responsability` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `replay` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `region_id` int(7) NOT NULL,
  `category_id` int(7) NOT NULL,
  `req_no` int(2) NOT NULL,
  `description` text NOT NULL,
  `responsability` text NOT NULL,
  `requirements` text NOT NULL,
  `working_time` varchar(20) NOT NULL,
  `exp_period` varchar(20) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `date_line` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `id` int(7) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `civil_status` varchar(10) NOT NULL,
  `birth_data` date NOT NULL,
  `educational_level` varchar(30) NOT NULL,
  `category_id` int(7) NOT NULL,
  `exp_period` varchar(20) NOT NULL,
  `u_background` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `jobseekers_reqruitment_companies`
-- (See below for the actual view)
--
CREATE TABLE `jobseekers_reqruitment_companies` (
`Jobseeker_no` bigint(21)
,`Company_No` bigint(21)
,`job_No` bigint(21)
,`Accepted_Applications_No` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jobseeker_view`
-- (See below for the actual view)
--
CREATE TABLE `jobseeker_view` (
`id` int(7)
,`full_name` varchar(50)
,`gender` varchar(10)
,`civil_status` varchar(10)
,`birth_data` date
,`educational_level` varchar(30)
,`category_id` int(7)
,`exp_period` varchar(20)
,`u_background` text
,`category_name` varchar(30)
,`address` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `job_applicants`
--

CREATE TABLE `job_applicants` (
  `id` int(7) NOT NULL,
  `j_id` int(11) NOT NULL,
  `s_id` int(7) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `job_list`
-- (See below for the actual view)
--
CREATE TABLE `job_list` (
`id` int(11)
,`title` varchar(30)
,`req_no` int(2)
,`working_time` varchar(20)
,`salary` varchar(50)
,`exp_period` varchar(20)
,`date_line` date
,`region_name` varchar(20)
,`category_name` varchar(30)
,`co_name` varchar(50)
,`co_logo` blob
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `job_view`
-- (See below for the actual view)
--
CREATE TABLE `job_view` (
`id` int(11)
,`title` varchar(30)
,`req_no` int(2)
,`status` tinyint(1)
,`working_time` varchar(20)
,`salary` varchar(50)
,`exp_period` varchar(20)
,`date_line` date
,`region_name` varchar(20)
,`category_name` varchar(30)
,`co_name` varchar(50)
,`co_logo` blob
);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `speaking` varchar(10) NOT NULL,
  `writing` varchar(10) NOT NULL,
  `reading` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `users` int(11) NOT NULL,
  `text` text NOT NULL,
  `sent_at` datetime NOT NULL,
  `sender_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `notification_list`
-- (See below for the actual view)
--
CREATE TABLE `notification_list` (
`id` int(11)
,`title` varchar(50)
,`users` int(11)
,`text` text
,`sent_at` datetime
,`role_name` varchar(50)
,`username` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `privilege_id` int(11) NOT NULL,
  `privilege_name` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`privilege_id`, `privilege_name`, `class_id`) VALUES
(2, 'view_company', 1),
(3, 'add_company', 1),
(4, 'activate_account', 6),
(6, 'stop_account', 6),
(7, 'block_account', 6),
(8, 'view_garantee', 1),
(9, 'add_garantee', 1),
(10, 'update_garantee', 1),
(11, 'post_job', 3),
(12, 'view_job', 3),
(13, 'update_job', 3),
(14, 'delete_job', 3),
(15, 'view_applicants', 3),
(17, 'view_documments', 2),
(18, 'add_jobseeker', 2),
(19, 'view_jobseeker', 2),
(20, 'update_jobseeker', 2),
(25, 'add_notification', 8),
(26, 'update_notification', 8),
(27, 'delete_notification', 8),
(28, 'show_notification', 8),
(29, 'view_feedback', 9),
(30, 'reply_feedback', 9),
(31, 'update_reply', 9),
(32, 'add_applicant', 3),
(52, 'add_role', 0),
(54, 'add_privilege', 10),
(72, 'add_user', 6),
(73, 'update_user', 6),
(74, 'view_user', 6),
(77, 'view_cv', 2),
(102, 'customize_jobseeker', 10),
(103, 'customize_company', 10),
(104, 'accept_company', 1),
(127, 'add_region', 5),
(128, 'update_region', 5),
(129, 'delete_region', 5),
(130, 'view_region', 5),
(131, 'add_category', 4),
(132, 'update_category', 4),
(133, 'delete_category', 4),
(134, 'view_category', 4),
(135, 'add_country', 7),
(136, 'update_country', 7),
(137, 'delete_country', 7),
(138, 'view_country', 7),
(139, 'update_image', 6),
(140, 'add_logo', 1),
(141, 'update_logo', 1),
(144, 'update_profile', 6),
(145, 'add_image', 6),
(146, 'apply_jobs', 3),
(147, 'add_feedback', 9),
(148, 'update_feedback', 9),
(149, 'delete_feedback', 9),
(150, 'set_applying_status', 3),
(152, 'add_qualification', 11),
(153, 'update_qualification', 11),
(154, 'delete_qualification', 11),
(155, 'view_qualification', 11),
(156, 'add_qual_certificate', 11),
(157, 'update_qual_certificate', 11),
(158, 'add_experience', 12),
(159, 'update_experience', 12),
(160, 'view_experience', 12),
(161, 'delete_experience', 12),
(162, 'add_training', 13),
(163, 'update_training', 13),
(164, 'view_training', 13),
(165, 'delete_training', 13),
(166, 'add_training_certificate', 13),
(167, 'update_training_certificate', 13),
(168, 'add_language', 14),
(169, 'update_language', 14),
(170, 'view_language', 14),
(171, 'delete_language', 14),
(172, 'add_skill', 15),
(173, 'update_skill', 15),
(174, 'view_skill', 15),
(175, 'delete_skill', 15),
(176, 'update_company', 1),
(177, 'view_reply', 9);

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(11) NOT NULL,
  `qualification_level` varchar(20) NOT NULL,
  `title` varchar(30) NOT NULL,
  `inistitute` varchar(30) NOT NULL,
  `timeframe` varchar(20) NOT NULL,
  `s_id` int(7) NOT NULL,
  `country_id` int(3) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`) VALUES
(1, 'صنعاء'),
(2, 'عدن');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `review` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `review_view`
-- (See below for the actual view)
--
CREATE TABLE `review_view` (
`review_id` int(11)
,`review` text
,`username` varchar(20)
,`image` blob
);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(4, 'admin_1'),
(5, 'admin_2'),
(2, 'company'),
(1, 'jobseeker'),
(3, 'supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `role_privilege`
--

CREATE TABLE `role_privilege` (
  `role_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_privilege`
--

INSERT INTO `role_privilege` (`role_id`, `privilege_id`) VALUES
(1, 2),
(1, 6),
(1, 18),
(1, 19),
(1, 28),
(1, 29),
(1, 77),
(1, 139),
(1, 144),
(1, 145),
(1, 146),
(1, 147),
(1, 148),
(1, 149),
(1, 152),
(1, 153),
(1, 154),
(1, 155),
(1, 156),
(1, 157),
(1, 158),
(1, 159),
(1, 160),
(1, 161),
(1, 162),
(1, 163),
(1, 164),
(1, 165),
(1, 166),
(1, 167),
(1, 168),
(1, 169),
(1, 170),
(1, 171),
(1, 172),
(1, 173),
(1, 174),
(1, 175),
(1, 177),
(2, 2),
(2, 3),
(2, 6),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 17),
(2, 29),
(2, 77),
(2, 139),
(2, 140),
(2, 141),
(2, 144),
(2, 145),
(2, 147),
(2, 148),
(2, 149),
(2, 150),
(2, 176),
(2, 177),
(3, 2),
(3, 3),
(3, 4),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 54),
(3, 72),
(3, 73),
(3, 74),
(3, 77),
(3, 102),
(3, 103),
(3, 104),
(3, 127),
(3, 128),
(3, 129),
(3, 130),
(3, 131),
(3, 132),
(3, 133),
(3, 134),
(3, 135),
(3, 136),
(3, 137),
(3, 138),
(3, 139),
(3, 140),
(3, 141),
(3, 155),
(3, 160),
(3, 164),
(3, 170),
(3, 174),
(4, 2),
(4, 3),
(4, 4),
(4, 11),
(4, 12),
(4, 13),
(4, 15),
(4, 18),
(4, 19),
(4, 20),
(4, 25),
(4, 26),
(4, 28),
(4, 29),
(4, 30),
(4, 31),
(4, 32),
(4, 72),
(4, 73),
(4, 74),
(4, 77),
(4, 102),
(4, 103),
(4, 128),
(4, 130),
(4, 132),
(4, 134),
(4, 136),
(4, 138),
(4, 139),
(4, 140),
(4, 155),
(4, 160),
(4, 164),
(4, 170),
(4, 174),
(5, 2),
(5, 3),
(5, 4),
(5, 11),
(5, 12),
(5, 13),
(5, 18),
(5, 19),
(5, 20),
(5, 25),
(5, 26),
(5, 27),
(5, 28),
(5, 29),
(5, 30),
(5, 31),
(5, 72),
(5, 73),
(5, 74),
(5, 77),
(5, 128),
(5, 130),
(5, 132),
(5, 134),
(5, 136),
(5, 138),
(5, 141),
(5, 155),
(5, 160),
(5, 164),
(5, 170),
(5, 174);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `inistitute` varchar(30) NOT NULL,
  `timeframe` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(7) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone` int(14) NOT NULL,
  `address` varchar(30) NOT NULL,
  `image` blob NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime NOT NULL,
  `role_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_list`
-- (See below for the actual view)
--
CREATE TABLE `user_list` (
`id` int(7)
,`email` varchar(50)
,`status` int(1)
,`username` varchar(20)
,`phone` int(14)
,`address` varchar(30)
,`image` blob
,`role_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `user_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure for view `company_list`
--
DROP TABLE IF EXISTS `company_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `company_list`  AS SELECT `co`.`id` AS `id`, `co`.`co_name` AS `co_name`, `co`.`co_logo` AS `co_logo`, `co`.`activity` AS `activity`, `u`.`address` AS `user_address`, `co`.`created_at` AS `created_at`, `r`.`name` AS `region_name` FROM ((`compant` `co` join `user` `u` on(`co`.`id` = `u`.`id`)) join `region` `r` on(`co`.`region_id` = `r`.`id`)) WHERE `co`.`status` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `company_view`
--
DROP TABLE IF EXISTS `company_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `company_view`  AS SELECT `co`.`id` AS `id`, `co`.`co_name` AS `co_name`, `co`.`hr_phone` AS `hr_phone`, `au`.`email` AS `email`, `co`.`status` AS `status`, `u`.`address` AS `address`, `r`.`name` AS `name` FROM (((`compant` `co` join `user` `u` on(`co`.`id` = `u`.`id`)) join `region` `r` on(`co`.`region_id` = `r`.`id`)) join `auth` `au` on(`co`.`id` = `au`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `jobseekers_reqruitment_companies`
--
DROP TABLE IF EXISTS `jobseekers_reqruitment_companies`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jobseekers_reqruitment_companies`  AS SELECT (select count(0) from `jobseeker`) AS `Jobseeker_no`, (select count(0) from `compant`) AS `Company_No`, (select count(0) from `job`) AS `job_No`, (select count(0) from `job_applicants` where `job_applicants`.`status` = 'accepted') AS `Accepted_Applications_No` ;

-- --------------------------------------------------------

--
-- Structure for view `jobseeker_view`
--
DROP TABLE IF EXISTS `jobseeker_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jobseeker_view`  AS SELECT `j`.`id` AS `id`, `j`.`full_name` AS `full_name`, `j`.`gender` AS `gender`, `j`.`civil_status` AS `civil_status`, `j`.`birth_data` AS `birth_data`, `j`.`educational_level` AS `educational_level`, `j`.`category_id` AS `category_id`, `j`.`exp_period` AS `exp_period`, `j`.`u_background` AS `u_background`, `c`.`name` AS `category_name`, `u`.`address` AS `address` FROM ((`jobseeker` `j` join `category` `c` on(`j`.`category_id` = `c`.`id`)) join `user` `u` on(`u`.`id` = `j`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `job_list`
--
DROP TABLE IF EXISTS `job_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `job_list`  AS SELECT `j`.`id` AS `id`, `j`.`title` AS `title`, `j`.`req_no` AS `req_no`, `j`.`working_time` AS `working_time`, `j`.`salary` AS `salary`, `j`.`exp_period` AS `exp_period`, `j`.`date_line` AS `date_line`, `r`.`name` AS `region_name`, `c`.`name` AS `category_name`, `co`.`co_name` AS `co_name`, `co`.`co_logo` AS `co_logo` FROM (((`job` `j` join `region` `r` on(`j`.`region_id` = `r`.`id`)) join `category` `c` on(`j`.`category_id` = `c`.`id`)) join `compant` `co` on(`j`.`co_id` = `co`.`id`)) WHERE `j`.`date_line` > curdate() AND `j`.`status` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `job_view`
--
DROP TABLE IF EXISTS `job_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `job_view`  AS SELECT `j`.`id` AS `id`, `j`.`title` AS `title`, `j`.`req_no` AS `req_no`, `j`.`status` AS `status`, `j`.`working_time` AS `working_time`, `j`.`salary` AS `salary`, `j`.`exp_period` AS `exp_period`, `j`.`date_line` AS `date_line`, `r`.`name` AS `region_name`, `c`.`name` AS `category_name`, `co`.`co_name` AS `co_name`, `co`.`co_logo` AS `co_logo` FROM (((`job` `j` join `region` `r` on(`j`.`region_id` = `r`.`id`)) join `category` `c` on(`j`.`category_id` = `c`.`id`)) join `compant` `co` on(`j`.`co_id` = `co`.`id`)) WHERE `j`.`date_line` > curdate() ;

-- --------------------------------------------------------

--
-- Structure for view `notification_list`
--
DROP TABLE IF EXISTS `notification_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `notification_list`  AS SELECT `n`.`id` AS `id`, `n`.`title` AS `title`, `n`.`users` AS `users`, `n`.`text` AS `text`, `n`.`sent_at` AS `sent_at`, `r`.`role_name` AS `role_name`, `u`.`username` AS `username` FROM ((`notification` `n` join `user` `u` on(`n`.`sender_id` = `u`.`id`)) join `role` `r` on(`n`.`users` = `r`.`role_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `review_view`
--
DROP TABLE IF EXISTS `review_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `review_view`  AS SELECT `r`.`id` AS `review_id`, `r`.`review` AS `review`, `u`.`username` AS `username`, `u`.`image` AS `image` FROM (`review` `r` join `user` `u` on(`r`.`user_id` = `u`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_list`
--
DROP TABLE IF EXISTS `user_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_list`  AS SELECT `au`.`id` AS `id`, `au`.`email` AS `email`, `au`.`status` AS `status`, `u`.`username` AS `username`, `u`.`phone` AS `phone`, `u`.`address` AS `address`, `u`.`image` AS `image`, `r`.`role_name` AS `role_name` FROM ((`auth` `au` join `user` `u` on(`au`.`id` = `u`.`id`)) join `role` `r` on(`u`.`role_id` = `r`.`role_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compant`
--
ALTER TABLE `compant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `co_id` (`co_id`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `j_id` (`j_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`privilege_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_review` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `role_privilege`
--
ALTER TABLE `role_privilege`
  ADD PRIMARY KEY (`role_id`,`privilege_id`),
  ADD KEY `privilege_id` (`privilege_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `privilege_id` (`privilege_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applicants`
--
ALTER TABLE `job_applicants`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `privilege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compant`
--
ALTER TABLE `compant`
  ADD CONSTRAINT `compant_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `jobseeker` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `job_ibfk_3` FOREIGN KEY (`co_id`) REFERENCES `compant` (`id`);

--
-- Constraints for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD CONSTRAINT `jobseeker_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD CONSTRAINT `job_applicants_ibfk_1` FOREIGN KEY (`j_id`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `job_applicants_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `jobseeker` (`id`);

--
-- Constraints for table `language`
--
ALTER TABLE `language`
  ADD CONSTRAINT `language_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `jobseeker` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_fk1` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `qualification`
--
ALTER TABLE `qualification`
  ADD CONSTRAINT `qualification_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `jobseeker` (`id`),
  ADD CONSTRAINT `qualification_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_user_review` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_privilege`
--
ALTER TABLE `role_privilege`
  ADD CONSTRAINT `role_privilege_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `role_privilege_ibfk_2` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`privilege_id`);

--
-- Constraints for table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `skill_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `jobseeker` (`id`);

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `jobseeker` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD CONSTRAINT `user_permission_fk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_permission_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_permission_ibfk_2` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`privilege_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
