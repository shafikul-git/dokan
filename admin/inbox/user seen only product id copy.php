<?php
ob_start();
include "../header.php";

$unqueId = $_SESSION['uniqueId'];
if (isset($_GET['cid'])) {
    $id = $_GET['id'];
    $cid = $_GET['cid'];
    $seenUpdate = [
        'commentSeenId' => "'$unqueId,'"
    ];
    if ($databaseFN->concatData('usercomment', $seenUpdate, " id = $cid")) {
        // header("Location: ".$databaseFN->mainUrl."/view.php?id=" . $id);
    } else {
        echo "<p id='message' class='text-white text-center bg-red-500'>Someting want wrong</p>";
    }
}
?>

<!-- component -->
<section class="container px-4 mx-auto">


    <div class="mt-6 md:flex md:items-center md:justify-between">
        <div class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
            <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                View all
            </button>

            <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                Monitored
            </button>

            <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                Unmonitored
            </button>
        </div>

        <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

            <input type="text" placeholder="Search" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
        </div>
    </div>

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    ID
                                </th>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                        <span>Product </span>
                                    </button>
                                </th>

                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Image
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Comment
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Users</th>


                                <th scope="col" class="relative py-3.5 px-4 dark:text-gray-400">
                                    <span class="">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            <?php

                            if ($databaseFN->getData(
                                'usercomment',
                                "usercomment.id AS commentId,
                                usercomment.name AS commentorName,
                                usercomment.comment AS comment,
                                usercomment.commentSeenId AS commentSeenId,
                                productdetails.id AS productId,
                                productdetails.productName AS productName,
                                productdetails.productDescription AS productDescription,
                                productdetails.productImages AS productImage",
                                " productdetails on usercomment.postId = productdetails.id",
                                null,
                                " productdetails.id DESC"
                            )) {
                                $data = $databaseFN->getResult();
                                if (count($data) > 0) {

                                    $commentCount = array();
                                    $previseProductId = null;

                                    foreach ($data as $key => $value) {
                                        array_push($commentCount, $value['productId']);
                                    }

                                    foreach ($data as $key => $value) {
                                        if ($previseProductId === $value['productId']) {
                                            continue;
                                        }

                                        $previseProductId = $value['productId'];
                                        $singleImgName =  explode(",", $value['productImage']);
                                        $commentSeen =  explode(",", $value['commentSeenId']);
                            ?>
                                        <?php for ($i = 0; $i < count($commentSeen); $i++) {
                                            if ($commentSeen[$i] == $unqueId) {
                                                echo $commentSeen[$i] . "<br>";
                                                // echo "opacity-50";
                                            } else {
                                                echo "unseen <br>";
                                                // echo "shadow-md shadow-blue-500/50 opacity-100 mt-5";
                                            }
                                        } ?>
                                        <tr>
                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                    <?php echo $value['productId'] ?>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    <h2 class="font-medium text-gray-800 dark:text-white ">
                                                        <?php echo (str_word_count($value['productName']) < 5) ? $value['productName'] : $otherFN->strSort($value['productName'], 5)  . " ..." ?>
                                                    </h2>
                                                    <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                                                        <?php echo (str_word_count($value['productDescription']) < 5) ? $value['productDescription'] : $otherFN->strSort($value['productDescription'], 5)  . " ..." ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                <img src="<?php echo $databaseFN->mainUrl . "/upload/product/" . $singleImgName[0]   ?>" class="w-[45px] h-[40px] " alt="<?php echo $singleImgName[0] ?>">
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap ">
                                                <div class="">
                                                    <h4 class="text-gray-700 dark:text-gray-200">
                                                        <?php echo (str_word_count($value['commentorName']) < 5) ? $value['commentorName'] : $otherFN->strSort($value['commentorName'], 5)  . " ..." ?>
                                                        <sup class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                            <?php
                                                            $productCurrentId = $value['productId'];
                                                            $count_values = array_count_values($commentCount);
                                                            echo isset($count_values[$productCurrentId]) ? $count_values[$productCurrentId] : 0;
                                                            ?>
                                                        </sup>
                                                    </h4>
                                                    <p class="text-gray-500 dark:text-gray-400">
                                                        <?php echo (str_word_count($value['comment']) < 7) ? $value['comment'] : $otherFN->strSort($value['comment'], 7)  . " ..." ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="px-4 mx-10 py-4 text-sm whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img class="object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&q=80" alt="">
                                                    <img class="object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&q=80" alt="">
                                                    <img class="object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1256&q=80" alt="">
                                                    <img class="object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&q=80" alt="">
                                                    <p class="flex items-center justify-center w-6 h-6 -mx-1 text-xs text-blue-600 bg-blue-100 border-2 border-white rounded-full">+4</p>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap ml-5">
                                                <a href="<?php echo basename($_SERVER['PHP_SELF']) . "?cid=" . $value['commentId'] . "&id=" . $value['productId'] ?>"> <i class="fa-solid fa-eye dark:text-white hover:text-green-400 text-[1rem] cursor-pointer"></i></a>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                } else {
                                    echo "<p id='message' class='text-center bg-green-500 py-3 capitalize font-bold'>No Comment Found in database</p>";
                                }
                            } else {
                                echo "<p id='message' class='text-center bg-red-500 py-3 capitalize font-bold'>Someting want wrong Please reload your browser</p>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
        <div class="text-sm text-gray-500 dark:text-gray-400">
            Page <span class="font-medium text-gray-700 dark:text-gray-100">1 of 10</span>
        </div>

        <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
            <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                </svg>

                <span>
                    previous
                </span>
            </a>

            <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                <span>
                    Next
                </span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
</section>

<?php
include "../footer.php";
?>