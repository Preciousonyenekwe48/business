<?php
session_start(); //we need session for the log in thingy XD
    include("function.php");
    $id = $_GET['id'];
    $query = "select * from `work_table` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
          $work_title = $row['work_title'];
          $website_link = $row['website_link'];
          $roles_services = $row['roles_services'];
          $credits_design = $row['credits_design'];
          $credits_copy = $row['credits_copy'];
          $location_year = $row['location_year'];
          $wallpaper = $row['wallpaper'];
          $website_video = $row['website_video'];
          $mobile1_website_image = $row['mobile1_website_image'];
          $mobile2_website_image = $row['mobile2_website_image'];
          $mobile_website_video = $row['mobile_website_video'];
          $tablet_website_video = $row['tablet_website_video'];
          $tablet_website_section_video = $row['tablet_website_section_video'];
          $cat_id = $row['cat_id'];
          $date = $row['date'];
          $query = "INSERT INTO `archive_table` (`id`, `work_title`, `website_link`, `roles_services`, `credits_design`, `credits_copy`, `location_year`, `wallpaper`, `website_video`, `mobile1_website_image`, `mobile2_website_image`, `mobile_website_video`, `tablet_website_video`, `tablet_website_section_video`, `cat_id`, `date`)
          VALUES (NULL, '$work_title', '$website_link', '$roles_services', '$credits_design', '$credits_copy', '$location_year', '$wallpaper', '$website_video', '$mobile1_website_image', '$mobile2_website_image', '$mobile_website_video', '$tablet_website_video', '$tablet_website_section_video', '$cat_id', '$date');";
        }
        $query .= "DELETE FROM `work_table` WHERE `work_table`.`id` = '$id';";
        if(performQuery($query)){
          $msg = "<div class='alert alert-danger'>$work_title has been disabled and saved at archive.</div>";
          //Redirect to admin_Manager
          header( 'Location: works.php');
        }else{
          $msg = "<div class='alert alert-danger'>Unknown error occured.</div>";
          //Redirect to admin_Manager
          header( 'Location: works.php');
        }
    }else{
      $msg = "<div class='alert alert-danger'>Error occured.</div>";
      //Redirect to admin_Manager
      header( 'Location: works.php');
    }

?>
