<!-- Sidebar -->
<aside class="w-1/5 h-full bg-zinc-800 flex flex-col justify-start items-center p-10">
    <img src="/Logo.png" alt="TechBinary" class="w-full  md:pb-10">
    <nav class="flex-1 flex flex-col justify-start w-full text-right text-light-text-soft/80 items-start space-y-5 font-bold text-lg">
        <a href="{{route('showDashboard')}}" class="admin-aside-a"><i class="fa fa-tachometer pl-3"></i>داشبورد</a>
        <a href="{{route('showCategories')}}" class="admin-aside-a"><i class="far fa-folder-open pl-3"></i>دسته بندی ها</a>
        <a href="{{route('showPosts')}}" class="admin-aside-a"><i class="fas fa-file pl-3"></i>پست ها</a>
        <a href="{{route('showComments')}}" class="admin-aside-a"><i class="fa fa-comment pl-3"></i>کامنت ها</a>
        <a href="{{route('showUsers')}}" class="admin-aside-a"><i class="fa fa-users pl-3"></i>کاربران</a>
    </nav>
</aside>
<!-- sidebarEnd -->
