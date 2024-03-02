let sidebarOpen=false;
let sidebar=document.getElementById("sidebar");

function openSidebar()
{
    if(!sidebarOpen){
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen=true;
    }
}

function closeSidebar()
{
    if(sidebar)
    {
        sidebar.classList.remove("sidebar-responsive");
        sidebarOpen=false;
    }
}