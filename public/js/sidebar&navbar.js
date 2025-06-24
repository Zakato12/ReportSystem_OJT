        // document.addEventListener('DOMContentLoaded', function() {
        //     const toggleButton = document.getElementById('toggleSidebar');
        //     const body = document.body;
            
        //     // Toggle sidebar
        //     toggleButton.addEventListener('click', function() {
        //         body.classList.toggle('collapsed');
                
        //         // Store state in localStorage
        //         const isCollapsed = body.classList.contains('collapsed');
        //         localStorage.setItem('sidebarCollapsed', isCollapsed);
        //     });
        //     // Check for saved state
        //     const savedState = localStorage.getItem('sidebarCollapsed');
        //     if (savedState === 'true') {
        //         body.classList.add('collapsed');
        //     } else if (window.innerWidth = 768) {
        //         // Collapse by default on mobile
        //         body.classList.add('collapsed');
        //     }
            
        //     // Responsive behavior
        //     window.addEventListener('resize', function() {
        //         if (window.innerWidth = 768 && !body.classList.contains('collapsed')) {
        //             body.classList.add('collapsed');
        //         } else if (window.innerWidth > 768 && body.classList.contains('collapsed') && savedState !== 'true') {
        //             body.classList.remove('collapsed');
        //         }
        //     });
        // });

        document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggleSidebar');
    const sidebar = document.querySelector('.sidebar'); // Adjust selector if needed
    const body = document.body;

    // Toggle sidebar manually via button
    toggleButton.addEventListener('click', function () {
        body.classList.toggle('collapsed');
        localStorage.setItem('sidebarCollapsed', body.classList.contains('collapsed'));
    });

    // Apply saved state
    const savedState = localStorage.getItem('sidebarCollapsed');
    if (savedState === 'true') {
        body.classList.add('collapsed');
    } else if (window.innerWidth <= 768) {
        body.classList.add('collapsed'); // Collapse by default on mobile
    }

    // Responsive resize behavior
    window.addEventListener('resize', function () {
        if (window.innerWidth <= 768 && !body.classList.contains('collapsed')) {
            body.classList.add('collapsed');
        } else if (window.innerWidth > 768 && body.classList.contains('collapsed') && savedState !== 'true') {
            body.classList.remove('collapsed');
        }
    });

    // Hover to expand sidebar when collapsed
    sidebar.addEventListener('mouseenter', function () {
        if (body.classList.contains('collapsed')) {
            body.classList.add('sidebar-hover');
        }
    });

    sidebar.addEventListener('mouseleave', function () {
        body.classList.remove('sidebar-hover');
    });
});
