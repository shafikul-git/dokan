<style>
    #livechatContent {
        /* Internet Explorer 10+ */
        scrollbar-width: 5px;
        /* Firefox */
    }
</style>
<!-- All chat button -->
<button onclick="chatbotToggle()" class="fixed bottom-4 right-4 inline-flex items-center justify-center text-sm font-medium disabled:pointer-events-none disabled:opacity-50 border rounded-full w-16 h-16 bg-black hover:bg-gray-700 m-0 cursor-pointer border-gray-200 bg-none p-0 normal-case leading-5 hover:text-gray-900" type="button" aria-haspopup="dialog" aria-expanded="false" data-state="closed">
    <div class="chatOpenIcon">
        <svg xmlns=" http://www.w3.org/2000/svg" width="30" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white block border-gray-200 align-middle">
            <path d="m3 21 1.9-5.7a8.5 8.5 0 1 1 3.8 3.8z" class="border-gray-200 ">
            </path>
        </svg>
    </div>
    <div class="hidden chatCloseIcon">
        <i class="fa-solid fa-xmark text-white text-4xl"></i>
    </div>
</button>
<!--  -->

<div style="box-shadow: 0 0 #0000, 0 0 #0000, 0 1px 2px 0 rgb(0 0 0 / 0.05);" id="allChatHistory" class="hidden fixed bottom-[calc(4rem+1.5rem)] right-0 mr-4 bg-white p-6 rounded-lg border border-[#e5e7eb] w-[440px] h-[634px]"> <!--  hidden -->
    <!-- Heading -->
    <div class="flex flex-col space-y-1.5 pb-6">
        <h2 class="font-semibold text-lg tracking-tight">Live Chat</h2>
        <p class="text-sm text-[#6b7280] leading-3">Powered by Md Shafikul Islam</p>
    </div>
    <!-- Chat Container -->
    <div class=" pr-4 h-[474px] " style="min-width: 100%; display: table;">

        <!-- Chat Message ALL -->
        <div class="overflow-y-scroll h-[474px] px-2 ">

            <!-- Not User Auth Then show -->
            <div id="authForm">
                <form id="chatUserData" class="max-w-sm mx-auto">
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                        <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your Name" required />
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email Address</label>
                        <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your Email" required />
                    </div>
                    <div class="mb-5">
                        <label for="phonenumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Phone Number</label>
                        <input type="text" id="phonenumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="01***" required />
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>

            <!-- All Chat SHow -->
            <div class="flex flex-col" id="livechatContent">
                <!-- in -->
            </div>
        </div>

    </div>
    <!-- Input box  -->
    <div class="flex items-center pt-0">
        <form class="flex items-center justify-center w-full space-x-2" id="chatForm">
            <input class=" chatInput flex h-10 w-full rounded-md border border-[#e5e7eb] px-3 py-2 text-sm placeholder-[#6b7280] focus:outline-none focus:ring-2 focus:ring-[#9ca3af] disabled:cursor-not-allowed disabled:opacity-50 text-[#030712] focus-visible:ring-offset-2" placeholder="Type your message" value="">
            <button class="inline-flex items-center justify-center rounded-md text-sm font-medium text-[#f9fafb] disabled:pointer-events-none disabled:opacity-50 bg-black hover:bg-[#111827E6] h-10 px-4 py-2">Send</button>
        </form>
    </div>

</div>


<!-- <svg stroke="none" fill="black" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
<path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"></path>
</svg> -->

<script>
    const url = "database/livechat.php";
    const randomID = Math.random().toString(16).slice(2);
    const randomString = function() {
        return Date.now().toString(36) + Math.random().toString(36).substr(2);
    }
    const uniqueId = randomString() + randomID;
    const authForm = document.getElementById('authForm');

    // Chat Toggle icon
    function chatbotToggle() {
        const allChatHistory = document.getElementById('allChatHistory');
        const chatOpenIcon = document.querySelector('.chatOpenIcon');
        const chatCloseIcon = document.querySelector('.chatCloseIcon');
        const allchatshow = allChatHistory.classList.toggle('hidden');
        if (allchatshow) {
            chatOpenIcon.classList.remove('hidden')
            chatCloseIcon.classList.add('hidden')
        } else {
            chatCloseIcon.classList.remove('hidden')
            chatOpenIcon.classList.add('hidden')
        }
    }

    // Chat sms Data
    document.getElementById('chatForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const chatInput = document.querySelector('.chatInput').value;
        const liveChatUserTableId = sessionStorage.getItem('liveChatUserTableId');
        const data = {
            action: 'insert',
            message: {
                chatInput: chatInput,
                massageUser: 1,
                chatUserTableId: liveChatUserTableId
            }
        };
        // console.log(JSON.stringify(data));
        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                // Optionally, clear the input field or perform other actions
                document.querySelector('.chatInput').value = '';
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    });

    // Fetch All data with 2sec
    function fetchMessages() {
        const liveChatUserTableId = sessionStorage.getItem('liveChatUserTableId');
        const livechatUniqueId = sessionStorage.getItem('livechatUniqueId');
        const data = {
            action: 'fetch',
            message: {
                authUser: livechatUniqueId,
                chatUserTableId: liveChatUserTableId
            }
        };

        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const chatFetchData = data.data;
                    // console.log(chatFetchData);
                    const livechatContent = document.getElementById('livechatContent');

                    // Clear existing content before appending new data
                    livechatContent.innerHTML = '';

                    chatFetchData.forEach(chat => {
                        const timestamp = chat.chat_time;
                        // console.log(chat);
                        if (chat.check_user == 0) {
                            livechatContent.innerHTML += `
                                <div class="flex gap-3 my-4 text-gray-600 text-sm flex-1 relative justify-start  bg-indigo-300 p-3 rounded">
                                    <span class=" flex shrink-0 overflow-hidden rounded-full w-8 h-8">
                                        <div class="rounded-full bg-gray-100 border p-1">
                                            <i class="fa-solid fa-headset"></i>
                                        </div>
                                    </span>
                                    <p class="leading-relaxed">
                                        <span class="block font-bold text-gray-700">Agent <sup class="ml-2">${timestamp.split(' ')[1]}</sup></span> ${chat.chat_text}
                                    </p>
                                    <i class="fa-solid fa-ellipsis-vertical absolute top-4 right-4 cursor-pointer"></i>
                                </div>`
                        } else {
                            livechatContent.innerHTML += `
                              <div class="flex gap-3 my-4 text-gray-600 text-sm flex-1 relative justify-end bg-gray-400 rounded p-3">
                                <i class="fa-solid fa-ellipsis-vertical absolute top-0 left-0 cursor-pointer top-4 left-4 "></i>
                                <p class="leading-relaxed text-end">
                                    <span class="block font-bold text-gray-700">
                                        <sup class="mr-2">${timestamp.split(' ')[1]}</sup>You </span>
                                        <span class="text-start">${chat.chat_text}</span> 
                                </p>
                                <span class=" flex shrink-0 overflow-hidden rounded-full w-8 h-8">
                                    <div class="rounded-full bg-gray-100 border p-1">
                                        <i class="fa-solid fa-user"></i> 
                                    </div>
                                </span>
                            </div>
                             `
                        }

                    });

                } else {
                    console.error('Failed to fetch messages:', data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }


      // Chat User Data
      document.getElementById('chatUserData').addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phonenumber = document.getElementById('phonenumber').value;
        const data = {
            action: 'chatUserData',
            message: {
                name: name,
                email: email,
                phonenumber: phonenumber
            }
        };
        // console.log(JSON.stringify(data));
        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                // Optionally, clear the input field or perform other actions
                // document.getElementById('name').value = '';
                // document.getElementById('email').value = '';
                // document.getElementById('phonenumber').value = '';

                sessionStorage.setItem('liveChatUserTableId', data.tableData[0])
                sessionStorage.setItem('livechatUniqueId', data.YourUniqueId)
                authChat();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    });


    // Authention
    function authChat() {
        const livechatUniqueId = sessionStorage.getItem('livechatUniqueId');
        console.log(livechatUniqueId);
        const data = {
            action: 'checkUser',
            message: {
                authUser: livechatUniqueId
            }
        }
        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const authdata = data.data;
                    // console.log(authdata);
                    const userDatabaseId = authdata[0].user_unique_id;
                    if (livechatUniqueId === userDatabaseId) {
                        // sessionStorage.setItem('liveChatUserTableId', authdata[0].id)
                        authForm.classList.add('hidden')
                        fetchMessages();
                        setInterval(fetchMessages, 2000);
                    }
                } else {
                    console.error('Auth Failed to fetch messages:', data.message);
                }
            })
            .catch((error) => {
                console.log("auth error ==> " + error);
            })
    }

    authChat();
</script>