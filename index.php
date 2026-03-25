<?php
session_start();
$result = $_SESSION['resulta'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body class="bg-gray-900 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <form action="login.php" method="POST">
            <h1 class="text-2xl font-bold text-center text-blue-900">LOGIN PAGE</h1>
            <div class="mt-3">
                <input type="text" name="user" class="shadow-xl w-full mb-4 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Username" autofocus require>
            </div>
            <div class="mt-2 ">
                <input type="password" name="pass" class="shadow-xl w-full mb-4 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Password" autofocus require>
            </div>
            <div class="mt-2">
                <button type="submit" class="shadow-xl w-full rounded-md bg-blue-500 mt-2 font-bold py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    LOGIN
                </button>
            </div>
        </form>
        <button data-dialog-target="modal" class="shadow-xl w-full rounded-md bg-blue-500 mt-2 font-bold py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
            SIGN UP
        </button>
        <div data-dialog-backdrop="modal" data-dialog-backdrop-close="true" class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
            <div data-dialog="modal" class="relative m-4 p-4 w-96 rounded-lg bg-white shadow-sm">
                <div class="flex shrink-0 items-center pb-4 text-xl font-medium text-slate-800">
                    Create New Account
                </div>
                <div class="relative border-t border-slate-200 py-4 leading-normal text-slate-600 font-light">
                    <form action="create_account.php" method="post">
                        <div class="mb-4">
                            <input type="text" name="new_account_username_input" class="border border-gray-300 py-2 px-2 w-full rounded" placeholder="Enter username" autofocus required>
                        </div>

                        <div class="mb-4">
                            <input type="password" name="new_account_passsword_input" class="border border-gray-300 py-2 px-2 w-full rounded" placeholder="Enter password" required>
                        </div>

                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">CREATE ACCOUNT</button>
                        <br>
                    </form>
                </div>
                <div class="flex shrink-0 flex-wrap items-center pt-4 justify-end">
                    <button data-dialog-close="true" class="rounded-md border border-transparent py-2 px-4 text-center text-sm transition-all text-slate-600 hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        Cancel
                    </button>

                </div>
            </div>
        </div>
    </div>


    <br>
    </div>
    <script>
        const openBtn = document.querySelector('[data-dialog-target="modal"]');
        const closeBtns = document.querySelectorAll('[data-dialog-close="true"]');
        const backdrop = document.querySelector('[data-dialog-backdrop="modal"]');

        openBtn.addEventListener('click', () => {
            backdrop.classList.remove('pointer-events-none', 'opacity-0');
            backdrop.classList.add('opacity-100');
        });

        closeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                backdrop.classList.add('pointer-events-none', 'opacity-0');
                backdrop.classList.remove('opacity-100');
            });
        });
    </script>
    </div>


</body>

</html>