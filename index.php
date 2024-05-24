<?php
include "header.php"; 
$databaseFN = new database();

?>



<div class="grid grid-cols-1 md:grid-cols-6  gap-2">
  <div class="w-full md:col-start-1 md:col-span-4 ">
    <?php 
    include "index/heroSection.php"; 
    ?>
  </div> 
   <div class=" w-full md:col-start-5 md:col-span-6 ">
    <div class="grid grid-cols-1"></div>
    <?php include "index/searchProduct.php"; 
    include "index/googleAds.php"; ?>
   </div> 
</div>

<section class="text-gray-700 body-font">
  <div class="container px-5 py-10 mx-auto">
   <div class="flex justify-between">
   <h3 class="text-xl font-bold text-black dark:text-white mb-5">Feture Categories</h3>
   <a href="<?php echo $databaseFN->mainUrl ."/category" ?>">See All Categories <i class="fa-solid fa-arrow-right-long"></i></a>
   </div>
    <?php include "index/fetureCategories.php"; ?>
  </div>
</section>


<section class="">
    <div class="flex justify-between">
    <h3 class="text-2xl font-bold text-black dark:text-white ">Just Now Added Product</h3>
    <a href="#">See All Product <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
    <?php include "index/justAddedProduct.php"; ?>
</section>


<section class="mt-4">
    <h3 class="text-2xl font-bold text-black dark:text-white "> Product Category List</h3>
    <?php include "index/categorys.php"; ?>
</section>





<?php include "footer.php"; ?>