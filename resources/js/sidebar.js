const sidebar = document.getElementById("sidebar");
const sidebarContent = document.getElementById("sidebarContent");
const sidebarButton = document.getElementById("sidebarButton");
const closeSidebar = document.getElementById("closeSidebar");

// Open Sidebar
sidebarButton.addEventListener("click", () => {
    sidebar.classList.remove("hidden");
    setTimeout(() => {
        sidebarContent.classList.remove("-translate-x-full");
    }, 10); // Small delay ensures smooth animation
});

// Close Sidebar
closeSidebar.addEventListener("click", () => {
    sidebarContent.classList.add("-translate-x-full");
    sidebarContent.addEventListener(
        "transitionend",

        () => {
            sidebar.classList.add("hidden");
        },
        { once: true }
    ); // Hide the overlay after animation ends
});

// Notification
document.addEventListener("DOMContentLoaded", () => {
    const notificationButton = document.getElementById("notificationButton");
    const notificationDropdown = document.getElementById(
        "notificationDropdown"
    );
    const emptyState = document.getElementById("emptyState");
    const notificationList = document.getElementById("notificationList");

    // Check if notifications are available
    if (notificationList.children.length > 0) {
        emptyState.classList.add("hidden");
        notificationList.classList.remove("hidden");
    } else {
        emptyState.classList.remove("hidden");
        notificationList.classList.add("hidden");
    }

    // Toggle dropdown visibility with smooth animation
    notificationButton.addEventListener("click", () => {
        if (notificationDropdown.classList.contains("hidden")) {
            notificationDropdown.classList.remove("hidden");
            setTimeout(() => {
                notificationDropdown.classList.remove("opacity-0", "scale-95");
                notificationDropdown.classList.add("opacity-100", "scale-100");
            }, 10); // Add transition delay
        } else {
            notificationDropdown.classList.add("opacity-0", "scale-95");
            notificationDropdown.classList.remove("opacity-100", "scale-100");
            setTimeout(() => {
                notificationDropdown.classList.add("hidden");
            }, 300); // Match the animation duration
        }
    });
});
