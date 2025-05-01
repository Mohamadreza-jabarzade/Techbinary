    <!-- header -->
    <header class="containe h-16 flex justify-between items-center px-1">

        <!-- logo -->
        <img src="Logo.png" alt="TechBinary" class="w-28">
        <!-- logeEnd -->


        <!-- search -->
        <form id="search" method="get" action=""
            class="group hidden md:flex bg-light-text-soft rounded-3xl h-2/3 items-center p-1 gap-1">
            <div class="rounded-full size-8 text-dark-text-Primary flex justify-center items-center"><i
                    class="fa fa-search"></i></div>

            <input type="text" class="input-search" placeholder="جستوجوی باینری...">

            <button class="btn-search"><i class="fa fa-arrow-left"></i></button>
        </form>
        <!-- searchEnd -->


        <!-- auth -->
        <div class="flex gap-2 items-center">
            <a class="px-3 pb-1 text-dark-text-Primary text-lg" href="./auth/signin.html">ورود</a>
            <a class="rounded-2xl bg-my-second text-light-text-Primary px-3 py-1 font-bold text-md" href="./auth/signup.html">ثبت نام</a>
        </div>
        <!-- authEnd -->

    </header>
    <!-- headerEnd -->