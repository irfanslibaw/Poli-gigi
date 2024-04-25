<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link href="../dist/output.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .sidenav a,
        .dropdown-btn {
            display: block;
            width: 100%;
            cursor: pointer;
        }

        .active {
            background-color: rgba(100, 116, 139, 0.288);
            color: white;
            margin-top: 2rem;
        }

        .float {
            float: right;
            margin-top: 7.3px;
            fill: rgb(219 234 254);
        }

        .svg {
            margin-left: 5rem;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }

    </style>
</head>

<body class="bg-gradient-to-br from-blue-900 to-emerald-300">
    <div class="relative min-h-screen md:flex">
        <!-- mobile menu bar -->
        <div class="bg-gray-800 text-gray-100 flex justify-between md:hidden">

            <!-- mobile menu button  -->
            <button class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- logo -->
            <a href="#" class="block ml-10 p-4 text-white font-bold">Poli Teknik Gigi</a>
        </div>

        <!-- sidebar -->
        <div
            class="sidebar bg-slate-700 text-blue-100 font-semibold w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">

            <!-- logo -->
            <a href="" class="text-white flex items-center space-x-2 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24">
                    <path fill="#FFFFFF"
                        d="M3,7H21a1,1,0,0,0,0-2H3A1,1,0,0,0,3,7Zm0,4H17a1,1,0,0,0,0-2H3a1,1,0,0,0,0,2Zm18,2H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Zm-4,4H3a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Z" />
                </svg>
                <span class="text-2xl font-extrabold">Halo!</span>
            </a>
            <!-- nav -->
            <nav class="sidenav">

                <a href="{{ url('dokter/dashboard') }}"
                    class="block text-lg py-2.5 px-4 mb-4 border-slate-100 border-b transition duration-200  hover:bg-slate-500 hover:text-amber-400">Dashboard</a>

                <a href="{{ url('/jadwalklinik') }}"
                    class="px-4 py-4 text-lg text-blue-100 block border-none text-left cursor-pointer outline-none hover:text-amber-400">
                Jadwal Praktik</a>

                <a href="{{ url('dokpasien') }}"
                    class="px-4 py-4 text-lg text-blue-100 block border-none text-left cursor-pointer outline-none hover:text-amber-400">
                Data Pasien</a>

                <a href="{{ url('kehadiran') }}"
                    class="px-4 py-4 text-lg text-blue-100 block border-none text-left cursor-pointer outline-none hover:text-amber-400">
                Kehadiran</a>

                <form id="logout-form" action="{{ route('dokter.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a href="{{ url('/dokter/logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="block text-lg py-2.5 px-4 mt-4 border-slate-100 border-t transition duration-200  hover:bg-slate-500 hover:text-amber-400">Logout</a>

            </nav>
        </div>

        <!-- content -->
        @yield('dokter')
        <!-- content ends -->

    </div>
    <script>
        const btn = document.querySelector(".mobile-menu-button");
        const sidebar = document.querySelector(".sidebar");

        // add our event listener for the click
        btn.addEventListener("click", () => {
            sidebar.classList.toggle("-translate-x-full");
        })

        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>
